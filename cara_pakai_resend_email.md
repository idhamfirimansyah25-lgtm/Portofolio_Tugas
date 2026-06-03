📧 Dokumentasi Setup Pengiriman Email Token Voting via Resend API
Proyek: UAS Kriptografi — Sistem E-Voting
Stack: Laravel 12.61 · PHP 8.2.12 · Resend API
Tanggal: 3 Juni 2026

Latar Belakang Masalah
Pengiriman email token voting ke inbox pengguna awalnya gagal karena:

No	Percobaan	Hasil
1	SMTP bawaan Laravel (Port 2525/587/465)	❌ Connection Timeout — port di-block ISP/WiFi
2	Mailtrap API via driver custom / mailtrap	❌ Laravel 12 menolak transport tersebut
3	Http::withToken() langsung ke Mailtrap Sandbox API	❌ Email tidak pernah sampai (Sandbox hanya untuk testing, bukan kirim email beneran)
Solusi: Resend API
Menggunakan HTTP API (port 443) — tidak kena block ISP
Laravel 12 sudah native support transport resend
Free tier: 100 email/hari (cukup untuk demo UAS)
Step 1 — Buat Akun & Dapatkan API Key Resend
Buka https://resend.com → klik Sign Up
Daftar menggunakan email (misal: emailkamu@gmail.com)
Setelah login, buka menu API Keys di sidebar kiri
Klik Create API Key → beri nama (misal: UAS Kriptografi) → pilih permission Full Access
Copy API Key yang muncul (format: re_xxxxxxxx_xxxxxxxxxxxxxxxxxxxxx)
CAUTION

API Key hanya ditampilkan sekali. Simpan baik-baik!

Step 2 — Install Package Resend untuk Laravel
Buka terminal di root project Laravel, lalu jalankan:

bash

composer require resend/resend-laravel
Tunggu sampai selesai. Package akan otomatis ter-discover oleh Laravel.

Step 3 — Konfigurasi File .env
Buka file .env di root project, lalu set variabel berikut:

env

MAIL_MAILER=resend
RESEND_API_KEY=re_xxxxxxxx_xxxxxxxxxxxxxxxxxxxxx
MAIL_FROM_ADDRESS="onboarding@resend.dev"
MAIL_FROM_NAME="Sistem E-Voting UAS"
IMPORTANT

MAIL_FROM_ADDRESS harus onboarding@resend.dev kalau belum punya custom domain yang terverifikasi di Resend. Ini adalah shared domain bawaan Resend untuk testing.

Hapus konfigurasi Mailtrap lama (jika ada):
Pastikan TIDAK ADA baris-baris ini di .env:

env

# HAPUS BARIS-BARIS INI JIKA ADA:
MAIL_HOST=send.api.mailtrap.io
MAIL_PORT=443
MAIL_PASSWORD=xxxxxxxxxxxxxxxxxxxxxxxx
Step 4 — Konfigurasi config/mail.php
Pastikan di dalam array mailers sudah ada entry resend:

php

'resend' => [
    'transport' => 'resend',
    'key' => env('RESEND_API_KEY'),
],
NOTE

Entry ini biasanya sudah ada di Laravel 12 secara default. Jika tidak ada, tambahkan manual di dalam array mailers.

Pastikan juga TIDAK ADA entry dengan transport invalid seperti:

php

// ❌ HAPUS jika ada — Laravel 12 tidak mengenal transport ini
'api' => [
    'transport' => 'mailtrap-api',
    'key' => env('MAIL_PASSWORD'),
],
Step 5 — Buat Mailable Class
File: app/Mail/VotingTokenMail.php

php

<?php
namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class VotingTokenMail extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    public string $token;
    public function __construct(User $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Token Voting Pemilihan Ketua Himpunan',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.token',
        );
    }
}
NOTE

Property $user dan $token yang bersifat public otomatis tersedia di Blade template sebagai variabel $user dan $token.

Step 6 — Buat Email Blade Template
File: resources/views/emails/token.blade.php

Variabel yang tersedia di template:

$user — Model User (punya $user->name, $user->email, dll)
$token — String token 6 karakter (misal: A8X3KP)
Contoh penggunaan di template:

html

<h1>Halo, {{ $user->name }}.</h1>
<p>Berikut adalah token voting Anda:</p>
<h2>{{ $token }}</h2>
Step 7 — Kirim Email dari Controller
File: app/Http/Controllers/Admin/TokenController.php

php

<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\VotingToken;
use App\Models\User;
use App\Services\TokenService;
use App\Mail\VotingTokenMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
class TokenController extends Controller
{
    protected TokenService $tokenService;
    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }
    public function store(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $user = User::findOrFail($request->user_id);
        // 1. Generate token e-voting
        $votingToken = $this->tokenService->generate($user);
        // 2. Kirim email via Resend (HTTP API port 443, anti-block ISP)
        try {
            Mail::to($user->email)->send(
                new VotingTokenMail($user, $votingToken->token)
            );
            return redirect()->route('tokens.index')
                ->with('success', "Token berhasil dibuat & dikirim ke {$user->email}");
        } catch (\Exception $e) {
            return redirect()->route('tokens.index')
                ->with('warning', "Token berhasil dibuat, tapi email GAGAL: {$e->getMessage()}");
        }
    }
}
Penjelasan Penting:
Kode	Penjelasan
$this->tokenService->generate($user)	Return-nya adalah object VotingToken (model Eloquent), bukan string
$votingToken->token	Ini yang mengambil string token 6 karakter dari model
Mail::to()->send()	Menggunakan Laravel Mail facade — otomatis pakai transport Resend sesuai .env
try-catch	Menangkap error pengiriman email supaya tidak crash 500
Step 8 — Clear Cache & Test
Jalankan perintah berikut di terminal:

bash

php artisan config:clear
php artisan serve
Cara Test:
Login sebagai Admin
Buka halaman Token → klik Generate Token
Pilih voter yang emailnya sama dengan email akun Resend
Klik submit
Cek inbox Gmail → email berisi token seharusnya sudah masuk ✅
⚠️ Catatan Penting — Limitasi Free Tier Resend
WARNING

Tanpa custom domain yang terverifikasi, Resend free tier hanya bisa mengirim email ke alamat email yang sama dengan email akun Resend (email yang dipakai saat sign up).

Untuk Demo UAS:
Daftarkan voter di website dengan email yang sama dengan email akun Resend
Saat demo sidang, generate token → tunjukkan email masuk di inbox HP
Jika Ingin Kirim ke Email Siapapun:
Buka dashboard Resend → Domains → Add Domain
Tambahkan domain milik sendiri
Ikuti instruksi verifikasi DNS (tambah record MX, SPF, DKIM)
Setelah domain terverifikasi, ganti MAIL_FROM_ADDRESS di .env ke email dengan domain tersebut
Ringkasan File yang Dimodifikasi
File	Aksi
.env	Set MAIL_MAILER=resend, tambah RESEND_API_KEY, set MAIL_FROM_ADDRESS
config/mail.php	Pastikan entry resend transport ada, hapus mailtrap-api
app/Mail/VotingTokenMail.php	Mailable class dengan User + string $token
resources/views/emails/token.blade.php	Template email menggunakan $user->name dan $token
app/Http/Controllers/Admin/TokenController.php	Kirim email via Mail::to()->send() dengan error handling
app/Providers/AppServiceProvider.php	Hapus import MailtrapTransportFactory yang error
composer.json	Tambah dependency resend/resend-laravel