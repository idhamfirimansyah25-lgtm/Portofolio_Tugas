@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .profile-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        padding-top: 2.5rem;
    }

    /* Minimalist Elegant Architectural Profile Card */
    .quantum-profile-card {
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

    /* Laser Indigo Top Ribbon */
    .quantum-profile-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #6366f1, #a855f7);
    }

    /* Profile Info Grid Layout */
    .profile-data-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.25rem;
        text-align: left;
    }

    @media (min-width: 576px) {
        .profile-data-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Structured Node Block for Information */
    .info-node-block {
        background-color: #fafafa; /* Zinc 50 */
        border: 1px solid rgba(0, 0, 0, 0.04);
        border-radius: 14px;
        padding: 1rem 1.25rem;
    }

    .info-node-label {
        font-size: 0.725rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #71717a; /* Zinc 500 */
        margin-bottom: 0.35rem;
        display: block;
    }

    .info-node-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #18181b; /* Zinc 900 */
        word-break: break-all;
    }

    /* Special Monospaced Token / Date Badge */
    .mono-date-value {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.85rem;
        color: #27272a;
    }

    /* Dynamic Custom Role Badge */
    .role-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.25rem 0.65rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        background-color: rgba(99, 102, 241, 0.08);
        border: 1px solid rgba(99, 102, 241, 0.15);
        color: #4f46e5;
    }

    /* Back Button Custom Styling */
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

<div class="profile-canvas-wrapper row justify-content-center">
    <div class="col-lg-6 col-md-8">
        
        <div class="card quantum-profile-card border-0">
            <div class="card-body" style="padding: 2.75rem 2.5rem;">
                
                <div class="d-flex align-items-center gap-3.5 mb-4 pb-2" style="gap: 1rem;">
                    <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.06); color: #000000;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div class="text-start">
                        <h4 class="fw-extrabold text-black m-0" style="letter-spacing: -0.03em; font-size: 1.35rem;">Detail Akun Pemilih</h4>
                        <p class="text-muted small m-0" style="color: #71717a;">Informasi otorisasi dan pendaftaran entitas pemilih.</p>
                    </div>
                </div>

                <hr class="my-4" style="border-color: rgba(0,0,0,0.06);">

                <div class="profile-data-grid mb-4.5" style="margin-bottom: 2.25rem;">
                    
                    <div class="info-node-block">
                        <span class="info-node-label">Nama Lengkap</span>
                        <span class="info-node-value">{{ $voter->name }}</span>
                    </div>

                    <div class="info-node-block">
                        <span class="info-node-label">Role Hak Akses</span>
                        <div>
                            <span class="role-badge-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                {{ $voter->role ?? 'Voter' }}
                            </span>
                        </div>
                    </div>

                    <div class="info-node-block style" style="grid-column: span 1;">
                        <span class="info-node-label">Email Aktif</span>
                        <span class="info-node-value" style="font-weight: 500;">{{ $voter->email }}</span>
                    </div>

                    <div class="info-node-block">
                        <span class="info-node-label">Terdaftar Pada</span>
                        <span class="info-node-value mono-date-value">
                            {{ $voter->created_at ? $voter->created_at->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s') }}
                        </span>
                    </div>

                </div>

                <div class="d-flex align-items-center justify-content-start border-top pt-4" style="border-color: rgba(0, 0, 0, 0.06) !important;">
                    <a href="{{ route('voters.index') }}" class="btn-supreme-back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali ke Daftar DPT
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection