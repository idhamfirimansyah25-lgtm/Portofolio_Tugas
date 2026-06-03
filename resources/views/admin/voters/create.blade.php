@extends('layouts.app')

@section('content')
<!-- Tier-0 Premium Studio Form UI Stylesheet -->
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

    /* Ambient Subtle Tech Ribbon */
    .quantum-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #4f46e5, #06b6d4);
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

    /* High-End Input Control Overrides */
    .supreme-form-control {
        background-color: #fafafa; /* Zinc 50 */
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.925rem;
        font-weight: 500;
        color: #000000;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .supreme-form-control:focus {
        background-color: #ffffff;
        border-color: #000000;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.04);
        outline: none;
    }

    .supreme-form-control::placeholder {
        color: #a1a1aa; /* Zinc 400 */
        font-size: 0.875rem;
        font-weight: 400;
    }

    /* Form Inline Error Custom States */
    .supreme-form-control.is-invalid {
        border-color: #ef4444 !important;
        background-color: #fff5f5;
    }

    .supreme-form-control.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.08) !important;
    }

    .field-error-msg {
        font-size: 0.775rem;
        font-weight: 500;
        color: #ef4444;
        margin-top: 0.35rem;
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
            <a href="{{ route('voters.index') }}" class="btn-form-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Daftar DPT
            </a>
        </div>

        <!-- Main Form Unit Card -->
        <div class="card quantum-form-card border-0">
            <div class="card-body p-4.5 style" style="padding: 2.75rem 2.5rem;">
                
                <!-- Section Header Typography -->
                <div class="mb-4.5" style="margin-bottom: 2rem;">
                    <h4 class="form-pane-title mb-1.5">Tambah Data Pemilih</h4>
                    <p class="form-pane-subtitle">Daftarkan entitas mahasiswa baru ke dalam sistem DPT reguler untuk alokasi kunci token voting.</p>
                </div>

                <!-- Secure Core Processing Unit Form -->
                <form action="{{ route('voters.store') }}" method="POST" autocomplete="off">
                    @csrf
                    
                    <!-- Field 1: Nama Lengkap -->
                    <div class="supreme-field-group">
                        <label class="form-label">Nama Lengkap Mahasiswa</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            class="form-control supreme-form-control @error('name') is-invalid @enderror" 
                            placeholder="Contoh: Muhammad Rafli"
                            required 
                            autofocus
                        >
                        @error('name')
                            <div class="field-error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Field 2: Email Kampus -->
                    <div class="supreme-field-group">
                        <label class="form-label">Alamat Email Kampus</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="form-control supreme-form-control @error('email') is-invalid @enderror" 
                            placeholder="username@mahasiswa.ac.id"
                            required
                        >
                        @error('email')
                            <div class="field-error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Field 3: Password Default -->
                    <div class="supreme-field-group" style="margin-bottom: 2.25rem;">
                        <label class="form-label">Password Akses Default</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control supreme-form-control @error('password') is-invalid @enderror" 
                            placeholder="Minimal 6 karakter rahasia"
                            required
                        >
                        @error('password')
                            <div class="field-error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Execution Submit Trigger Node -->
                    <button type="submit" class="btn btn-supreme-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                        Daftarkan Pemilih Baru
                    </button>
                    
                </form>
                
            </div>
        </div>

    </div>
</div>
@endsection