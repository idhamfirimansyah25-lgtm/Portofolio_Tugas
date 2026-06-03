<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use App\Services\CryptoService;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    protected CryptoService $crypto;
    public function __construct(CryptoService $crypto) { $this->crypto = $crypto; }

    public function index()
    {
        $candidates = Candidate::orderBy('candidate_number')->get()->map(function ($candidate) {
            $candidate->votes_count = 0;
            return $candidate;
        });

        $votes = Vote::all();
        $invalidVotesCount = 0;

        foreach ($votes as $vote) {
            // Verifikasi Integritas Data Suara (SHA-256)
            $calculatedHash = $this->crypto->sha256($vote->encrypted_vote);
            if ($calculatedHash !== $vote->vote_hash) {
                $invalidVotesCount++;
                continue; // Data terindikasi dimanipulasi manual di DB
            }

            // Dekripsi AES-256 suara masuk untuk mendapatkan ID Kandidat asli
            $decryptedCandidateId = $this->crypto->aesDecrypt($vote->encrypted_vote);
            
            $matchedCandidate = $candidates->firstWhere('id', $decryptedCandidateId);
            if ($matchedCandidate) {
                $matchedCandidate->votes_count++;
            }
        }

        return view('admin.results.index', compact('candidates', 'invalidVotesCount'));
    }

    public function exportExcel()
    {
        // Simple Clean Export CSV/Excel tanpa over-engineering library pihak ketiga
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=hasil_voting_" . date('Y-md') . ".csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $candidates = Candidate::all();
        $votes = Vote::all();
        $results = [];

        foreach($candidates as $c) { $results[$c->id] = ['number' => $c->candidate_number, 'name' => $c->name, 'count' => 0]; }

        foreach ($votes as $vote) {
            if ($this->crypto->sha256($vote->encrypted_vote) === $vote->vote_hash) {
                $candidateId = $this->crypto->aesDecrypt($vote->encrypted_vote);
                if (isset($results[$candidateId])) { $results[$candidateId]['count']++; }
            }
        }

        $callback = function() use($results) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No Urut', 'Nama Kandidat', 'Perolehan Suara']);
            foreach ($results as $row) {
                fputcsv($file, [$row['number'], $row['name'], $row['count']]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}