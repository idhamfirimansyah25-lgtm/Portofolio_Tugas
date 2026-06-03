@extends('layouts.app')

@section('content')
<!-- Tier-0 Hyper-SaaS Design Language (Vercel/Linear Inspired) -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .super-landing-container {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.03em;
        background-color: #fafafa; /* Ultra clean off-white background */
    }

    /* Cinematic Hero with Ambient Glow */
    .galaxy-hero {
        position: relative;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 32px;
        padding: 6.5rem 2rem;
        overflow: hidden;
        box-shadow: 
            0 1px 2px rgba(0,0,0,0.02),
            0 4px 12px rgba(0,0,0,0.02),
            0 12px 30px rgba(0,0,0,0.04);
    }

    /* Ambient aura backdrops */
    .galaxy-hero::before {
        content: '';
        position: absolute;
        top: -20%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.12) 0%, transparent 70%);
        filter: blur(40px);
        pointer-events: none;
    }

    .galaxy-hero::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -10%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, transparent 70%);
        filter: blur(40px);
        pointer-events: none;
    }


    .status-ping-or {
        width: 7px;
        height: 7px;
        background-color: #6366f1;
        border-radius: 50%;
        position: relative;
    }

    .status-ping-or::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background-color: #6366f1;
        animation: badgePing 1.8s infinite cubic-bezier(0, 0, 0.2, 1);
    }

    @keyframes badgePing {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(2.8); opacity: 0; }
    }

    /* Typography Engine */
    .cinema-title {
        font-size: 3.75rem;
        font-weight: 800;
        line-height: 1.1;
        color: #000000;
        letter-spacing: -0.05em;
    }

    .cinema-title span {
        background: linear-gradient(90deg, #4f46e5, #06b6d4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .cinema-subtitle {
        font-size: 1.2rem;
        color: #52525b; /* Zinc 600 */
        max-width: 640px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 400;
    }

    /* High-End Tech CTA */
    .btn-supreme-cta {
        font-weight: 600;
        font-size: 0.95rem;
        padding: 0.9rem 2.25rem;
        border-radius: 14px;
        background: #000000;
        color: #ffffff;
        border: 1px solid #000000;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-supreme-cta:hover {
        background: #1f1f1f;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Next-Gen Grid Cards */
    .quantum-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 28px;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    .quantum-card:hover {
        transform: translateY(-8px);
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: 
            0 1px 1px rgba(0,0,0,0.02),
            0 8px 16px rgba(0,0,0,0.03),
            0 24px 48px rgba(0,0,0,0.06);
    }

    /* Floating Structural Numbers */
    .structural-index {
        font-family: 'JetBrains Mono', monospace;
        font-size: 5rem;
        font-weight: 800;
        line-height: 0.8;
        letter-spacing: -0.06em;
        color: #f4f4f5; /* Zinc 100 */
        transition: color 0.3s ease;
    }

    .quantum-card:hover .structural-index {
        color: rgba(79, 70, 229, 0.08);
    }

    /* Content Styling inside cards */
    .card-section-indicator {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #71717a; /* Zinc 500 */
        display: flex;
        align-items: center;
        gap: 0.4rem;
        margin-bottom: 0.6rem;
    }

    .card-viewport-pane {
        background-color: #fafafa;
        border-radius: 16px;
        padding: 1.25rem;
        font-size: 0.9rem;
        line-height: 1.6;
        color: #27272a; /* Zinc 800 */
        font-weight: 500;
        border: 1px solid rgba(0, 0, 0, 0.03);
        white-space: pre-line;
    }
</style>

<div class="super-landing-container py-4">
    
    <!-- Hero Canvas Space -->
    <div class="galaxy-hero text-center mb-5">
        <div class="position-relative z-1">

            
            <h1 class="cinema-title mb-4">
                E-Voting Ketua Himpunan<br><span>Masa Depan Digital Kita</span>
            </h1>
            
            <p class="cinema-subtitle mb-5">
                Salurkan aspirasi Anda melalui platform penataan suara terdesentralisasi. Menjamin kerahasiaan absolut yang diproteksi segel integritas kriptografi.
            </p>
            
            @guest
            <div>
                <a class="btn-supreme-cta" href="{{ route('login') }}">
                    Mulai Berikan Suara
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
            @endguest
        </div>
    </div>

    <!-- Section Title Block -->
    <div class="d-flex flex-column align-items-center text-center my-5 py-2">
        <span class="text-indigo fw-bold font-monospace mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: #4f46e5;">Official Ballot Lineup</span>
        <h2 class="fw-extrabold m-0 text-black tracking-tight" style="font-size: 1.75rem; letter-spacing: -0.04em;">Daftar Kandidat Resmi</h2>
    </div>

    <!-- Quantum Showcase Matrix Grid -->
    <div class="row g-4">
        @foreach($candidates as $candidate)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card quantum-card border-0 w-100">
                <div class="card-body p-4.5 d-flex flex-column justify-content-between" style="padding: 2.25rem;">
                    
                    <div>
                        <!-- Card Core Header Grid -->
                        <div class="d-flex align-items-baseline justify-content-between mb-4">
                            <span class="structural-index">0{{ $candidate->candidate_number }}</span>
                            <span class="font-monospace text-muted" style="font-size: 0.65rem; letter-spacing: 0.05em; font-weight: 600; opacity: 0.6;">BLOCK ARCHIVE // OK</span>
                        </div>
                        
                        <!-- Candidate Master Name -->
                        <h4 class="fw-extrabold text-black mb-4" style="letter-spacing: -0.03em; font-size: 1.45rem;">
                            {{ $candidate->name }}
                        </h4>
                        
                        <!-- Segment Viewport: Visi -->
                        <div class="mb-4">
                            <span class="card-section-indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/></svg>
                                Dokumen Visi
                            </span>
                            <div class="card-viewport-pane">
                                {{ $candidate->vision }}
                            </div>
                        </div>
                    </div>

                    <!-- Segment Viewport: Misi -->
                    <div class="mt-2">
                        <span class="card-section-indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            Strategi & Misi Pelaksanaan
                        </span>
                        <div class="card-viewport-pane" style="min-height: 130px;">
                            {{ $candidate->mission }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection