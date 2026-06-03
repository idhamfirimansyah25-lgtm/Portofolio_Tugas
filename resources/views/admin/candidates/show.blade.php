@extends('layouts.app')

@section('content')
<!-- Super High-End Creative Light SaaS UI Stylesheet (Show/Detail Layout) -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap');

    .creative-form-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        background-color: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #e2e8f0; /* Slate 200 */
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.01);
    }

    /* Left Side: Avatar & Identity Showcase Hero */
    .brand-presentation-side {
        background: radial-gradient(circle at 100% 0%, rgba(79, 70, 229, 0.07) 0%, transparent 60%),
                    linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
        border-right: 1px solid #e2e8f0;
        position: relative;
    }

    .neon-glow-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 0.375rem 0.875rem;
        border-radius: 99px;
        color: #4f46e5; /* Indigo 600 */
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }

    /* Giant Number Badge Asset */
    .giant-number-display {
        font-family: 'JetBrains Mono', monospace;
        font-size: 6.5rem;
        font-weight: 800;
        line-height: 1;
        background: linear-gradient(180deg, #4f46e5 0%, #312e81 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.05em;
    }

    /* Content Pane Typography styling */
    .detail-section-title {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #4f46e5; /* Indigo 600 */
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-reading-block {
        background-color: #f8fafc; /* Slate 50 */
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.5rem;
        font-size: 0.95rem;
        line-height: 1.7;
        color: #334155; /* Slate 700 */
        white-space: pre-line; /* Menjaga line-breaks database tetap rapi */
        font-weight: 500;
    }

    /* Vercel style Back Navigation Button */
    .cyber-btn {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        text-decoration: none;
    }

    .cyber-btn-secondary {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        color: #334155;
    }

    .cyber-btn-secondary:hover {
        background: #f8fafc;
        border-color: #94a3b8;
        color: #0f172a;
    }
</style>

<div class="py-3">
    <!-- Top Micro Navigation Grid -->
    <div class="mb-4 d-inline-block">
        <a href="{{ route('candidates.index') }}" class="text-decoration-none text-muted small d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            <span style="color: #64748b; font-weight: 500;">Kembali ke Daftar Utama</span>
        </a>
    </div>

    <!-- Main Asymmetric Document Window -->
    <div class="row g-0 creative-form-wrapper">
        
        <!-- Left Side: Profile Identity Presentation Hero Card -->
        <div class="col-lg-4 p-5 d-flex flex-column justify-content-between brand-presentation-side text-center text-lg-start">
            <div>
                <div class="mb-4">
                    <span class="neon-glow-pill mx-auto mx-lg-0">
                        KANDIDAT RESMI
                    </span>
                </div>
                
                <!-- Giant Visual Index Indicator -->
                <div class="my-4 d-flex justify-content-center justify-content-lg-start align-items-baseline">
                    <span class="text-muted small fw-bold font-monospace me-1" style="color: #94a3b8 !important;">PASLON</span>
                    <h1 class="giant-number-display m-0">#{{ $candidate->candidate_number }}</h1>
                </div>
                
                <h3 class="fw-extrabold text-dark tracking-tight mb-2" style="font-size: 1.65rem; letter-spacing: -0.03em; color: #0f172a; line-height: 1.25;">
                    {{ $candidate->name }}
                </h3>
                <p class="text-muted small m-0">Dokumen rekam jejak visi misi ini sah dan terverifikasi oleh sistem e-voting.</p>
            </div>

            <!-- Meta System Data Sign-off Footer -->
            <div class="pt-5 border-top mt-5 d-none d-lg-block" style="border-color: #e2e8f0 !important;">
                <span class="d-block text-muted style-code font-monospace" style="font-size: 0.7rem; letter-spacing: 0.05em;">SECURITY PROTOCOL ACTIVE</span>
                <span class="text-dark small fw-semibold" style="color: #64748b; font-size: 0.75rem;">Verified Database Entry Record #{{ $candidate->id }}</span>
            </div>
        </div>

        <!-- Right Side: Clean Executive Reading Layout (Vision/Mission) -->
        <div class="col-lg-8 p-5 bg-white">
            <div class="d-flex flex-column gap-5">
                
                <!-- Block Content 1: Visi -->
                <div>
                    <div class="detail-section-title mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>
                        Visi Strategis
                    </div>
                    <div class="content-reading-block">
                        {{ $candidate->vision }}
                    </div>
                </div>

                <!-- Block Content 2: Misi -->
                <div>
                    <div class="detail-section-title mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/></svg>
                        Misi & Langkah Kerja Terukur
                    </div>
                    <div class="content-reading-block" style="min-height: 180px;">
                        {{ $candidate->mission }}
                    </div>
                </div>

                <!-- Footer Control Buttons Row -->
                <div class="pt-4 border-top d-flex align-items-center justify-content-between mt-3" style="border-color: #e2e8f0 !important;">
                    <a href="{{ route('candidates.index') }}" class="cyber-btn cyber-btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali ke List
                    </a>

                    <!-- Shortcut Optional: Tombol cepat ke halaman edit -->
                    @if(Route::has('candidates.edit'))
                    <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-link text-decoration-none text-primary fw-bold small p-0 d-inline-flex align-items-center gap-1" style="font-size: 0.875rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"/></svg>
                        Ubah Profil Ini
                    </a>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>
@endsection