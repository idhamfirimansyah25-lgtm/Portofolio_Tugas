@extends('layouts.app')

@section('content')
<!-- Tier-0 Premium Security Key Modification UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .form-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        padding-top: 2.5rem;
    }

    /* Minimalist Elegant Architectural Modification Card Container */
    .quantum-form-card {
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

    /* Ambient Subtle Amber Operational Ribbon */
    .quantum-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #f59e0b, #d97706); /* Security override amber amber warning */
    }

    /* Premium Form Typography Header */
    .form-pane-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #000000;
        letter-spacing: -0.04em;
    }

    .form-pane-subtitle {
        font-size: 0.85rem;
        color: #71717a; /* Zinc 500 */
        line-height: 1.5;
    }

    /* Structural Input Groups */
    .supreme-field-group {
        margin-bottom: 2rem;
    }

    .supreme-field-group .form-label {
        font-size: 0.775rem;
        font-weight: 700;
        color: #18181b; /* Zinc 900 */
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 0.75rem;
        display: block;
    }

    /* High-End Industrial Monospaced Input Override */
    .supreme-token-control {
        background-color: #fafafa; /* Zinc 50 */
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 14px;
        padding: 1rem;
        font-family: 'JetBrains Mono', monospace;
        font-size: 1.5rem;
        font-weight: 700;
        color: #4f46e5; /* Sophisticated Cryptographic Indigo */
        letter-spacing: 6px !important;
        text-indent: 6px; /* Balance the padding alignment from letter spacing */
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .supreme-token-control:focus {
        background-color: #ffffff;
        border-color: #000000;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.04);
        outline: none;
    }

    /* Form Inline Error Custom States */
    .supreme-token-control.is-invalid {
        border-color: #ef4444 !important;
        background-color: #fff5f5;
        color: #ef4444;
    }

    .field-error-msg {
        font-size: 0.775rem;
        font-weight: 500;
        color: #ef4444;
        margin-top: 0.5rem;
        letter-spacing: 0;
    }

    /* Premium Solid Black Vercel Button */
    .btn-supreme-submit {
        font-weight: 600;
        font-size: 0.925rem;
        padding: 0.85rem;
        border-radius: 12px;
        background: #000000;
        color: #ffffff;
        border: 1px solid #000000;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .btn-supreme-submit:hover {
        background: #1f1f1f;
        border-color: #1f1f1f;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    /* Back Utility link style */
    .btn-form-back {
        font-size: 0.85rem;
        font-weight: 600;
        color: #71717a;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        transition: color 0.15s ease;
    }

    .btn-form-back:hover {
        color: #000000;
    }
</style>

<div class="form-canvas-wrapper row justify-content-center">
    <div class="col-lg-6 col-md-8">
        
        <!-- Top Navigation Operational Link -->
        <div class="mb-4">
            <a href="{{ route('tokens.index') }}" class="btn-form-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Manajemen Token
            </a>
        </div>

        <!-- Main Modification Form Card -->
        <div class="card quantum-form-card border-0">
            <div class="card-body" style="padding: 2.75rem 2.5rem;">
                
                <!-- Section Header Typography -->
                <div class="mb-4.5" style="margin-bottom: 2rem;">
                    <h4 class="form-pane-title mb-1.5">Ubah Token Secara Manual</h4>
                    <p class="form-pane-subtitle">Ganti paksa nilai kunci keamanan token milik node pengguna ini. Pastikan kunci baru unik dan terpola.</p>
                </div>

                <!-- Secure Core Processing Form -->
                <form action="{{ route('tokens.update', $token->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Core Action Field Layer -->
                    <div class="supreme-field-group">
                        <label class="form-label text-center">Kode Token Baru (Wajib 6 Karakter)</label>
                        <input 
                            type="text" 
                            name="token" 
                            value="{{ old('token', $token->token) }}"
                            class="form-control text-center supreme-token-control @error('token') is-invalid @enderror" 
                            maxlength="6" 
                            required 
                            autofocus
                        >
                        @error('token')
                            <div class="field-error-msg text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Execution Submit Trigger Node -->
                    <button type="submit" class="btn btn-supreme-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>
                        Perbarui Token Kriptografi
                    </button>
                    
                </form>
                
            </div>
        </div>

    </div>
</div>
@endsection