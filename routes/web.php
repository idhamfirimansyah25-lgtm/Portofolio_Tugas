<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Voter\LandingPageController;
use App\Http\Controllers\Voter\AuthController;
use App\Http\Controllers\Voter\VoteController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\AuditLogController;

// PUBLIC ROUTES
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES GROUP
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // CRUD Wajib Lengkap Terpenuhi Menggunakan Resource
    Route::resource('candidates', CandidateController::class);
    Route::resource('voters', VoterController::class);
    Route::resource('tokens', TokenController::class);
    
    // Hasil & Audit Log (Read Only)
    Route::get('/results', [ResultController::class, 'index'])->name('results.index');
    Route::get('/results/export', [ResultController::class, 'exportExcel'])->name('results.export');
    Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('audit.index');
});

// VOTER/MAHASISWA ROUTES GROUP
Route::middleware(['auth', 'voter'])->prefix('voter')->group(function () {
    // Jalur Filter 1: Belum Memilih
    Route::middleware(['voted.notyet'])->group(function () {
        Route::get('/token-verification', [VoteController::class, 'showTokenForm'])->name('voter.token');
        Route::post('/token-verification', [VoteController::class, 'verifyToken']);
        
        // Jalur Filter 2: Token Sudah Terverifikasi
        Route::middleware(['token.verified'])->group(function () {
            Route::get('/voting', [VoteController::class, 'showVotingPage'])->name('voter.voting');
            Route::post('/voting', [VoteController::class, 'castVote'])->name('voter.cast');
        });
    });
    
    // Hasil Akhir Bukti Voting Digital
    Route::get('/receipt', [VoteController::class, 'receipt'])->name('voter.receipt');
});