<?php

namespace App\Services;

use App\Models\VotingToken;
use App\Models\User;
use Illuminate\Support\Str;

class TokenService
{
    protected AuditLogService $auditLogService;

    public function __construct(AuditLogService $auditLogService)
    {
        $this->auditLogService = $auditLogService;
    }

    public function generate(User $user): VotingToken
    {
        // Hapus token lama jika ada agar efisien
        VotingToken::where('user_id', $user->id)->delete();

        $tokenStr = strtoupper(Str::random(6));

        $token = VotingToken::create([
            'user_id' => $user->id,
            'token' => $tokenStr,
            'is_verified' => false,
        ]);

        $this->auditLogService->log("Generated token for User ID: {$user->id}");
        return $token;
    }

    public function validate(User $user, string $tokenInput): bool
    {
        $token = VotingToken::where('user_id', $user->id)
            ->where('token', strtoupper($tokenInput))
            ->whereNull('used_at')
            ->first();

        if ($token) {
            $token->update(['is_verified' => true]);
            $this->auditLogService->log("Token verified successfully for User ID: {$user->id}");
            return true;
        }

        $this->auditLogService->log("Failed token verification attempt for User ID: {$user->id}");
        return false;
    }
}