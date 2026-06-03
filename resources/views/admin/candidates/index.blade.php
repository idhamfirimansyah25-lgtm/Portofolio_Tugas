@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500&display=swap');

    :root {
        --kandidat-font-main: 'Plus Jakarta Sans', sans-serif;
        --kandidat-font-mono: 'JetBrains Mono', monospace;
    }

    /* Base Styling Refinement */
    .crud-container {
        font-family: var(--kandidat-font-main);
        letter-spacing: -0.01em;
    }

    .saas-header-title {
        font-size: 1.625rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        color: #0f172a; /* Slate 900 */
    }

    /* Premium SaaS Card & Table */
    .saas-table-card {
        background: #ffffff;
        border: 1px solid #e2e8f0; /* Slate 200 */
        border-radius: 14px;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .saas-enterprise-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .saas-enterprise-table thead th {
        background-color: #f8fafc !important; /* Slate 50 */
        color: #475569 !important; /* Slate 600 */
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.725rem;
        letter-spacing: 0.06em;
        padding: 1.125rem 1.5rem;
        border-bottom: 2px solid #edf2f7;
    }

    .saas-enterprise-table tbody td {
        padding: 1.25rem 1.5rem;
        color: #334155; /* Slate 700 */
        border-bottom: 1px solid #f1f5f9;
        background-color: #ffffff;
    }

    .saas-enterprise-table tbody tr:last-child td {
        border-bottom: none;
    }

    .saas-enterprise-table tbody tr:hover td {
        background-color: #f8fafc; /* Subtle row highlight */
    }

    /* Custom Badges & Component Elements */
    .number-badge {
        font-family: var(--kandidat-font-mono);
        background-color: #f1f5f9;
        color: #0f172a;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1rem;
        border: 1px solid #e2e8f0;
    }

    /* Enterprise Action Buttons */
    .btn-saas-action {
        font-family: var(--kandidat-font-main);
        font-weight: 600;
        font-size: 0.84rem;
        padding: 0.55rem 1.15rem;
        border-radius: 10px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-saas-primary {
        background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
        border: none;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
    }

    .btn-saas-primary:hover {
        background: linear-gradient(135deg, #4338ca 0%, #2e2a87 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.25);
        color: #ffffff;
    }

    .btn-table-action {
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.45rem 0.875rem;
        border-radius: 8px;
        transition: all 0.15s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .btn-table-show {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        color: #334155;
    }

    .btn-table-show:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #0f172a;
    }

    .btn-table-edit {
        background-color: #fffbeb; /* Amber 50 */
        border: 1px solid #fde68a; /* Amber 200 */
        color: #b45309; /* Amber 700 */
    }

    .btn-table-edit:hover {
        background-color: #fef3c7;
        border-color: #fcd34d;
        color: #92400e;
    }

    .btn-table-delete {
        background-color: #fff5f5;
        border: 1px solid #fee2e2;
        color: #ef4444;
    }

    .btn-table-delete:hover {
        background-color: #fef2f2;
        border-color: #fca5a5;
        color: #dc2626;
    }
</style>

<div class="container-fluid px-4 py-4 crud-container" style="max-width: 1600px;">
    
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-5 gap-3">
        <div>
            <h3 class="saas-header-title m-0">Manajemen CRUD Kandidat</h3>
            <p class="text-muted small m-0 mt-1">Kelola data pasangan calon, nomor urut, serta ringkasan deskripsi visi secara terpusat.</p>
        </div>
        <a href="{{ route('candidates.create') }}" class="btn btn-saas-action btn-saas-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Kandidat Baru
        </a>
    </div>

    <div class="card saas-table-card border-0">
        <div class="table-responsive">
            <table class="table saas-enterprise-table table-hover align-middle m-0">
                <thead>
                    <tr>
                        <th style="width: 12%;" class="text-center">No Urut</th>
                        <th style="width: 25%;">Nama Lengkap</th>
                        <th style="width: 38%;">Visi Kandidat</th>
                        <th style="width: 25%;" class="text-center">Aksi Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($candidates as $c)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center">
                                <span class="number-badge">{{ $c->candidate_number }}</span>
                            </div>
                        </td>
                        
                        <td>
                            <span class="fw-bold text-slate-800" style="font-size: 0.95rem; color: #1e293b;">{{ $c->name }}</span>
                        </td>
                        
                        <td>
                            <span class="text-secondary small" style="line-height: 1.5;">{{ Str::limit($c->vision, 60) }}</span>
                        </td>
                        
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('candidates.show', $c->id) }}" class="btn-table-action btn-table-show">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Detail
                                </a>
                                
                                <a href="{{ route('candidates.edit', $c->id) }}" class="btn-table-action btn-table-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"/></svg>
                                    Edit
                                </a>
                                
                                <form action="{{ route('candidates.destroy', $c->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kandidat ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-table-action btn-table-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <div class="text-muted mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-neutral-300"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <span class="text-secondary small d-block">Data kandidat kosong. Klik tombol di kanan atas untuk menambah data.</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection