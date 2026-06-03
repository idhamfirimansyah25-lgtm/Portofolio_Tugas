<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyTokenRequest;
use App\Http\Requests\CastVoteRequest;
use App\Models\Candidate;
use App\Services\TokenService;
use App\Services\VoteService;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    protected TokenService $tokenService;
    protected VoteService $voteService;

    public function __construct(TokenService $tokenService, VoteService $voteService)
    {
        $this->tokenService = $tokenService;
        $this->voteService = $voteService;
    }

    public function showTokenForm() { return view('voter.token_verify'); }

    public function verifyToken(VerifyTokenRequest $request)
    {
        $isValid = $this->tokenService->validate(Auth::user(), $request->token);
        if ($isValid) {
            return redirect()->route('voter.voting');
        }
        return back()->with('error', 'Token salah atau sudah tidak berlaku.');
    }

    public function showVotingPage()
    {
        $candidates = Candidate::orderBy('candidate_number')->get();
        return view('voter.voting', compact('candidates'));
    }

    public function castVote(CastVoteRequest $request)
    {
        $success = $this->voteService->storeVote(Auth::user(), $request->candidate_id);
        if ($success) {
            return redirect()->route('voter.receipt')->with('success', 'Suara Anda berhasil direkam secara aman!');
        }
        return back()->with('error', 'Terjadi kesalahan sistem saat mengenkripsi suara.');
    }

    public function receipt()
    {
        $user = Auth::user()->load('vote');
        return view('voter.receipt', compact('user'));
    }
}