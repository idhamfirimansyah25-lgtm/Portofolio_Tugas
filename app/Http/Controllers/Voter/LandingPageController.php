<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use App\Models\Candidate;

class LandingPageController extends Controller
{
    public function index()
    {
        $candidates = Candidate::orderBy('candidate_number')->get();
        return view('voter.landing', compact('candidates'));
    }
}