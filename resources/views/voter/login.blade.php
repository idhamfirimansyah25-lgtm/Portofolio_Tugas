@extends('layouts.app')

@section('content')
<!-- Tier-0 Luxury Auth Gateway UI Stylesheet (Linear/Stripe Inspired) -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .auth-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Architectural Floating Identity Box */
    .quantum-auth-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 28px;
        padding: 3rem 2.5rem;
        width: 100%;
        max-width: 440px;
        box-shadow: 
            0 1px 2px rgba(0,0,0,0.01),
            0 12px 24px rgba(0,0,0,0.02),
            0 32px 64px -12px rgba(0,0,0,0.06);
        position: relative;
        overflow: hidden;
    }

    /* Subtle security glow backdrop */
    .quantum-auth-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 140px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #4f46e5, #06b6d4, transparent);
    }

    /* Premium Typography */
    .auth-gateway-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #000000;
        letter-spacing: -0.04em;
    }

    .auth-gateway-subtitle {
        font-size: 0.875rem;
        color: #52525b; /* Zinc 600 */
        line-height: 1.5;
    }



    /* High-End Input Control fields */
    .supreme-form-group {
        position: relative;
    }

    .supreme-form-group .form-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #18181b; /* Zinc 900 */
        text-transform: uppercase;
        letter-spacing: 0.03em;
        margin-bottom: 0.5rem;
    }

    .supreme-input {
        background-color: #fafafa;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        font-weight: 500;
        color: #000000;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .supreme-input:focus {
        background-color: #ffffff;
        border-color: #000000;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
        outline: none;
    }

    /* Error Validation Input state */
    .supreme-input.is-invalid {
        border-color: #ef4444 !important;
        background-color: #fff5f5;
    }

    .supreme-input.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
    }

    /* Black Solid Vercel-Style CTA */
    .btn-supreme-auth {
        font-weight: 600;
        font-size: 0.95rem;
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

    .btn-supreme-auth:hover {
        background: #1f1f1f;
        border-color: #1f1f1f;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .btn-supreme-auth:active {
        transform: translateY(0);
    }
</style>

<div class="auth-canvas-wrapper">
    <div class="quantum-auth-card">
        
        <!-- Top Tech Identity Branding -->
        <div class="text-center mb-4">

            <h3 class="auth-gateway-title mb-1">Sistem Login</h3>
            <p class="auth-gateway-subtitle">Masukkan kredensial terdaftar untuk mengakses node bilik suara digital Anda.</p>
        </div>

        <!-- Global Alert Error Framework (Optional Laravel Standard) -->
        @if ($errors->any())
        <div class="alert alert-danger border-0 p-3 mb-4 rounded-3 d-flex align-items-start gap-2.5" style="background: #fff5f5; color: #c53030; font-size: 0.85rem; font-weight: 500;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <div>
                <ul class="m-0 p-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- Secure Form Processing Unit -->
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            
            <!-- Row 1: Email Address Field -->
            <div class="supreme-form-group mb-3.5" style="margin-bottom: 1rem;">
                <label class="form-label">Alamat Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="form-control supreme-input @error('email') is-invalid @enderror" 
                    placeholder="nama@domain.com"
                    required 
                    autofocus
                >
            </div>
            
            <!-- Row 2: Encrypted Password Field -->
            <div class="supreme-form-group mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1.5" style="margin-bottom: 0.5rem;">
                    <label class="form-label m-0">Kata Sandi</label>
                </div>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control supreme-input @error('password') is-invalid @enderror" 
                    placeholder="••••••••••••"
                    required
                >
            </div>
            
            <!-- Row 3: Submission Execution Controller -->
            <button type="submit" class="btn btn-supreme-auth">
                Masuk Aplikasi
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
        </form>

    </div>
</div>
@endsection