@extends('layouts.app')

@section('content')
<!-- Tier-0 Enterprise Grid Dashboard UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .dpt-dashboard-wrapper {
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

    .btn-supreme-add {
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

    .btn-supreme-add:hover {
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

    .voter-meta-name {
        font-weight: 700;
        color: #000000;
    }

    .voter-meta-email {
        font-size: 0.8rem;
        color: #71717a; /* Zinc 500 */
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
        font-family: 'JetBrains Mono', monospace;
    }

    .node-badge-zinc {
        background-color: #f4f4f5;
        border: 1px solid rgba(0, 0, 0, 0.04);
        color: #71717a;
    }

    .node-badge-indigo {
        background-color: rgba(79, 70, 229, 0.06);
        border: 1px solid rgba(79, 70, 229, 0.15);
        color: #3730a3;
    }

    .node-badge-amber {
        background-color: rgba(245, 158, 11, 0.06);
        border: 1px solid rgba(245, 158, 11, 0.15);
        color: #92400e;
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

<div class="dpt-dashboard-wrapper py-3">
    
    <!-- Header Layer Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="dashboard-title mb-1">Daftar Pemilih (DPT)</h3>
            <p class="text-muted small m-0" style="color: #71717a;">Otorisasi, pemantauan status enkripsi, dan penataan hak suara.</p>
        </div>
        <a href="{{ route('voters.create') }}" class="btn-supreme-add">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Pemilih Baru
        </a>
    </div>

    <!-- Data Matrix Platform Board -->
    <div class="card quantum-table-card border-0">
        <div class="table-responsive">
            <table class="table table-supreme table-hover align-middle">
                <thead>
                    <tr>
                        <th>Pemilih / Node</th>
                        <th>Alamat Surat Elektronik</th>
                        <th>Otentikasi Token</th>
                        <th>Status Konsensus</th>
                        <th class="text-end" style="padding-right: 1.5rem !important;">Konfigurasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($voters as $v)
                    <tr>
                        <!-- Column 1: Name Segment -->
                        <td>
                            <div class="voter-meta-name">{{ $v->name }}</div>
                        </td>
                        
                        <!-- Column 2: Email -->
                        <td>
                            <span class="voter-meta-email">{{ $v->email }}</span>
                        </td>
                        
                        <!-- Column 3: Token Status Mapping -->
                        <td>
                            @if($v->votingToken)
                                <span class="node-badge-flat node-badge-emerald">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    {{ $v->votingToken->token }}
                                </span>
                            @else
                                <span class="node-badge-flat node-badge-zinc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Belum Ada
                                </span>
                            @endif
                        </td>
                        
                        <!-- Column 4: Vote System Status Mapping -->
                        <td>
                            @if($v->vote)
                                <span class="node-badge-flat node-badge-indigo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    Sudah Memilih
                                </span>
                            @else
                                <span class="node-badge-flat node-badge-amber">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    Belum Memilih
                                </span>
                            @endif
                        </td>
                        
                        <!-- Column 5: Action Interface Operations -->
                        <td class="text-end" style="padding-right: 1.5rem !important;">
                            <div class="d-inline-flex gap-1.5" style="gap: 0.35rem;">
                                <a href="{{ route('voters.show', $v->id) }}" class="btn-micro-action">
                                    Detail
                                </a>
                                <a href="{{ route('voters.edit', $v->id) }}" class="btn-micro-action">
                                    Ubah
                                </a>
                                <form action="{{ route('voters.destroy', $v->id) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pemilih {{ $v->name }}?')">
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