<?php
require __DIR__ . '/../public/index.php';

// Paksa folder storage & cache Laravel pindah ke folder /tmp bawaan Vercel
$storagePath = '/tmp/storage/bootstrap/cache';
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0755, true);
}

putenv("CONTAINER_STORAGE_PATH=/tmp");
putenv("APP_STORAGE=/tmp");