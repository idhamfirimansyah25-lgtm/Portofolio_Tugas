<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TokenVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = Auth::user()->votingToken;
        if (!$token || !$token->is_verified || $token->used_at !== null) {
            return redirect()->route('voter.token')->with('error', 'Harap verifikasi token valid Anda terlebih dahulu.');
        }
        return $next($request);
    }
}