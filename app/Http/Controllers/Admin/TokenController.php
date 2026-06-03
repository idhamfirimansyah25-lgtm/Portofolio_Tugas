<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VotingToken;
use App\Models\User;
use App\Services\TokenService;
use App\Mail\VotingTokenMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    protected TokenService $tokenService;
    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function index()
    {
        $tokens = VotingToken::with('user')->get();
        return view('admin.tokens.index', compact('tokens'));
    }

    public function create()
    {
        $votersWithoutToken = User::where('role', 'voter')->whereDoesntHave('votingToken')->get();
        return view('admin.tokens.create', compact('votersWithoutToken'));
    }

    public function store(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $user = User::findOrFail($request->user_id);

        // 1. Generate token e-voting
        $votingToken = $this->tokenService->generate($user);

        // 2. Kirim email via Resend (HTTP API port 443, anti-block ISP)
        try {
            Mail::to($user->email)->send(new VotingTokenMail($user, $votingToken->token));

            return redirect()->route('tokens.index')
                ->with('success', "Token berhasil dibuat & dikirim ke {$user->email}");
        } catch (\Exception $e) {
            // Token tetap tersimpan, tapi email gagal — kasih tau admin
            return redirect()->route('tokens.index')
                ->with('warning', "Token berhasil dibuat, tapi email GAGAL dikirim: {$e->getMessage()}");
        }
    }

    public function show(VotingToken $token)
    {
        return view('admin.tokens.show', compact('token'));
    }

    public function edit(VotingToken $token)
    {
        return view('admin.tokens.edit', compact('token'));
    }

    public function update(Request $request, VotingToken $token)
    {
        $request->validate(['token' => 'required|string|size:6|unique:voting_tokens,token,' . $token->id]);
        $token->update(['token' => strtoupper($request->token)]);
        return redirect()->route('tokens.index')->with('success', 'Token berhasil diubah manual.');
    }

    public function destroy(VotingToken $token)
    {
        $token->delete();
        return redirect()->route('tokens.index')->with('success', 'Token berhasil dihapus.');
    }
}
