<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\VotingToken;
use App\Models\Vote;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public function vote(): HasOne
    {
        return $this->hasOne(Vote::class);
    }

    public function votingToken(): HasOne
    {
        return $this->hasOne(VotingToken::class);
    }
}