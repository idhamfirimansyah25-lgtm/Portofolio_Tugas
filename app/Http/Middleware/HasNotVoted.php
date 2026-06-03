<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasNotVoted
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->vote()->exists()) {
            return redirect()->route('voter.receipt')->with('info', 'Anda sudah menggunakan hak suara Anda.');
        }
        return $next($request);
    }
}