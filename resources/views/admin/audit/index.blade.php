@extends('layouts.app')

@section('content')
<!-- High-End Cyber Security Monitor UI Stylesheet -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap');

    .audit-interface-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.01em;
    }

    /* Modern Dynamic Badge */
    .security-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(16, 185, 129, 0.08); /* Emerald Alpha */
        border: 1px solid rgba(16, 185, 129, 0.2);
        padding: 0.4rem 0.875rem;
        border-radius: 99px;
        color: #047857; /* Emerald 700 */
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.03em;
    }

    .pulse-dot {
        width: 6px;
        height: 6px;
        background-color: #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulseAnimation 2s infinite;
    }

    @keyframes pulseAnimation {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.5); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    /* Premium Datadog-style Table View */
    .cyber-table-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -2px rgba(0, 0, 0, 0.01);
        overflow: hidden;
    }

    .cyber-table {
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .cyber-table thead th {
        background-color: #f8fafc !important; /* Slate 50 */
        color: #475569 !important; /* Slate 600 */
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .cyber-table tbody tr {
        transition: background-color 0.15s ease;
    }

    .cyber-table tbody tr:hover {
        background-color: #f8fafc !important; /* Ultra soft gray highlight */
    }

    .cyber-table tbody td {
        padding: 1.1rem 1.25rem;
        font-size: 0.875rem;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
    }

    /* Technical Elements Overrides */
    .tech-id {
        font-family: 'JetBrains Mono', monospace;
        color: #94a3b8;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .tech-timestamp {
        font-family: 'JetBrains Mono', monospace;
        color: #475569;
        font-size: 0.8rem;
    }

    .tech-payload {
        font-family: 'JetBrains Mono', monospace;
        background-color: #f1f5f9;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-size: 0.775rem;
        color: #475569;
        max-width: 240px;
        display: inline-block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        border: 1px solid #e2e8f0;
    }

    .tech-hash-badge {
        font-family: 'JetBrains Mono', monospace;
        background: linear-gradient(90deg, rgba(79, 70, 229, 0.04) 0%, rgba(99, 102, 241, 0.01) 100%);
        border: 1px dashed rgba(99, 102, 241, 0.25);
        color: #4f46e5; /* Indigo 600 */
        padding: 0.35rem 0.75rem;
        border-radius: 8px;
        font-size: 0.775rem;
        font-weight: 500;
        display: block;
        max-width: 280px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="audit-interface-wrapper py-3">
    
    <!-- Top Stream Header Station -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h3 class="fw-extrabold text-dark tracking-tight m-0" style="font-size: 1.5rem; color: #0f172a; letter-spacing: -0.03em;">
                Audit Transaksi Log Keamanan
            </h3>
            <p class="text-muted m-0 mt-1 small" style="color: #64748b; font-size: 0.875rem;">
                Seluruh log riwayat transaksi sistem di bawah ini bersifat otomatis, <span class="badge bg-light text-dark border fw-medium px-2 py-1">Read-Only</span>, dan dikunci menggunakan tanda tangan SHA-256.
            </p>
        </div>
        
        <!-- Live Feed Network Status -->
        <div class="text-start text-md-end flex-shrink-0">
            <span class="security-status-badge">
                <span class="pulse-dot"></span>
                SECURE FEED ACTIVE
            </span>
        </div>
    </div>

    <!-- Main Datatables Core Component -->
    <div class="card cyber-table-card border-0">
        <div class="table-responsive">
            <table class="table cyber-table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID Log</th>
                        <th style="width: 180px;">Waktu Sistem UTC</th>
                        <th>Deskripsi Aktivitas Insiden</th>
                        <th>Payload Metadata</th>
                        <th style="width: 300px;">SHA-256 Integrity Lock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <!-- Col 1: ID -->
                        <td>
                            <span class="tech-id">#{{ $log->id }}</span>
                        </td>
                        
                        <!-- Col 2: Timestamp -->
                        <td>
                            <span class="tech-timestamp">{{ $log->created_at }}</span>
                        </td>
                        
                        <!-- Col 3: Activity Description -->
                        <td>
                            <span class="fw-semibold text-dark d-block" style="color: #0f172a !important; font-size: 0.9rem;">
                                {{ $log->activity }}
                            </span>
                        </td>
                        
                        <!-- Col 4: Metadata Payload Box -->
                        <td>
                            @if(!empty($log->payload) && $log->payload !== '-')
                                <span class="tech-payload" title="{{ $log->payload }}">{{ $log->payload }}</span>
                            @else
                                <span class="text-muted font-monospace small" style="font-size: 0.8rem; padding-left: 0.5rem;">-</span>
                            @endif
                        </td>
                        
                        <!-- Col 5: Cryptographic Immutable Signature -->
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="tech-hash-badge" title="{{ $log->log_hash }}">
                                    {{ $log->log_hash }}
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection