@extends('layouts.app')

@section('content')
<!-- High-End Crypto Real Count Monitoring Dashboard Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .realcount-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    /* Premium Micro-Animations & Header Elements */
    .pulse-secure-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.2);
        padding: 0.375rem 0.875rem;
        border-radius: 99px;
        color: #047857;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.03em;
    }

    .pulse-dot-green {
        width: 6px;
        height: 6px;
        background-color: #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.5);
        animation: securePulse 2s infinite;
    }

    @keyframes securePulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.5); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    /* Dramatic Cyberpunk Alert Warning Box */
    .cyber-panic-alert {
        background: #fff1f2; /* Rose 50 */
        border: 1px dashed #f43f5e; /* Rose 500 */
        border-radius: 16px;
        color: #9f1239; /* Rose 800 */
        font-size: 0.9rem;
        line-height: 1.6;
        box-shadow: 0 10px 15px -3px rgba(244, 63, 94, 0.05);
    }

    /* Elegant Grid Analytics Card Asset */
    .candidate-metric-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }

    .candidate-metric-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #4f46e5 0%, #06b6d4 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .candidate-metric-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        border-color: #cbd5e1;
    }

    .candidate-metric-card:hover::before {
        opacity: 1;
    }

    /* Giant Numbers Optimization */
    .card-giant-tag {
        font-family: 'JetBrains Mono', monospace;
        font-size: 3.5rem;
        font-weight: 800;
        color: #e2e8f0;
        line-height: 1;
        letter-spacing: -0.05em;
    }

    .card-main-counter {
        font-size: 4rem;
        font-weight: 800;
        letter-spacing: -0.05em;
        background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1.1;
    }

    /* Premium Export Button styling (Stripe Interface Concept) */
    .btn-export-saas {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.65rem 1.25rem;
        border-radius: 10px;
        background-color: #ffffff;
        border: 1px solid #cbd5e1;
        color: #334155;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }

    .btn-export-saas:hover {
        background-color: #f8fafc;
        border-color: #94a3b8;
        color: #0f172a;
    }
</style>

<div class="realcount-wrapper py-3">
    
    <!-- Top Dashboard Header Hub -->
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-5">
        <div>
            <div class="d-flex align-items-center gap-2 mb-2">
                <h3 class="fw-extrabold text-dark tracking-tight m-0" style="font-size: 1.6rem; color: #0f172a; letter-spacing: -0.03em;">
                    Hasil Perolehan Suara
                </h3>
                <span class="pulse-secure-pill">
                    <span class="pulse-dot-green"></span>
                    KRIPTOGRAFI REAL COUNT
                </span>
            </div>
            <p class="text-muted m-0 small" style="color: #64748b;">
                Penyajian visual kalkulasi matriks suara langsung dari relasi node database terenkripsi.
            </p>
        </div>
        
        <!-- Action Control System -->
        <div class="flex-shrink-0">
            <a href="{{ route('results.export') }}" class="btn-export-saas">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Export Hasil Akhir (.CSV)
            </a>
        </div>
    </div>

    <!-- Intrusion Detection System Banner Trigger -->
    @if($invalidVotesCount > 0)
    <div class="alert cyber-panic-alert p-4 mb-5 border-0 d-flex align-items-start gap-3 shadow-sm">
        <div class="p-2 rounded-3 bg-white border border-danger-subtle flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#e11d48" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <div>
            <h6 class="fw-extrabold m-0 mb-1" style="color: #9f1239; letter-spacing: -0.01em;">SECURITY ALERT: Deteksi Intervensi Enkripsi Data</h6>
            <p class="m-0 small" style="color: #be123c; opacity: 0.95;">
                Terdeteksi sekitar <strong>{{ $invalidVotesCount }}</strong> record suara ilegal yang gagal melewati validasi algoritma **SHA-256 Integrity Signature** di database! Seluruh entitas manipulasi tersebut secara otomatis diisolasi dan dikeluarkan dari total akumulasi grafik di bawah ini demi akurasi pemilu.
            </p>
        </div>
    </div>
    @endif

    <!-- Candidates Analytics Engine Metrics Grid -->
    <div class="row g-4">
        @foreach($candidates as $candidate)
        <div class="col-md-6">
            <div class="card candidate-metric-card border-0">
                <div class="card-body p-5">
                    
                    <!-- Card Meta Grid Header -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <span class="card-giant-tag">#{{ $candidate->candidate_number }}</span>
                        <div class="px-3 py-1 font-monospace bg-light border text-muted rounded-pill" style="font-size: 0.7rem; font-weight: 600;">
                            SECURE LOG ENTRY
                        </div>
                    </div>
                    
                    <!-- Name Plate Typography -->
                    <h3 class="fw-extrabold text-dark tracking-tight mb-2" style="font-size: 1.5rem; color: #0f172a !important;">
                        {{ $candidate->name }}
                    </h3>
                    <p class="text-muted small border-bottom pb-4 mb-4" style="color: #64748b; font-size: 0.85rem;">
                        Perolehan Total Suara Terdekripsi Aman:
                    </p>
                    
                    <!-- Main Counting Unit Block -->
                    <div class="d-flex align-items-baseline gap-2">
                        <span class="card-main-counter font-monospace">
                            {{ $candidate->votes_count }}
                        </span>
                        <span class="text-muted font-monospace fw-bold small" style="font-size: 0.9rem; letter-spacing: 0.05em; color: #64748b !important;">
                            VOTES VALIDATED
                        </span>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection