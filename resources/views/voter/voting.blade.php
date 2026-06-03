@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .ballot-canvas-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    /* Premium Ballot Core Header */
    .ballot-header-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(79, 70, 229, 0.05);
        border: 1px solid rgba(79, 70, 229, 0.15);
        padding: 0.4rem 1rem;
        border-radius: 99px;
        color: #4f46e5; /* Indigo 600 */
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.725rem;
        font-weight: 700;
        letter-spacing: 0.05em;
    }

    /* High-End Architectural Voting Cards */
    .quantum-ballot-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 28px;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    .quantum-ballot-card:hover {
        transform: translateY(-6px);
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: 
            0 1px 2px rgba(0,0,0,0.01),
            0 12px 24px rgba(0,0,0,0.02),
            0 32px 64px -12px rgba(0,0,0,0.05);
    }

    /* Big Numeric Structural Identifier */
    .ballot-giant-number {
        font-family: 'JetBrains Mono', monospace;
        font-size: 4rem;
        font-weight: 800;
        line-height: 1;
        background: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0.03) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.05em;
    }

    /* Premium Call To Action Buttons */
    .btn-ballot-action {
        font-weight: 700;
        font-size: 0.9rem;
        padding: 0.85rem 2rem;
        border-radius: 14px;
        background: #000000;
        color: #ffffff;
        border: 1px solid #000000;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-ballot-action:hover {
        background: #1f1f1f;
        border-color: #1f1f1f;
        color: #ffffff;
        transform: scale(1.01);
    }

    /* High-Fidelity Custom Bootstrap Modal Overrides */
    .premium-crypto-modal .modal-content {
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 28px;
        padding: 1.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        background: #ffffff;
    }

    .premium-crypto-modal .modal-header {
        border-bottom: none;
        padding-bottom: 0;
    }

    .premium-crypto-modal .modal-footer {
        border-top: none;
        padding-top: 1rem;
        gap: 0.5rem;
    }

    /* Cyber Security Notice Banner inside Modal */
    .crypto-warning-plate {
        background-color: #fff1f2; /* Rose 50 */
        border: 1px dashed #f43f5e; /* Rose 500 */
        border-radius: 14px;
        padding: 1rem;
        color: #9f1239; /* Rose 800 */
        font-size: 0.825rem;
        line-height: 1.5;
        text-align: left;
    }

    .btn-modal-cancel {
        background: #ffffff;
        color: #52525b;
        border: 1px solid rgba(0, 0, 0, 0.1);
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.75rem 1.25rem;
        border-radius: 12px;
        transition: all 0.15s ease;
    }

    .btn-modal-cancel:hover {
        background: #fafafa;
        color: #000000;
    }

    .btn-modal-confirm {
        background: #10b981; /* Emerald 500 */
        border: 1px solid #10b981;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        transition: all 0.15s ease;
    }

    .btn-modal-confirm:hover {
        background: #059669; /* Emerald 600 */
        border-color: #059669;
    }

    /* Force z-index to resolve stacking context backdrop overlap */
    .premium-crypto-modal {
        z-index: 999999 !important;
    }
    .modal-backdrop {
        z-index: 999990 !important;
    }
</style>

<div class="ballot-canvas-wrapper py-3">
    
    <div class="text-center mb-5 pb-2">
        <div class="mb-3">
            <span class="ballot-header-pill">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                SECURE BALLET STREAM ACTIVE
            </span>
        </div>
        <h2 class="fw-extrabold text-black tracking-tight mb-2" style="font-size: 2.25rem; letter-spacing: -0.04em;">
            Surat Suara Digital
        </h2>
        <p class="text-muted small mx-auto" style="max-width: 460px; color: #71717a; font-size: 0.9rem;">
            Klik tombol berlabel konfirmasi di bawah kartu paslon untuk memberikan hak suara Anda secara sah ke dalam jaringan ekosistem.
        </p>
    </div>

    <div class="row justify-content-center g-4">
        @foreach($candidates as $cand)
        <div class="col-lg-5 col-md-6 d-flex align-items-stretch">
            <div class="card quantum-ballot-card border-0 w-100">
                <div class="card-body p-5 d-flex flex-column justify-content-between text-center">
                    
                    <div>
                        <div class="mb-3">
                            <span class="ballot-giant-number">0{{ $cand->candidate_number }}</span>
                        </div>
                        
                        <h3 class="fw-extrabold text-black mb-5" style="letter-spacing: -0.03em; font-size: 1.6rem; color: #000000 !important;">
                            {{ $cand->name }}
                        </h3>
                    </div>

                    <div>
                        <button type="button" class="btn btn-ballot-action" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $cand->id }}">
                            Pilih Kandidat Paslon
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        @push('modals')
        <div class="modal fade premium-crypto-modal" id="confirmModal{{ $cand->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <h5 class="modal-title fw-extrabold text-black" style="letter-spacing: -0.03em; font-size: 1.2rem;">Konfirmasi Pilihan</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body text-center py-4">
                        <p class="text-muted small mb-2" style="font-size: 0.875rem;">Apakah Anda yakin ingin memberikan mandat suara kepada:</p>
                        <h3 class="fw-extrabold text-black mb-4" style="letter-spacing: -0.03em; background: linear-gradient(90deg, #4f46e5, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            {{ $cand->name }}
                        </h3>
                        
                        <div class="crypto-warning-plate d-flex align-items-start gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-0.5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            <div>
                                <strong>Peringatan Enkripsi Mutlak:</strong> Tindakan ini bersifat irreversible (permanen). Pilihan Anda akan langsung disegel menggunakan algoritma **AES-256** dan tanda tangan **SHA-256** di database server, sehingga tidak dapat diubah kembali oleh siapapun.
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">Batalkan</button>
                        <form action="{{ route('voter.cast') }}" method="POST" class="d-inline m-0">
                            @csrf
                            <input type="hidden" name="candidate_id" value="{{ $cand->id }}">
                            <button type="submit" class="btn btn-modal-confirm d-inline-flex align-items-center gap-2">
                                Ya, Kirim Suara Sah
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        @endpush
        @endforeach
    </div>

</div>
@endsection