@extends('layouts.app')

@section('content')
<!-- Tier-0 Premium Token Generation Form UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .form-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        padding-top: 2.5rem;
    }

    /* Minimalist Elegant Architectural Card Container */
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

    /* Ambient Subtle Indigo/Violet Generation Ribbon */
    .quantum-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #6366f1, #a855f7);
    }

    /* Premium Form Typography Header */
    .form-pane-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #000000;
        letter-spacing: -0.04em;
    }

    /* System Operational Info Box Callout */
    .system-info-callout {
        background-color: #fafafa;
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 14px;
        padding: 1rem 1.25rem;
        font-size: 0.85rem;
        color: #52525b; /* Zinc 600 */
        line-height: 1.5;
        display: flex;
        gap: 0.75rem;
        align-items: flex-start;
    }

    .system-info-icon {
        color: #6366f1;
        flex-shrink: 0;
        margin-top: 0.15rem;
    }

    /* Structural Input Groups */
    .supreme-field-group {
        margin-bottom: 1.5rem;
    }

    .supreme-field-group .form-label {
        font-size: 0.775rem;
        font-weight: 700;
        color: #18181b; /* Zinc 900 */
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 0.5rem;
        display: block;
    }

    /* High-End Select Form Control Overrides */
    .supreme-form-select {
        background-color: #fafafa; /* Zinc 50 */
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.925rem;
        font-weight: 500;
        color: #000000;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
    }

    .supreme-form-select:focus {
        background-color: #ffffff;
        border-color: #000000;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.04);
        outline: none;
    }

    /* Form Inline Error Custom States */
    .supreme-form-select.is-invalid {
        border-color: #ef4444 !important;
        background-color: #fff5f5;
    }

    .field-error-msg {
        font-size: 0.775rem;
        font-weight: 500;
        color: #ef4444;
        margin-top: 0.35rem;
    }

    /* Premium Solid Black Submit Button */
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

    .btn-supreme-submit:active {
        transform: translateY(0);
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
        
        <!-- Top Operational Utility Link -->
        <div class="mb-4">
            <a href="{{ route('tokens.index') }}" class="btn-form-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Manajemen Token
            </a>
        </div>

        <!-- Main Form Unit Card -->
        <div class="card quantum-form-card border-0">
            <div class="card-body" style="padding: 2.75rem 2.5rem;">
                
                <!-- Section Header Typography -->
                <div class="mb-4" style="margin-bottom: 1.75rem;">
                    <h4 class="form-pane-title mb-3">Generate & Distribusi Token</h4>
                    
                    <!-- System Action Alert Guide Box -->
                    <div class="system-info-callout">
                        <svg class="system-info-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        <span>Sistem otomatis mengacak token unik 6 digit, merekam ke dalam basis data enkripsi, dan langsung memicu pengiriman notifikasi email SMTP ke mahasiswa tujuan.</span>
                    </div>
                </div>

                <!-- Secure Core Processing Unit Form -->
                <form action="{{ route('tokens.store') }}" method="POST">
                    @csrf
                    
                    <!-- Core Action Selection Field -->
                    <div class="supreme-field-group" style="margin-bottom: 2.25rem;">
                        <label class="form-label">Pilih Node Mahasiswa (DPT Tanpa Token)</label>
                        <select 
                            name="user_id" 
                            class="form-select supreme-form-select @error('user_id') is-invalid @enderror" 
                            required
                        >
                            <option value="">-- Pilih Entitas Mahasiswa --</option>
                            @foreach($votersWithoutToken as $v)
                                <option value="{{ $v->id }}" {{ old('user_id') == $v->id ? 'selected' : '' }}>
                                    {{ $v->name }} ({{ $v->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="field-error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Execution Submit Trigger Node -->
                    <button type="submit" class="btn btn-supreme-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Generate & Kirim Email Sekarang
                    </button>
                    
                </form>
                
            </div>
        </div>

    </div>
</div>
@endsection