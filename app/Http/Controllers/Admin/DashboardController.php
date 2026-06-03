<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use App\Models\AuditLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVoters = User::where('role', 'voter')->count();
        $totalVotes = Vote::count();
        $totalCandidates = Candidate::count();
        $recentActivities = AuditLog::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalVoters', 'totalVotes', 'totalCandidates', 'recentActivities'));
    }
}