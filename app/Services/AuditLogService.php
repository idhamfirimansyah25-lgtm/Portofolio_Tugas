<?php

namespace App\Services;

use App\Models\AuditLog;

class AuditLogService
{
    protected CryptoService $cryptoService;

    public function __construct(CryptoService $cryptoService)
    {
        $this->cryptoService = $cryptoService;
    }

    public function log(string $activity, ?string $payload = null): AuditLog
    {
        $stringToHash = $activity . ($payload ?? '');
        $hash = $this->cryptoService->sha256($stringToHash);

        return AuditLog::create([
            'activity' => $activity,
            'payload' => $payload,
            'log_hash' => $hash
        ]);
    }
}