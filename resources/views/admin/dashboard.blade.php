@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

    :root {
        --dash-font-main: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        --dash-font-mono: 'JetBrains Mono', monospace;
        
        /* 2026 SaaS Color Palette */
        --brand-indigo: #4f46e5;
        --brand-emerald: #10b981;
        --brand-amber: #f59e0b;
        --slate-900: #0f172a;
        --slate-800: #1e293b;
        --slate-400: #94a3b8;
        --slate-100: #f1f5f9;
    }

    body {
        font-family: var(--dash-font-main);
        background-color: #fafafa;
        color: var(--slate-900);
        letter-spacing: -0.01em;
    }

    /* ==========================================
       PREMIUM ULTRA-SAAS STATISTIC CARDS (2026)
       ========================================== */
    .premium-stat-card {
        position: relative;
        background: #ffffff;
        border: 1px solid rgba(226, 232, 240, 0.8);
        border-radius: 20px;
        padding: 24px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 190px;
        isolation: isolate;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Layer 1 & 2: Ambient Lighting & Edge Highlights */
    .premium-stat-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 100%);
        border-radius: 20px;
        z-index: -1;
    }

    /* Layer 3: Glass Accent Line Top */
    .premium-stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0) 100%);
        z-index: 2;
    }

    /* Layer 4: Deep Ambient Glow Triggers (Dynamic Brand Colors) */
    .premium-stat-card .ambient-glow {
        position: absolute;
        width: 150px;
        height: 150px;
        top: -60px;
        right: -60px;
        border-radius: 50%;
        filter: blur(50px);
        opacity: 0.08;
        mix-blend-mode: multiply;
        transition: all 0.4s ease;
        z-index: -1;
    }
    .card-voters .ambient-glow { background: var(--brand-indigo); }
    .card-votes .ambient-glow { background: var(--brand-emerald); }
    .card-candidates .ambient-glow { background: var(--brand-amber); }

    /* Micro-Geometric Accent Pattern (Vercel Style) */
    .premium-stat-card .geo-pattern {
        position: absolute;
        right: 10px;
        bottom: 10px;
        opacity: 0.02;
        color: var(--slate-900);
        transform: rotate(-5deg);
        transition: transform 0.4s ease, opacity 0.4s ease;
        pointer-events: none;
        z-index: 1;
    }

    /* Hover Experience (Parallax Elevation & Glow Expansion) */
    .premium-stat-card:hover {
        transform: translateY(-6px);
        border-color: rgba(15, 23, 42, 0.12);
        box-shadow: 
            0 20px 30px -10px rgba(0, 0, 0, 0.04),
            0 10px 20px -5px rgba(0, 0, 0, 0.02),
            inset 0 0 0 1px rgba(255, 255, 255, 0.6);
    }
    .premium-stat-card:hover .ambient-glow {
        opacity: 0.16;
        transform: scale(1.3);
    }
    .premium-stat-card:hover .geo-pattern {
        transform: rotate(0deg) scale(1.1);
        opacity: 0.05;
    }
    .premium-stat-card:hover .premium-icon-badge {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    /* SaaS Micro Layout Hierarchy */
    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    
    .saas-badge-pill {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        padding: 5px 10px;
        border-radius: 30px;
        background: var(--slate-100);
        color: var(--slate-400);
        border: 1px solid rgba(226, 232, 240, 0.5);
    }

    .stat-title {
        font-size: 0.85rem;
        font-weight: 600;
        color: #64748b;
        margin-top: 12px;
        margin-bottom: 0;
    }

    /* Hero Element: Big Numbers with Sleek Typography */
    .stat-hero-number {
        font-size: 2.85rem;
        font-weight: 800;
        letter-spacing: -0.04em;
        line-height: 1;
        color: var(--slate-900);
        margin: 8px 0 0 0;
        background: linear-gradient(180deg, var(--slate-900) 0%, #334155 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Floating Orb & Gradient Sphere Container */
    .premium-icon-badge {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
        border: 1px solid var(--slate-100);
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 3;
    }
    .card-voters .premium-icon-badge { color: var(--brand-indigo); }
    .card-votes .premium-icon-badge { color: var(--brand-emerald); }
    .card-candidates .premium-icon-badge { color: var(--brand-amber); }

    /* Footer Micro-indicators */
    .stat-footer-meta {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #94a3b8;
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px dashed rgba(226, 232, 240, 0.6);
    }
    .meta-trend {
        display: inline-flex;
        align-items: center;
        gap: 3px;
        font-weight: 600;
        padding: 2px 6px;
        border-radius: 4px;
    }
    .card-voters .meta-trend { background: #f5f3ff; color: var(--brand-indigo); }
    .card-votes .meta-trend { background: #ecfdf5; color: var(--brand-emerald); }
    .card-candidates .meta-trend { background: #fffbeb; color: var(--brand-amber); }

    /* ==========================================
       SAAS BUTTONS
       ========================================== */
    .btn-saas-action {
        font-family: var(--dash-font-main);
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.625rem 1.25rem;
        border-radius: 12px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-saas-outline {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        color: #475569;
    }

    .btn-saas-outline:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: var(--slate-900);
    }

    .btn-saas-primary {
        background: #0f172a;
        border: 1px solid #0f172a;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
    }

    .btn-saas-primary:hover {
        background: #1e293b;
        border-color: #1e293b;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.2);
        color: #ffffff;
    }

    .btn-saas-secondary {
        background-color: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #334155;
    }

    .btn-saas-secondary:hover {
        background-color: #e2e8f0;
        color: var(--slate-900);
    }

    /* ==========================================
       ENTERPRISE AUDIT TRAIL ARCHITECTURE (2026)
       ========================================== */
    .audit-panel-card {
        background: #ffffff;
        border: 1px solid rgba(226, 232, 240, 0.8);
        border-radius: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.01), 0 10px 40px -10px rgba(15, 23, 42, 0.03);
        overflow: hidden;
        position: relative;
    }

    .audit-header-pane {
        padding: 28px 32px;
        background: linear-gradient(180deg, #ffffff 0%, #fcfcfd 100%);
        border-bottom: 1px solid #f1f5f9;
    }

    .secure-sync-pill {
        font-family: var(--dash-font-mono);
        font-size: 0.68rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        color: #0f172a;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 6px 14px;
        border-radius: 99px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .secure-sync-pill::before {
        content: '';
        width: 6px;
        height: 6px;
        background-color: var(--brand-emerald);
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 8px var(--brand-emerald);
        animation: pulseGlow 2s infinite;
    }

    @keyframes pulseGlow {
        0% { transform: scale(0.95); opacity: 0.5; }
        50% { transform: scale(1.15); opacity: 1; }
        100% { transform: scale(0.95); opacity: 0.5; }
    }

    .audit-grid-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .audit-grid-table th {
        font-family: var(--dash-font-main);
        font-weight: 700;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #64748b;
        padding: 14px 32px;
        background-color: #fafafa;
        border-bottom: 1px solid #f1f5f9;
        text-align: left;
    }

    .audit-grid-table td {
        padding: 18px 32px;
        border-bottom: 1px solid #f8fafc;
        background-color: #ffffff;
        transition: background-color 0.2s ease;
    }

    .audit-grid-table tr:hover td {
        background-color: #f8fafc;
    }

    .timestamp-cell {
        font-family: var(--dash-font-mono);
        color: #64748b;
        font-size: 0.825rem;
        white-space: nowrap;
    }

    .activity-badge-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .status-indicator-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    
    .log-action-create { color: #0f172a; font-weight: 600; }
    .log-action-update { color: #334155; font-weight: 600; }
    .log-action-delete { color: #df1c1c; font-weight: 600; }

    .crypto-signature-wrapper {
        position: relative;
        display: inline-flex;
        align-items: center;
        width: 100%;
        max-width: 320px;
    }

    .crypto-hash-badge {
        font-family: var(--dash-font-mono);
        font-size: 0.78rem;
        color: #475569;
        background: #f8fafc;
        border: 1px solid rgba(226, 232, 240, 0.7);
        padding: 6px 14px;
        border-radius: 10px;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
    }

    .crypto-hash-badge:hover {
        background: #ffffff;
        color: var(--brand-indigo);
        border-color: rgba(79, 70, 229, 0.4);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.05);
        transform: translateX(2px);
    }

    .crypto-hash-badge::before {
        content: '⚓';
        margin-right: 6px;
        font-size: 0.7rem;
        opacity: 0.5;
    }
</style>

<div class="container-fluid px-4 py-5" style="max-width: 1600px;">
    
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center mb-5 gap-4">
        <div>
            <h2 class="fw-extrabold m-0" style="font-size: 1.85rem; letter-spacing: -0.04em; color: var(--slate-900);">
                Panel Admin Dashboard
            </h2>
            <p class="text-muted small m-0 mt-1">Pantau integritas sistem real count dan manajemen data pemilih secara realtime.</p>
        </div>
        
        <div class="d-flex flex-wrap gap-2 width-full-mobile">
            <a href="{{ route('candidates.index') }}" class="btn btn-saas-action btn-saas-outline">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Kelola Kandidat
            </a>
            <a href="{{ route('voters.index') }}" class="btn btn-saas-action btn-saas-outline">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Kelola Pemilih
            </a>
            <a href="{{ route('tokens.index') }}" class="btn btn-saas-action btn-saas-outline">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Kelola Token
            </a>
            <a href="{{ route('results.index') }}" class="btn btn-saas-action btn-saas-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                Lihat Hasil Real Count
            </a>
            <a href="{{ route('audit.index') }}" class="btn btn-saas-action btn-saas-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                Audit Log
            </a>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="premium-stat-card card-voters">
                <div class="ambient-glow"></div>
                <svg class="geo-pattern" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/></svg>
                
                <div class="stat-header">
                    <div>
                        <span class="saas-badge-pill">DPT Node</span>
                        <p class="stat-title">Total Kuota DPT Pemilih</p>
                    </div>
                    <div class="premium-icon-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                </div>
                <div>
                    <h2 class="stat-hero-number">{{ $totalVoters }}</h2>
                </div>
                <div class="stat-footer-meta">
                    <span class="meta-trend">Live</span>
                    <span>Database entitas pemilih terverifikasi</span>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-6 col-xl-4">
            <div class="premium-stat-card card-votes">
                <div class="ambient-glow"></div>
                <svg class="geo-pattern" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22V4c0-.5.2-1 .6-1.4C5 2.2 5.5 2 6 2h12c.5 0 1 .2 1.4.6.4.4.6.9.6 1.4v18l-4-2-4 2-4-2-4 2z"/></svg>
                
                <div class="stat-header">
                    <div>
                        <span class="saas-badge-pill" style="color: var(--brand-emerald); background: #f0fdf4;">Ingress Stream</span>
                        <p class="stat-title">Suara Masuk (Partisipasi)</p>
                    </div>
                    <div class="premium-icon-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                </div>
                <div>
                    <h2 class="stat-hero-number">{{ $totalVotes }}</h2>
                </div>
                <div class="stat-footer-meta">
                    <span class="meta-trend">Sync</span>
                    <span>Payload kriptografi terenkripsi masuk</span>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-xl-4">
            <div class="premium-stat-card card-candidates">
                <div class="ambient-glow"></div>
                <svg class="geo-pattern" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                
                <div class="stat-header">
                    <div>
                        <span class="saas-badge-pill" style="color: var(--brand-amber); background: #fffbeb;">Cluster Object</span>
                        <p class="stat-title">Jumlah Kandidat Ketua</p>
                    </div>
                    <div class="premium-icon-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                </div>
                <div>
                    <h2 class="stat-hero-number">{{ $totalCandidates }}</h2>
                </div>
                <div class="stat-footer-meta">
                    <span class="meta-trend">Active</span>
                    <span>Objektif pilihan terdaftar dalam sistem</span>
                </div>
            </div>
        </div>
    </div>

    <div class="audit-panel-card border-0">
        <div class="audit-header-pane d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
            <div>
                <h5 class="fw-bold m-0" style="color: var(--slate-900); font-size: 1.15rem; letter-spacing: -0.03em;">
                    Aktivitas Sistem & Audit Terakhir
                </h5>
                <p class="text-muted small m-0 mt-1">Log infrastruktur di-hash secara otomatis menggunakan algoritma SHA-256 untuk mendeteksi rekayasa data ilegal.</p>
            </div>
            <div>
                <span class="secure-sync-pill">SECURE AUDIT SYNC</span>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="audit-grid-table">
                <thead>
                    <tr>
                        <th style="width: 22%;">Waktu Timestamp</th>
                        <th style="width: 45%;">Aktivitas Log</th>
                        <th style="width: 33%;">Log Verification Integrity Signature (SHA-256)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentActivities as $log)
                        @php
                            $activityLower = strtolower($log->activity);
                            $dotColor = 'var(--brand-emerald)';
                            $textClass = 'log-action-create';

                            if (str_contains($activityLower, 'delete')) {
                                $dotColor = '#ef4444';
                                $textClass = 'log-action-delete';
                            } elseif (str_contains($activityLower, 'update')) {
                                $dotColor = 'var(--brand-amber)';
                                $textClass = 'log-action-update';
                            }
                        @endphp
                    <tr>
                        <td class="timestamp-cell">
                            {{ $log->created_at }}
                        </td>
                        
                        <td>
                            <div class="activity-badge-container">
                                <span class="status-indicator-dot" style="background-color: {{ $dotColor }}; box-shadow: 0 0 6px {{ $dotColor }};"></span>
                                <span class="{{ $textClass }}" style="font-size: 0.875rem; letter-spacing: -0.01em;">
                                    {{ $log->activity }}
                                </span>
                            </div>
                        </td>
                        
                        <td>
                            <div class="crypto-signature-wrapper" onclick="navigator.clipboard.writeText('{{ $log->log_hash }}'); alert('Signature SHA-256 berhasil disalin ke clipboard!');">
                                <span class="crypto-hash-badge" title="Klik untuk menyalin tanda tangan penuh">
                                    {{ $log->log_hash }}
                                </span>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5" style="background: #ffffff;">
                            <div class="text-muted mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-neutral-300"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                            </div>
                            <span class="text-secondary small d-block fw-medium">Belum ada aktivitas terekam pada kluster data ini.</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection