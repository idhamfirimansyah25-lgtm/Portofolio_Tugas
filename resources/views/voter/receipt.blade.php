@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .receipt-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    /* Minimalist Elegant Floating Receipt Container */
    .quantum-receipt-card {
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

    /* Success Icon Animated Frame */
    .success-icon-frame {
        width: 72px;
        height: 72px;
        background: rgba(16, 185, 129, 0.06);
        border: 1px solid rgba(16, 185, 129, 0.15);
        color: #10b981; /* Emerald 500 */
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .success-icon-frame::after {
        content: '';
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 1px dashed rgba(16, 185, 129, 0.3);
        animation: spinClockwise 20s linear infinite;
    }

    @keyframes spinClockwise {
        100% { transform: rotate(360deg); }
    }

    /* Structured Invoice-Style Meta Box */
    .crypto-invoice-box {
        background-color: #fafafa; /* Zinc 50 */
        border: 1px dashed rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 2rem;
        text-align: left;
    }

    .invoice-row {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        padding-bottom: 1rem;
        margin-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .invoice-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .invoice-label {
        font-size: 0.725rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #71717a; /* Zinc 500 */
    }

    .invoice-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #18181b; /* Zinc 900 */
    }

    /* Tech Textarea Block for Raw Hashes */
    .tech-code-block {
        font-family: 'JetBrains Mono', monospace;
        background-color: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 0.8rem;
        color: #27272a; /* Zinc 800 */
        word-break: break-all;
        line-height: 1.5;
        display: block;
        margin-top: 0.35rem;
    }

    .tech-code-block-indigo {
        color: #4f46e5;
        background-gradient: linear-gradient(90deg, rgba(79, 70, 229, 0.02), transparent);
    }

    /* Back Navigation Button */
    .btn-supreme-secondary {
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

    .btn-supreme-secondary:hover {
        background: #fafafa;
        border-color: rgba(0, 0, 0, 0.2);
        color: #000000;
    }

    /* Print utility utility */
    @media print {
        body { background: #ffffff; }
        .btn-supreme-secondary, .success-icon-frame::after { display: none !important; }
        .quantum-receipt-card { border: none !important; box-shadow: none !important; }
    }
</style>

<div class="receipt-canvas-wrapper row justify-content-center pt-4">
    <div class="col-lg-7 col-md-9">
        
        <div class="card quantum-receipt-card border-0">
            <div class="card-body p-5 text-center">
                
                <div class="success-icon-frame">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                </div>
                
                <h2 class="fw-extrabold text-black tracking-tight mb-2" style="font-size: 1.75rem;">
                    Bukti Voting Digital
                </h2>
                <p class="text-muted small mx-auto mb-5" style="max-width: 420px; color: #71717a;">
                    Hak suara Anda telah berhasil didekripsi, divalidasi oleh simpul jaringan, dan diamankan di dalam database utama.
                </p>
                
                <div class="crypto-invoice-box mb-4">
                    
                    <div class="invoice-row">
                        <span class="invoice-label">Identitas Pemilih</span>
                        <span class="invoice-value">{{ $user->name }}</span>
                    </div>
                    
                    <div class="invoice-row">
                        <span class="invoice-label">Waktu Transaksi (Timestamp)</span>
                        <span class="invoice-value font-monospace" style="font-size: 0.875rem;">
                            {{ $user->vote->created_at ?? now() }}
                        </span>
                    </div>
                    
                    <div class="invoice-row">
                        <span class="invoice-label">Encrypted Vote Payload (AES-256)</span>
                        <span class="tech-code-block">
                            {{ $user->vote->encrypted_vote ?? 'N/A' }}
                        </span>
                    </div>
                    
                    <div class="invoice-row">
                        <span class="invoice-label">Digital Signature Hash (SHA-256)</span>
                        <span class="tech-code-block tech-code-block-indigo">
                            {{ $user->vote->vote_hash ?? 'N/A' }}
                        </span>
                    </div>
                    
                </div>
                
                <p class="text-muted small px-3 mb-5" style="font-size: 0.775rem; line-height: 1.5; color: #71717a !important;">
                    * <strong>Catatan Integritas:</strong> Nilai Hash unik di atas diekstrak langsung dari tanda tangan digital Anda. Nilai ini digunakan oleh auditor independen untuk memastikan bahwa catatan pilihan Anda bersifat 100% mutlak dan tidak dapat dimanipulasi oleh pihak mana pun di server.
                </p>

                <div class="d-flex align-items-center justify-content-center gap-3 border-top pt-4" style="border-color: rgba(0, 0, 0, 0.06) !important;">
                    <button onclick="window.print();" class="btn-supreme-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                        Cetak Struk
                    </button>
                    <a href="{{ url('/') }}" class="btn-supreme-secondary" style="background-color: #000000; color: #ffffff; border-color: #000000;">
                        Selesai & Keluar
                    </a>
                </div>

            </div>
        </div>
        
    </div>
</div>
@endsection