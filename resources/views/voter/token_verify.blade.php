@extends('layouts.app')

@section('content')
<!-- Tier-0 FinTech Secure Token UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .token-checkpoint-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Architectural Floating Identity Box */
    .quantum-token-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 28px;
        padding: 3.5rem 2.5rem;
        width: 100%;
        max-width: 460px;
        box-shadow: 
            0 1px 2px rgba(0,0,0,0.01),
            0 12px 24px rgba(0,0,0,0.02),
            0 32px 64px -12px rgba(0,0,0,0.06);
        position: relative;
        overflow: hidden;
    }

    /* Laser Edge Status Line Indicator */
    .quantum-token-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 160px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #10b981, #06b6d4, transparent);
    }

    /* Premium Typography */
    .checkpoint-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #000000;
        letter-spacing: -0.04em;
    }

    .checkpoint-subtitle {
        font-size: 0.875rem;
        color: #52525b; /* Zinc 600 */
        line-height: 1.6;
    }

    /* Monospaced Security Node Pill */
    .encryption-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(16, 185, 129, 0.05);
        border: 1px solid rgba(16, 185, 129, 0.15);
        padding: 0.4rem 1rem;
        border-radius: 99px;
        color: #047857; /* Emerald 700 */
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.05em;
    }

    /* Giant Monospaced Token Input Box */
    .supreme-token-input {
        font-family: 'JetBrains Mono', monospace;
        background-color: #fafafa;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 16px;
        padding: 1rem;
        font-size: 1.75rem;
        font-weight: 700;
        color: #000000 !important;
        text-transform: uppercase;
        letter-spacing: 6px;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        text-align: center;
    }

    .supreme-token-input:focus {
        background-color: #ffffff;
        border-color: #000000;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
        outline: none;
    }

    .supreme-token-input::placeholder {
        font-size: 1.15rem;
        letter-spacing: 2px;
        color: #a1a1aa; /* Zinc 400 */
        font-weight: 500;
        opacity: 0.7;
    }

    /* Error Input Validation Override */
    .supreme-token-input.is-invalid {
        border-color: #ef4444 !important;
        background-color: #fff5f5;
        color: #ef4444 !important;
    }

    /* Solid Black Vercel-style Submission CTA */
    .btn-supreme-submit {
        font-weight: 600;
        font-size: 0.95rem;
        padding: 0.9rem;
        border-radius: 14px;
        background: #000000;
        color: #ffffff;
        border: 1px solid #000000;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.625rem;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .btn-supreme-submit:hover {
        background: #1f1f1f;
        border-color: #1f1f1f;
        color: #ffffff;
        transform: translateY(-1.5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .btn-supreme-submit:active {
        transform: translateY(0);
    }
</style>

<div class="token-checkpoint-wrapper">
    <div class="quantum-token-card">
        
        <!-- Security Header Visual -->
        <div class="text-center mb-4.5" style="margin-bottom: 2rem;">
            <div class="mb-3">
                <span class="encryption-status-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    2-FACTOR BALLOT CHECKPOINT
                </span>
            </div>
            <h3 class="checkpoint-title mb-2">Verifikasi Token</h3>
            <p class="checkpoint-subtitle mx-auto" style="max-width: 360px;">
                Masukkan 6 digit kode token rahasia yang telah dikirim oleh Admin ke alamat email Anda.
            </p>
        </div>

        <!-- Integrated Error Framework Notification -->
        @if ($errors->has('token'))
        <div class="alert alert-danger border-0 p-3 mb-4 rounded-3 d-flex align-items-center gap-2.5" style="background: #fff5f5; color: #c53030; font-size: 0.85rem; font-weight: 500;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="17"/></svg>
            <div>
                {{ $errors->first('token') }}
            </div>
        </div>
        @endif

        <!-- Secure Form Execution Unit -->
        <form action="{{ route('voter.token') }}" method="POST" autocomplete="off">
            @csrf
            
            <!-- Input Segment Row -->
            <div class="mb-4">
                <input 
                    type="text" 
                    name="token" 
                    class="form-control supreme-token-input @error('token') is-invalid @enderror" 
                    placeholder="X7H2K9" 
                    maxlength="6" 
                    required 
                    autofocus
                >
            </div>
            
            <!-- Submit System Button -->
            <button type="submit" class="btn btn-supreme-submit">
                Validasi Token & Lanjutkan
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </button>
        </form>

    </div>
</div>
@endsection