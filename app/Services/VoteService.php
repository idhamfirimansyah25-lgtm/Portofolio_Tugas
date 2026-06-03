<?php

namespace App\Services;

use App\Models\Vote;
use App\Models\User;
use App\Models\VotingToken;
use Illuminate\Support\Facades\DB;
use Exception;

class VoteService
{
    protected CryptoService $crypto;
    protected AuditLogService $audit;

    public function __construct(CryptoService $crypto, AuditLogService $audit)
    {
        $this->crypto = $crypto;
        $this->audit = $audit;
    }

    public function storeVote(User $user, int $candidateId): bool
    {
        return DB::transaction(function () use ($user, $candidateId) {
            // Secure 1: Ambil data enkripsi & hash
            $encryptedVote = $this->crypto->aesEncrypt((string)$candidateId);
            if (!$encryptedVote) {
                throw new Exception('Encryption Failed');
            }
            $voteHash = $this->crypto->sha256($encryptedVote);

            // Secure 2: Simpan data suara ke DB
            Vote::create([
                'user_id' => $user->id,
                'encrypted_vote' => $encryptedVote,
                'vote_hash' => $voteHash,
            ]);

            // Secure 3: Matikan token pemilih agar tidak bisa double-vote
            VotingToken::where('user_id', $user->id)->update([
                'used_at' => now()
            ]);

            $this->audit->log("User ID {$user->id} successfully casted a vote.");
            return true;
        });
    }
}