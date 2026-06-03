@extends('layouts.app')

@section('content')
<!-- Tier-0 Cryptographic Ledger Dashboard UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .token-dashboard-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    /* Top Navigation Action Engine */
    .dashboard-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #000000;
        letter-spacing: -0.04em;
    }

    .btn-supreme-generate {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.7rem 1.5rem;
        border-radius: 12px;
        background: #000000;
        color: #ffffff;
        border: 1px solid #000000;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-supreme-generate:hover {
        background: #1f1f1f;
        border-color: #1f1f1f;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    /* Premium Data Grid Table Framework */
    .quantum-table-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 24px;
        box-shadow: 
            0 1px 2px rgba(0,0,0,0.01),
            0 8px 16px rgba(0,0,0,0.01),
            0 24px 48px -8px rgba(0,0,0,0.03);
        overflow: hidden;
    }

    .table-supreme {
        margin-bottom: 0 !important;
    }

    .table-supreme thead th {
        background-color: #fafafa !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06) !important;
        color: #52525b !important; /* Zinc 600 */
        font-size: 0.725rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1.15rem 1.5rem !important;
    }

    .table-supreme tbody td {
        padding: 1.25rem 1.5rem !important;
        color: #18181b; /* Zinc 900 */
        font-size: 0.9rem;
        font-weight: 500;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04) !important;
        background-color: #ffffff;
        transition: background-color 0.2s ease;
    }

    .table-supreme tbody tr:hover td {
        background-color: #fafafa !important;
    }

    .meta-voter-name {
        font-weight: 700;
        color: #000000;
    }

    /* Secure Monospaced Token Display Box */
    .ledger-token-code {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.85rem;
        font-weight: 700;
        color: #4f46e5 !important; /* Premium Indigo 600 */
        background: rgba(79, 70, 229, 0.05);
        border: 1px solid rgba(79, 70, 229, 0.12);
        padding: 0.35rem 0.65rem;
        border-radius: 8px;
        display: inline-block;
        letter-spacing: -0.01em;
    }

    /* Minimalist High-Contrast Badge Nodes */
    .node-badge-flat {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.35rem 0.75rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .node-badge-emerald {
        background-color: rgba(16, 185, 129, 0.06);
        border: 1px solid rgba(16, 185, 129, 0.15);
        color: #065f46;
    }

    .node-badge-zinc {
        background-color: #f4f4f5;
        border: 1px solid rgba(0, 0, 0, 0.04);
        color: #71717a;
    }

    .node-badge-rose {
        background-color: rgba(244, 63, 94, 0.06);
        border: 1px solid rgba(244, 63, 94, 0.15);
        color: #9f1239;
    }

    /* Sleek Micro-Action Control Center */
    .btn-micro-action {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.4rem 0.85rem;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.08);
        background: #ffffff;
        color: #27272a;
        transition: all 0.15s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .btn-micro-action:hover {
        background: #fafafa;
        border-color: rgba(0, 0, 0, 0.15);
        color: #000000;
    }

    .btn-micro-delete {
        color: #ef4444;
    }

    .btn-micro-delete:hover {
        background: #fff5f5;
        border-color: rgba(239, 68, 68, 0.15);
        color: #b91c1c;
    }
</style>

<div class="token-dashboard-wrapper py-3">
    
    <!-- Header Layer Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="dashboard-title mb-1">Manajemen Token Distribusi</h3>
            <p class="text-muted small m-0" style="color: #71717a;">Pembuatan massal, audit status verifikasi, dan kontrol penggunaan token enkripsi.</p>
        </div>
        <a href="{{ route('tokens.create') }}" class="btn-supreme-generate">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            Generate & Email Token
        </a>
    </div>

    <!-- Data Matrix Platform Board -->
    <div class="card quantum-table-card border-0">
        <div class="table-responsive">
            <table class="table table-supreme table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama Pemilih</th>
                        <th>Token Kode</th>
                        <th>Status Verifikasi Pemilih</th>
                        <th>Status Penggunaan</th>
                        <th class="text-end" style="padding-right: 1.5rem !important;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tokens as $t)
                    <tr>
                        <!-- Column 1: Voter Identity -->
                        <td>
                            <div class="meta-voter-name">{{ $t->user->name }}</div>
                        </td>
                        
                        <!-- Column 2: Cryptographic Token Code -->
                        <td>
                            <span class="ledger-token-code">{{ $t->token }}</span>
                        </td>
                        
                        <!-- Column 3: Voter Verification Status Mapping -->
                        <td>
                            @if($t->is_verified)
                                <span class="node-badge-flat node-badge-emerald">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    Verified
                                </span>
                            @else
                                <span class="node-badge-flat node-badge-zinc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    Unverified
                                </span>
                            @endif
                        </td>
                        
                        <!-- Column 4: Token Usage Status Mapping -->
                        <td>
                            @if($t->used_at)
                                <span class="node-badge-flat node-badge-rose">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Used (Hangus)
                                </span>
                            @else
                                <span class="node-badge-flat node-badge-emerald">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Active
                                </span>
                            @endif
                        </td>
                        
                        <!-- Column 5: Action Controllers -->
                        <td class="text-end" style="padding-right: 1.5rem !important;">
                            <div class="d-inline-flex gap-1.5" style="gap: 0.35rem;">
                                <a href="{{ route('tokens.show', $t->id) }}" class="btn-micro-action">
                                    Detail
                                </a>
                                <a href="{{ route('tokens.edit', $t->id) }}" class="btn-micro-action">
                                    Ubah
                                </a>
                                <form action="{{ route('tokens.destroy', $t->id) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus token milik {{ $t->user->name }}?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-micro-action btn-micro-delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection