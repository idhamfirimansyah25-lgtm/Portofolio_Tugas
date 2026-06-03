<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class CryptoService
{
    protected string $cipher = 'AES-256-CBC';

    public function aesEncrypt(string $data): ?string
    {
        try {
            $key = config('app.key');
            // Menghapus prefix 'base64:' jika ada dari key bawaan Laravel
            if (str_starts_with($key, 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }
            $ivLength = openssl_cipher_iv_length($this->cipher);
            $iv = openssl_random_pseudo_bytes($ivLength);
            $encrypted = openssl_encrypt($data, $this->cipher, $key, 0, $iv);
            
            return base64_encode($iv . $encrypted);
        } catch (Exception $e) {
            Log::error('Encryption Error: ' . $e->getMessage());
            return null;
        }
    }

    public function aesDecrypt(string $payload): ?string
    {
        try {
            $key = config('app.key');
            if (str_starts_with($key, 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }
            $decoded = base64_decode($payload);
            $ivLength = openssl_cipher_iv_length($this->cipher);
            $iv = substr($decoded, 0, $ivLength);
            $encrypted = substr($decoded, $ivLength);
            
            return openssl_decrypt($encrypted, $this->cipher, $key, 0, $iv);
        } catch (Exception $e) {
            Log::error('Decryption Error: ' . $e->getMessage());
            return null;
        }
    }

    public function sha256(string $data): string
    {
        return hash('sha256', $data);
    }
}