<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreVoterRequest;
use Illuminate\Http\Request;
use App\Services\AuditLogService;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    protected AuditLogService $audit;
    public function __construct(AuditLogService $audit) { $this->audit = $audit; }

    public function index() {
        $voters = User::where('role', 'voter')->with(['votingToken', 'vote'])->get();
        return view('admin.voters.index', compact('voters'));
    }

    public function create() {
        return view('admin.voters.create');
    }

    public function store(StoreVoterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'voter';
        
        $voter = User::create($data);
        $this->audit->log("Registered voter: {$voter->email}");
        return redirect()->route('voters.index')->with('success', 'Pemilih berhasil ditambahkan.');
    }

    public function show(User $voter) {
        return view('admin.voters.show', compact('voter'));
    }

    public function edit(User $voter) {
        return view('admin.voters.edit', compact('voter'));
    }

    public function update(Request $request, User $voter) {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $voter->id,
        ];
        if($request->filled('password')) { $rules['password'] = 'required|min:6'; }
        
        $validated = $request->validate($rules);
        if($request->filled('password')) { $validated['password'] = Hash::make($validated['password']); }
        
        $voter->update($validated);
        $this->audit->log("Updated voter data ID: {$voter->id}");
        return redirect()->route('voters.index')->with('success', 'Data pemilih berhasil diperbarui.');
    }

    public function destroy(User $voter) {
        $this->audit->log("Removed voter ID: {$voter->id}");
        $voter->delete();
        return redirect()->route('voters.index')->with('success', 'Pemilih berhasil dihapus.');
    }
}