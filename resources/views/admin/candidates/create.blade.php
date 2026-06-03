@extends('layouts.app')

@section('content')
<!-- Super High-End Creative Light SaaS UI Stylesheet -->
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

    /* Left Aesthetic Presentation Side (Light Version) */
    .brand-presentation-side {
        background: radial-gradient(circle at 0% 0%, rgba(79, 70, 229, 0.06) 0%, transparent 50%),
                    radial-gradient(circle at 100% 100%, rgba(16, 185, 129, 0.03) 0%, transparent 50%),
                    #f8fafc; /* Slate 50 */
        border-right: 1px solid #e2e8f0;
        position: relative;
    }

    .neon-glow-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(79, 70, 229, 0.08);
        border: 1px solid rgba(99, 102, 241, 0.2);
        padding: 0.375rem 0.875rem;
        border-radius: 99px;
        color: #4f46e5; /* Indigo 600 */
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    /* Premium Futuristic Input Fields (Light Version) */
    .neon-group {
        position: relative;
        transition: all 0.3s ease;
    }

    .neon-label {
        font-weight: 700;
        font-size: 0.85rem;
        color: #0f172a; /* Slate 900 */
        letter-spacing: -0.01em;
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .neon-label-number {
        font-family: 'JetBrains Mono', monospace;
        color: #4f46e5;
        font-size: 0.8rem;
    }

    .neon-input-desc {
        font-size: 0.8rem;
        color: #64748b; /* Slate 500 */
        margin-bottom: 0.75rem;
        display: block;
        line-height: 1.4;
    }

    .neon-field {
        background-color: #ffffff !important;
        border: 1px solid #cbd5e1 !important; /* Slate 300 */
        border-radius: 12px !important;
        padding: 0.8rem 1.125rem !important;
        font-size: 0.95rem !important;
        font-weight: 500 !important;
        color: #0f172a !important;
        transition: cubic-bezier(0.4, 0, 0.2, 1) 0.25s !important;
    }

    .neon-field::placeholder {
        color: #94a3b8;
    }

    /* Target Focus State Animation - Soft Indigo Glow */
    .neon-field:focus {
        border-color: #4f46e5 !important;
        box-shadow: 0 0 0 1px #4f46e5, 0 0 20px rgba(79, 70, 229, 0.12) !important;
        background-color: #ffffff !important;
        outline: none;
    }

    /* Cyberpunk Functional Keyboard Badge */
    .kbd-badge {
        font-family: 'JetBrains Mono', monospace;
        background: #f1f5f9;
        color: #64748b;
        padding: 0.1rem 0.4rem;
        font-size: 0.65rem;
        border-radius: 4px;
        border: 1px solid #e2e8f0;
        margin-left: auto;
    }

    /* Buttons Configuration: Premium Stripe Style */
    .cyber-btn {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.75rem 1.75rem;
        border-radius: 12px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        text-decoration: none;
    }

    .cyber-btn-submit {
        background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
        color: #ffffff;
        border: none;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
    }

    .cyber-btn-submit:hover {
        background: linear-gradient(135deg, #4338ca 0%, #2e2a87 100%);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.3);
    }

    .cyber-btn-cancel {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        color: #64748b;
    }

    .cyber-btn-cancel:hover {
        background: #f8fafc;
        color: #0f172a;
        border-color: #cbd5e1;
    }
</style>

<div class="py-3">
    <!-- Breadcrumb back link -->
    <div class="mb-4 d-inline-block">
        <a href="{{ route('candidates.index') }}" class="text-decoration-none text-muted small d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            <span style="color: #64748b; font-weight: 500;">Kembali ke Manajemen</span>
        </a>
    </div>

    <!-- Main Container Grid Splitter -->
    <div class="row g-0 creative-form-wrapper">
        
        <!-- Left Column: Conceptual Info Screen -->
        <div class="col-lg-5 p-5 d-flex flex-column justify-content-between brand-presentation-side">
            <div>
                <div class="mb-4">
                    <span class="neon-glow-pill">
                        <span class="d-inline-block rounded-circle" style="width: 6px; height: 6px; background-color: #4f46e5;"></span>
                        E-VOTE ENGINE V2
                    </span>
                </div>
                
                <h2 class="fw-extrabold text-dark tracking-tight mb-3" style="font-size: 2rem; letter-spacing: -0.04em; line-height: 1.15; color: #0f172a;">
                    Registrasi <br>Profil Kandidat.
                </h2>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
                    Gunakan ruang kendali ini untuk menyuntikkan data pasangan calon ketua baru secara aman ke dalam enkripsi database utama.
                </p>
            </div>

            <!-- Operational System Footprint Data Visualization -->
            <div class="pt-5 border-top mt-5" style="border-color: #e2e8f0 !important;">
                <div class="d-flex align-items-center gap-3">
                    <div style="background-color: #ffffff; padding: 0.6rem; border-radius: 10px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <div>
                        <span class="d-block text-dark small fw-bold" style="color: #0f172a;">Enkripsi Data SHA-256</span>
                        <span class="d-block text-muted" style="font-size: 0.75rem;">Proteksi anti-tamper otomatis aktif.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: High-Performance Light Input Engine -->
        <div class="col-lg-7 p-5 bg-white border-start" style="border-color: #e2e8f0 !important;">
            <form action="{{ route('candidates.store') }}" method="POST">
                @csrf
                
                <div class="row g-4">
                    <!-- Field 1: Nomor Urut -->
                    <div class="col-md-4">
                        <div class="neon-group">
                            <label class="neon-label">
                                <span class="neon-label-number">01//</span> No Urut
                            </label>
                            <span class="neon-input-desc">Indeks kartu suara</span>
                            <input type="number" name="candidate_number" class="form-control neon-field" placeholder="1" required>
                        </div>
                    </div>

                    <!-- Field 2: Nama Lengkap -->
                    <div class="col-md-8">
                        <div class="neon-group">
                            <label class="neon-label">
                                <span class="neon-label-number">02//</span> Nama Lengkap Kandidat
                            </label>
                            <span class="neon-input-desc">Gunakan nama resmi beserta gelar akademik</span>
                            <input type="text" name="name" class="form-control neon-field" placeholder="Ex: Adhiyaksa Putra, M.T." required>
                        </div>
                    </div>

                    <!-- Field 3: Visi -->
                    <div class="col-12">
                        <div class="neon-group">
                            <label class="neon-label">
                                <span class="neon-label-number">03//</span> Visi Utama Calon Ketua
                                <span class="kbd-badge">TEXTAREA</span>
                            </label>
                            <span class="neon-input-desc">Tuliskan esensi garis besar arah perjuangan gerakan strategis Anda</span>
                            <textarea name="vision" class="form-control neon-field" rows="3" placeholder="Tulis visi komitmen di sini..." required></textarea>
                        </div>
                    </div>

                    <!-- Field 4: Misi -->
                    <div class="col-12">
                        <div class="neon-group">
                            <label class="neon-label">
                                <span class="neon-label-number">04//</span> Garis Misi & Rencana Implementasi Kerja
                                <span class="kbd-badge">RICH MODE</span>
                            </label>
                            <span class="neon-input-desc">Jabarkan langkah-langkah nyata berbentuk daftar rencana kerja terukur</span>
                            <textarea name="mission" class="form-control neon-field" rows="5" placeholder="1. Optimalisasi infrastruktur digital internal...&#10;2. Rekonstruksi hubungan kemitraan eksternal..." required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Control Station Operations Footer -->
                <div class="d-flex align-items-center justify-content-end gap-3 pt-4 mt-5 border-top" style="border-color: #e2e8f0 !important;">
                    <a href="{{ route('candidates.index') }}" class="cyber-btn cyber-btn-cancel">
                        Batal
                    </a>
                    <button type="submit" class="cyber-btn cyber-btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l5 5L20 7"/></svg>
                        Eksekusi & Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection