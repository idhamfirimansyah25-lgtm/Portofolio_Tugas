<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use App\Http\Requests\ImportVoterRequest;
use App\Imports\VotersImport;
use App\Services\AuditLogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected AuditLogService $audit;

    public function __construct(AuditLogService $audit)
    {
        $this->audit = $audit;
    }

    public function index(Request $request): View
    {
        $search = $request->input('search');
        
        $voters = User::where('role', 'voter')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->with(['votingToken', 'vote']) // Eager load relations to prevent N+1 queries
            ->orderBy('nim', 'asc')
            ->paginate(15);

        return view('admin.voters.index', compact('voters', 'search'));
    }

    public function store(StoreVoterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'voter';
        $data['has_voted'] = false;

        $voter = User::create($data);

        $this->audit->log("Administrator menambahkan pemilih baru secara manual. NIM: {$voter->nim}, Nama: {$voter->name}");

        return redirect()->route('admin.voters.index')->with('success', "Pemilih {$voter->name} berhasil ditambahkan.");
    }

    public function update(UpdateVoterRequest $request, $id): RedirectResponse
    {
        $voter = User::where('role', 'voter')->findOrFail($id);
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $voter->update($data);

        $this->audit->log("Administrator memperbarui data pemilih. NIM: {$voter->nim}, Nama: {$voter->name}");

        return redirect()->route('admin.voters.index')->with('success', "Pemilih {$voter->name} berhasil diperbarui.");
    }

    public function destroy($id): RedirectResponse
    {
        $voter = User::where('role', 'voter')->findOrFail($id);
        $nim = $voter->nim;
        $name = $voter->name;

        $voter->delete();

        $this->audit->log("Administrator menghapus pemilih. NIM: {$nim}, Nama: {$name}");

        return redirect()->route('admin.voters.index')->with('success', "Pemilih {$name} berhasil dihapus.");
    }

    public function import(ImportVoterRequest $request): RedirectResponse
    {
        Excel::import(new VotersImport, $request->file('file'));

        $this->audit->log("Administrator melakukan import data pemilih secara massal melalui file Excel.");

        return redirect()->route('admin.voters.index')->with('success', "Data pemilih berhasil diimport.");
    }
}
