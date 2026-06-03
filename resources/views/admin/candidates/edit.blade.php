@extends('layouts.app')

@section('content')
<!-- Super High-End Creative Light SaaS UI Stylesheet (Consistency Sync) -->
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

    /* Left Aesthetic Presentation Side (Edit State Context) */
    .brand-presentation-side {
        background: radial-gradient(circle at 0% 0%, rgba(245, 158, 11, 0.06) 0%, transparent 50%),
                    radial-gradient(circle at 100% 100%, rgba(79, 70, 229, 0.03) 0%, transparent 50%),
                    #f8fafc; /* Slate 50 */
        border-right: 1px solid #e2e8f0;
        position: relative;
    }

    .neon-glow-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(245, 158, 11, 0.08); /* Amber Tint for Edit State */
        border: 1px solid rgba(245, 158, 11, 0.2);
        padding: 0.375rem 0.875rem;
        border-radius: 99px;
        color: #b45309; /* Amber 700 */
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    /* Premium Futuristic Input Fields */
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
        color: #4f46e5; /* Indigo Accent */
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

    /* Target Focus State Animation - Soft Indigo Glow */
    .neon-field:focus {
        border-color: #4f46e5 !important;
        box-shadow: 0 0 0 1px #4f46e5, 0 0 20px rgba(79, 70, 229, 0.12) !important;
        background-color: #ffffff !important;
        outline: none;
    }

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

    /* Action Buttons Integration */
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
        background: linear-gradient(135deg, #10b981 0%, #059669 100%); /* Emerald Gradient for Update */
        color: #ffffff;
        border: none;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }

    .cyber-btn-submit:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3);
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
                        <span class="d-inline-block rounded-circle" style="width: 6px; height: 6px; background-color: #f59e0b;"></span>
                        MODE MODIFIKASI DATA
                    </span>
                </div>
                
                <h2 class="fw-extrabold text-dark tracking-tight mb-3" style="font-size: 2rem; letter-spacing: -0.04em; line-height: 1.15; color: #0f172a;">
                    Perbarui <br>Profil Kandidat.
                </h2>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6;">
                    Anda sedang mengubah berkas identitas resmi pasangan calon <strong>{{ $candidate->name }}</strong>. Seluruh perubahan akan dicatat langsung pada Audit Log sistem.
                </p>
            </div>

            <!-- Operational System Footprint Data Visualization -->
            <div class="pt-5 border-top mt-5" style="border-color: #e2e8f0 !important;">
                <div class="d-flex align-items-center gap-3">
                    <div style="background-color: #ffffff; padding: 0.6rem; border-radius: 10px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"/></svg>
                    </div>
                    <div>
                        <span class="d-block text-dark small fw-bold" style="color: #0f172a;">ID Record: #{{ $candidate->id }}</span>
                        <span class="d-block text-muted" style="font-size: 0.75rem;">Modifikasi entitas bersifat melacak riwayat.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: High-Performance Light Input Engine -->
        <div class="col-lg-7 p-5 bg-white border-start" style="border-color: #e2e8f0 !important;">
            <form action="{{ route('candidates.update', $candidate->id) }}" method="POST">
                @csrf 
                @method('PUT')
                
                <div class="row g-4">
                    <!-- Field 1: Nomor Urut -->
                    <div class="col-md-4">
                        <div class="neon-group">
                            <label class="neon-label">
                                <span class="neon-label-number">01//</span> No Urut
                            </label>
                            <span class="neon-input-desc">Indeks kartu suara</span>
                            <input type="number" name="candidate_number" class="form-control neon-field" value="{{ $candidate->candidate_number }}" required>
                        </div>
                    </div>

                    <!-- Field 2: Nama Lengkap -->
                    <div class="col-md-8">
                        <div class="neon-group">
                            <label class="neon-label">
                                <span class="neon-label-number">02//</span> Nama Lengkap Kandidat
                            </label>
                            <span class="neon-input-desc">Gunakan nama resmi beserta gelar akademik</span>
                            <input type="text" name="name" class="form-control neon-field" value="{{ $candidate->name }}" required>
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
                            <textarea name="vision" class="form-control neon-field" rows="3" required>{{ $candidate->vision }}</textarea>
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
                            <textarea name="mission" class="form-control neon-field" rows="5" required>{{ $candidate->mission }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Control Station Operations Footer -->
                <div class="d-flex align-items-center justify-content-end gap-3 pt-4 mt-5 border-top" style="border-color: #e2e8f0 !important;">
                    <a href="{{ route('candidates.index') }}" class="cyber-btn cyber-btn-cancel">
                        Batal
                    </a>
                    <button type="submit" class="cyber-btn cyber-btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection