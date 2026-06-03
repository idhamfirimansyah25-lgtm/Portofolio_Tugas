@extends('layouts.app')

@section('content')
<!-- Tier-0 Premium Security Token Audit Ledger UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .audit-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        padding-top: 2.5rem;
    }

    /* Minimalist Elegant Architectural Audit Card Container */
    .quantum-audit-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 28px;
        box-shadow: 
            0 1px 2px rgba(0,0,0,0.01),
            0 12px 24px rgba(0,0,0,0.01),
            0 32px 64px -12px rgba(0,0,0,0.04);
        position: relative;
        overflow: hidden;
    }

    /* Laser Cyan Security Ribbon */
    .quantum-audit-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #06b6d4, #3b82f6); /* Secure Cyan-Blue Gradient */
    }

    /* Row Matrix Audit Ledger Structure */
    .audit-ledger-stack {
        display: flex;
        flex-direction: column;
        gap: 0.1px; /* Pure geometric separation */
    }

    .audit-ledger-row {
        display: flex;
        flex-direction: column;
        padding: 1.15rem 1.25rem;
        background-color: #ffffff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background-color 0.15s ease;
    }

    @media (min-width: 576px) {
        .audit-ledger-row {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
    }

    .audit-ledger-row:last-child {
        border-bottom: none;
    }

    .audit-ledger-row:hover {
        background-color: #fafafa; /* Zinc 50 row isolation */
    }

    /* Meta-Data Typography */
    .audit-row-meta {
        text-align: left;
    }

    .audit-row-label {
        font-size: 0.725rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #71717a; /* Zinc 500 */
        margin-bottom: 0.15rem;
        display: block;
    }

    .audit-row-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #18181b; /* Zinc 900 */
    }

    /* Secure Monospaced Token Value Overrides */
    .audit-token-vault {
        font-family: 'JetBrains Mono', monospace;
        font-size: 1.15rem;
        font-weight: 700;
        color: #ffffff !important;
        background: #000000; /* High Contrast Solid Black Badge */
        padding: 0.4rem 1rem;
        border-radius: 10px;
        display: inline-block;
        letter-spacing: 2px;
        text-indent: 2px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .audit-mono-timestamp {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.875rem;
        font-weight: 500;
        color: #27272a;
    }

    /* Premium Status Pill Badges */
    .audit-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.3rem 0.75rem;
        border-radius: 8px;
        font-size: 0.775rem;
        font-weight: 700;
    }

    .status-badge-emerald {
        background-color: rgba(16, 185, 129, 0.06);
        border: 1px solid rgba(16, 185, 129, 0.15);
        color: #065f46;
    }

    .status-badge-rose {
        background-color: rgba(244, 63, 94, 0.06);
        border: 1px solid rgba(244, 63, 94, 0.15);
        color: #9f1239;
    }

    .status-badge-zinc {
        background-color: #f4f4f5;
        border: 1px solid rgba(0, 0, 0, 0.04);
        color: #71717a;
    }

    /* Back Utility controller link */
    .btn-supreme-back {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        background: #ffffff;
        color: #27272a;
        border: 1px solid rgba(0, 0, 0, 0.12);
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 1px 2px rgba(0,0,0,0.02);
    }

    .btn-supreme-back:hover {
        background: #fafafa;
        border-color: rgba(0, 0, 0, 0.2);
        color: #000000;
    }
</style>

<div class="audit-canvas-wrapper row justify-content-center">
    <div class="col-lg-6 col-md-8">
        
        <!-- Main Audit Card Component -->
        <div class="card quantum-audit-card border-0">
            <div class="card-body p-0" style="padding: 2.75rem 2.5rem !important;">
                
                <!-- Section Header Visual Integration -->
                <div class="d-flex align-items-center gap-3.5 mb-4 pb-2" style="gap: 1rem;">
                    <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: rgba(6, 182, 212, 0.06); border: 1px solid rgba(6, 182, 212, 0.15); color: #06b6d4;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <div class="text-start">
                        <h4 class="fw-extrabold text-black m-0" style="letter-spacing: -0.03em; font-size: 1.35rem;">Informasi Detail Log Token</h4>
                        <p class="text-muted small m-0" style="color: #71717a;">Data telemetri otentikasi kunci enkripsi sistem e-voting.</p>
                    </div>
                </div>

                <!-- Structured Audit Row Stack Matrix -->
                <div class="audit-ledger-stack border rounded-4 overflow-hidden mb-4.5" style="border-color: rgba(0,0,0,0.07) !important; margin-bottom: 2.25rem;">
                    
                    <!-- Row 1: Pemilik Token -->
                    <div class="audit-ledger-row">
                        <div class="audit-row-meta">
                            <span class="audit-row-label">Pemilik Token</span>
                            <span class="audit-row-value" style="color: #000000; font-weight: 700;">{{ $token->user->name }}</span>
                        </div>
                    </div>

                    <!-- Row 2: Alamat Email -->
                    <div class="audit-ledger-row">
                        <div class="audit-row-meta">
                            <span class="audit-row-label">Alamat Email</span>
                            <span class="audit-row-value" style="font-weight: 500;">{{ $token->user->email }}</span>
                        </div>
                    </div>

                    <!-- Row 3: Kode Token Rahasia -->
                    <div class="audit-ledger-row">
                        <div class="audit-row-meta mb-2 mb-sm-0">
                            <span class="audit-row-label">Kode Token Rahasia</span>
                        </div>
                        <div>
                            <span class="audit-token-vault">{{ $token->token }}</span>
                        </div>
                    </div>

                    <!-- Row 4: Status Verifikasi Alur -->
                    <div class="audit-ledger-row">
                        <div class="audit-row-meta mb-2 mb-sm-0">
                            <span class="audit-row-label">Sudah Verifikasi Alur</span>
                        </div>
                        <div>
                            @if($token->is_verified)
                                <span class="audit-status-badge status-badge-emerald">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    Terverifikasi (Ya)
                                </span>
                            @else
                                <span class="audit-status-badge status-badge-zinc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    Belum Diverifikasi
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Row 5: Tanggal Penggunaan Coblos -->
                    <div class="audit-ledger-row">
                        <div class="audit-row-meta mb-2 mb-sm-0">
                            <span class="audit-row-label">Tanggal Penggunaan Coblos</span>
                        </div>
                        <div>
                            @if($token->used_at)
                                <span class="audit-status-badge status-badge-rose mb-1.5 d-inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Sudah Digunakan (Hangus)
                                </span>
                                <div class="audit-mono-timestamp text-sm-end text-start ps-1 ps-sm-0">
                                    {{ $token->used_at }}
                                </div>
                            @else
                                <span class="audit-status-badge status-badge-emerald">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                    Belum Digunakan (Aktif)
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <!-- Footer Action Controller Node -->
                <div class="d-flex align-items-center justify-content-start border-top pt-4" style="border-color: rgba(0, 0, 0, 0.06) !important;">
                    <a href="{{ route('tokens.index') }}" class="btn-supreme-back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali ke Manajemen Token
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection