<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VotingToken extends Model
{
    protected $fillable = ['user_id', 'token', 'is_verified', 'used_at'];
    protected $casts = ['used_at' => 'datetime', 'is_verified' => 'boolean'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}