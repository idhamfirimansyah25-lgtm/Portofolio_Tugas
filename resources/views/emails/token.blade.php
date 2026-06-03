<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Token Otorisasi E-Voting Anda</title>
    <style>
        /* Embedded transactional email resets for global inbox rendering */
        body {
            background-color: #f4f4f5; /* Zinc 100 */
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .email-container {
            max-width: 560px;
            margin: 40px auto;
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }
        .email-header-logo {
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #000000;
            margin-bottom: 32px;
            border-bottom: 1px solid #f4f4f5;
            padding-bottom: 16px;
        }
        h1 {
            font-size: 20px;
            font-weight: 700;
            color: #18181b; /* Zinc 900 */
            letter-spacing: -0.03em;
            margin-top: 0;
            margin-bottom: 16px;
        }
        p {
            font-size: 15px;
            line-height: 1.6;
            color: #52525b; /* Zinc 600 */
            margin-top: 0;
            margin-bottom: 24px;
        }
        /* Secure Isolated Token Vault Component */
        .token-vault-wrapper {
            background-color: #fafafa; /* Zinc 50 */
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            margin-bottom: 28px;
        }
        .token-vault-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #71717a; /* Zinc 500 */
            margin-bottom: 8px;
            display: block;
        }
        .token-code-display {
            font-family: "SFMono-Regular", Consolas, "Liberation Mono", Menlo, monospace;
            font-size: 32px;
            font-weight: 800;
            color: #000000; /* Sophisticated absolute black alternative to standard blue */
            letter-spacing: 6px !important;
            margin: 0;
            padding: 0;
            line-height: 1;
        }
        /* Security Warning Callout Panel */
        .security-notice {
            background-color: #fff5f5; /* Light red translatation */
            border-left: 3px solid #ef4444;
            padding: 12px 16px;
            border-radius: 4px 8px 8px 4px;
            margin-bottom: 32px;
        }
        .security-notice-text {
            font-size: 13px;
            font-weight: 500;
            color: #9f1239;
            margin: 0;
            line-height: 1.4;
        }
        /* Footer Identity Layer */
        .email-footer {
            border-top: 1px solid #f4f4f5;
            padding-top: 24px;
            text-align: center;
        }
        .footer-text {
            font-size: 12px;
            color: #a1a1aa; /* Zinc 400 */
            line-height: 1.5;
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Main Container Envelope -->
    <div class="email-container">
        
        <!-- App/Institution Identity Header -->
        <div class="email-header-logo">
            ⚡ E-Voting Platform
        </div>

        <!-- Greeting Segment -->
        <h1>Halo, {{ $user->name }}.</h1>
        <p>Hak suara Anda telah siap digunakan. Berikut adalah token otentikasi unik yang diterbitkan oleh sistem untuk memberikan hak suara Anda secara sah dalam pemilihan elektronik:</p>

        <!-- Secure Token Code Block -->
        <div class="token-vault-wrapper">
            <span class="token-vault-label">Kunci Akses Pemilih (Token)</span>
            <h2 class="token-code-display">{{ $token }}</h2>
        </div>

        <!-- Strict Warning Callout Box -->
        <div class="security-notice">
            <p class="security-notice-text">
                <strong>Pemberitahuan Keamanan:</strong> Jangan bagikan kode token ini kepada siapa pun, termasuk panitia penyelenggara. Token ini bersifat rahasia dan hanya dapat digunakan satu kali.
            </p>
        </div>

        <!-- Closing Salutation -->
        <p style="margin-bottom: 36px;">Terima kasih atas partisipasi aktif Anda dalam menjaga integritas demokrasi digital ini.</p>

        <!-- Formal Footer Sub-System -->
        <div class="email-footer">
            <p class="footer-text">Email ini dikirimkan secara otomatis oleh Sistem Manajemen Token E-Voting.</p>
            <p class="footer-text" style="margin-top: 2px;">© {{ date('Y') }} Panitia Pemilihan Elektronik. Hak Cipta Dilindungi.</p>
        </div>

    </div>

</body>
</html>