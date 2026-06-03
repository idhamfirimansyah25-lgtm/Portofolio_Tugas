<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Services\AuditLogService;

class CandidateController extends Controller
{
    protected AuditLogService $audit;
    public function __construct(AuditLogService $audit) { $this->audit = $audit; }

    public function index() {
        $candidates = Candidate::orderBy('candidate_number')->get();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create() {
        return view('admin.candidates.create');
    }

    public function store(StoreCandidateRequest $request) {
        $candidate = Candidate::create($request->validated());
        $this->audit->log("Created candidate: {$candidate->name}");
        return redirect()->route('candidates.index')->with('success', 'Kandidat berhasil ditambahkan.');
    }

    public function show(Candidate $candidate) {
        return view('admin.candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate) {
        return view('admin.candidates.edit', compact('candidate'));
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate) {
        $candidate->update($request->validated());
        $this->audit->log("Updated candidate ID: {$candidate->id}");
        return redirect()->route('candidates.index')->with('success', 'Kandidat berhasil diperbarui.');
    }

    public function destroy(Candidate $candidate) {
        $this->audit->log("Deleted candidate: {$candidate->name}");
        $candidate->delete();
        return redirect()->route('candidates.index')->with('success', 'Kandidat berhasil dihapus.');
    }
}