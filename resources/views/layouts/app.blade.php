<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Voting Himpunan Mahasiswa</title>
    
    <!-- Enterprise Fonts & Bootstrap Core -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --evote-font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            --evote-font-mono: 'JetBrains Mono', monospace;
            
            /* 🤍 Vercel/Stripe Premium Light Mode Palette */
            --bg-base: #f8fafc; /* Slate 50 */
            --bg-surface: rgba(255, 255, 255, 0.8); 
            --border-premium: rgba(15, 23, 42, 0.06);
            
            --text-main: #0f172a; /* Slate 900 */
            --text-muted: #64748b; /* Slate 500 */
            
            /* Brand Accents */
            --accent-primary: #4f46e5; /* Indigo 600 */
            --aurora-gradient: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
            
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        body {
            font-family: var(--evote-font-sans);
            background-color: var(--bg-base);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            letter-spacing: -0.02em;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            position: relative;
        }

        /* 🌌 High-Density Hyper-Reactive Canvas Component */
        #cosmic-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
            pointer-events: none;
            opacity: 1;
        }

        /* Ambient Glow Layer untuk kedalaman 3D Tema Cerah */
        .ambient-glow-1 {
            position: fixed;
            top: -10%;
            right: -5%;
            width: 60vw;
            height: 60vh;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
            z-index: 2;
            pointer-events: none;
        }

        .ambient-glow-2 {
            position: fixed;
            bottom: -10%;
            left: -10%;
            width: 70vw;
            height: 70vh;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.04) 0%, rgba(255, 255, 255, 0) 70%);
            z-index: 2;
            pointer-events: none;
        }

        /* Layout Container Envelope */
        .app-wrapper {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* 🧊 Glassmorphic Premium Navbar */
        .premium-navbar {
            background-color: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(24px) saturate(190%);
            -webkit-backdrop-filter: blur(24px) saturate(190%);
            border-bottom: 1px solid var(--border-premium);
            position: sticky;
            top: 0;
            z-index: 1050;
            padding: 0.85rem 0;
            transition: var(--transition-smooth);
        }
        
        .premium-navbar:hover {
            border-bottom-color: rgba(15, 23, 42, 0.12);
        }

        .brand-link {
            font-weight: 800;
            font-size: 1.15rem;
            letter-spacing: -0.03em;
            background: linear-gradient(135deg, #0f172a 30%, #4f46e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            transition: var(--transition-smooth);
        }

        .brand-icon-wrapper {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 0.5rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        /* User Profile Badge Component */
        .user-profile-wrapper {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            background-color: rgba(15, 23, 42, 0.04);
            padding: 0.45rem 1rem;
            border-radius: 9999px;
            border: 1px solid var(--border-premium);
            transition: var(--transition-smooth);
        }
        
        .user-profile-wrapper:hover {
            background-color: rgba(15, 23, 42, 0.06);
            border-color: rgba(15, 23, 42, 0.15);
        }

        .user-avatar-indicator {
            width: 7px;
            height: 7px;
            background-color: #10b981; 
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.6);
        }

        .user-name-text {
            font-size: 0.825rem;
            font-weight: 600;
            color: #334155;
        }

        /* ⚡ Button Systems: High-End Hover Effects */
        .btn-premium-auth {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.25rem;
            border-radius: 10px;
            transition: var(--transition-smooth);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            text-decoration: none;
            overflow: hidden;
        }

        .btn-premium-login {
            background-color: #0f172a;
            border: 1px solid #0f172a;
            color: #ffffff !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            z-index: 1;
        }

        .btn-premium-login::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            z-index: -1;
            transition: var(--transition-smooth);
        }

        .btn-premium-login:hover {
            transform: translateY(-1.5px);
            border-color: transparent;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25), 0 2px 6px rgba(0,0,0,0.1);
            background: var(--aurora-gradient);
        }

        .btn-premium-logout {
            background-color: transparent;
            border: 1px solid rgba(239, 68, 68, 0.18);
            color: #ef4444;
        }

        .btn-premium-logout:hover {
            background-color: #fef2f2;
            border-color: #ef4444;
            color: #b91c1c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.08);
        }

        /* 🚨 Modern Response Alerts */
        .saas-alert {
            border-radius: 14px;
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: 1px solid transparent;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: alertSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .saas-alert-success {
            background-color: #f0fdf4;
            border-color: #bbf7d0;
            color: #14532d;
            box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.05);
        }

        .saas-alert-danger {
            background-color: #fef2f2;
            border-color: #fee2e2;
            color: #7f1d1d;
            box-shadow: 0 10px 25px -5px rgba(220, 38, 38, 0.05);
        }

        @keyframes alertSlideIn {
            from { transform: translateY(-12px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* 🏛️ Global Structural Enhancements for Yield Content */
        .card, .premium-card {
            background: var(--bg-surface) !important;
            border: 1px solid var(--border-premium) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
            border-radius: 16px !important;
            color: var(--text-main) !important;
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.04) !important;
            transition: var(--transition-smooth) !important;
        }
        
        .card:hover, .premium-card:hover {
            border-color: rgba(79, 70, 229, 0.15) !important;
            box-shadow: 0 30px 60px -10px rgba(79, 70, 229, 0.06) !important;
            transform: translateY(-2px);
        }

        .form-control, .form-select {
            background-color: #ffffff !important;
            border: 1px solid rgba(15, 23, 42, 0.1) !important;
            color: var(--text-main) !important;
            border-radius: 10px !important;
            padding: 0.625rem 1rem !important;
            font-size: 0.9rem !important;
            transition: var(--transition-smooth) !important;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff !important;
            border-color: var(--accent-primary) !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.08) !important;
        }

        .table {
            color: var(--text-main) !important;
            border-color: rgba(15, 23, 42, 0.04) !important;
        }
        
        .table th {
            font-weight: 600 !important;
            color: var(--text-muted) !important;
            text-transform: uppercase !important;
            font-size: 0.75rem !important;
            letter-spacing: 0.05em !important;
            background: rgba(15, 23, 42, 0.01) !important;
            border-bottom: 1px solid rgba(15, 23, 42, 0.06) !important;
        }

        .table td {
            background: transparent !important;
            vertical-align: middle !important;
            font-size: 0.875rem !important;
            border-bottom: 1px solid rgba(15, 23, 42, 0.03) !important;
        }
    </style>
</head>
<body>

    <!-- 🌌 High-Density Interactive Particle Canvas Grid -->
    <canvas id="cosmic-canvas"></canvas>
    
    <!-- 🔮 Ambient Space Blobs -->
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>

    <div class="app-wrapper">

        <!-- Header Navigation Layer -->
        <nav class="navbar navbar-expand-lg premium-navbar">
            <div class="container">
                <a class="brand-link" href="#">
                    <div class="brand-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: url(#brand-gradient-id);"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                        <svg width="0" height="0">
                            <linearGradient id="brand-gradient-id" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#4f46e5" />
                                <stop offset="100%" stop-color="#06b6d4" />
                            </linearGradient>
                        </svg>
                    </div>
                    <span>E-VOTING PLATFORM</span>
                </a>
                
                <div class="ms-auto d-flex align-items-center gap-3">
                    @auth
                        <!-- Profile Block -->
                        <div class="user-profile-wrapper">
                            <span class="user-avatar-indicator"></span>
                            <span class="user-name-text">Hi, {{ Auth::user()->name }}</span>
                        </div>
                        
                        <!-- Core Backend Logout Link -->
                        <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
                            @csrf
                            <button type="submit" class="btn btn-premium-auth btn-premium-logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <!-- Guest Authorization Trigger -->
                        <a class="btn btn-premium-auth btn-premium-login" href="{{ route('login') }}">
                            <span>Login Akun</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Main Dynamic Content Slot Frame -->
        <div class="container py-5">
            @if(session('success')) 
                <div class="alert saas-alert saas-alert-success mb-4" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <div>{{ session('success') }}</div>
                </div> 
            @endif
            
            @if(session('error')) 
                <div class="alert saas-alert saas-alert-danger mb-4" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <div>{{ session('error') }}</div>
                </div> 
            @endif
            @yield('content')
        </div>
    </div>

    @stack('modals')

    <!-- Core Interactive Bundle Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 🌌 High-Performance Hyper-Reactive Physics Engine Script -->
    <script>
        const canvas = document.getElementById('cosmic-canvas');
        const ctx = canvas.getContext('2d');

        let width = canvas.width = window.innerWidth;
        let height = canvas.height = window.innerHeight;

        // Kepadatan objek dinaikkan signifikan (pembagi lebih kecil = objek lebih banyak)
        let numParticles = Math.min(Math.floor((width * height) / 8000), 160);
        const particles = [];
        const mouse = { x: null, y: null, radius: 180 };

        window.addEventListener('resize', () => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        });

        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        window.addEventListener('mouseleave', () => {
            mouse.x = null;
            mouse.y = null;
        });

        class HyperNode {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 0.5;
                this.vy = (Math.random() - 0.5) * 0.5;
                this.baseRadius = Math.random() * 1.8 + 1.2;
                this.radius = this.baseRadius;
                this.color = 'rgba(148, 163, 184, 0.35)'; // Slate 400 default
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;

                // Bounce limit boundaries
                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;

                // Interaksi Kursor Magnetik Kuat & Perubahan Ukuran Dinamis
                if (mouse.x !== null && mouse.y !== null) {
                    let dx = mouse.x - this.x;
                    let dy = mouse.y - this.y;
                    let distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < mouse.radius) {
                        let force = (mouse.radius - distance) / mouse.radius;
                        
                        // Menarik partikel sedikit ke kursor (efek magnetik halus) lalu didorong perlahan
                        this.x -= (dx / distance) * force * 1.8;
                        this.y -= (dy / distance) * force * 1.8;
                        
                        // Reaksi ukuran & warna saat disentuh kursor
                        this.radius = this.baseRadius + force * 3.5;
                        this.color = `rgba(79, 70, 229, ${0.35 + force * 0.55})`; // Menguat menjadi Indigo menyala
                    } else {
                        this.normalizeNode();
                    }
                } else {
                    this.normalizeNode();
                }
            }

            normalizeNode() {
                if (this.radius > this.baseRadius) this.radius -= 0.1;
                this.color = 'rgba(148, 163, 184, 0.35)';
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                
                // Tambahkan efek bayangan pendaran khusus partikel aktif dekat kursor
                if (this.radius > this.baseRadius + 1) {
                    ctx.shadowBlur = 12;
                    ctx.shadowColor = 'rgba(79, 70, 229, 0.4)';
                } else {
                    ctx.shadowBlur = 0;
                }
                
                ctx.fill();
            }
        }

        // Generate Array Element Nodes
        for (let i = 0; i < numParticles; i++) {
            particles.push(new HyperNode());
        }

        // Loop Rendering Engine 60 FPS
        function renderMatrixEngine() {
            // Menggunakan clearRect murni agar rendering performanya tetap tinggi dan ringan
            ctx.clearRect(0, 0, width, height);
            ctx.shadowBlur = 0; // Reset global shadow agar tidak lag

            // Render Jaringan Garis Koneksi Dinamis
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    let dx = particles[i].x - particles[j].x;
                    let dy = particles[i].y - particles[j].y;
                    let distance = Math.sqrt(dx * dx + dy * dy);

                    // Jangkauan koneksi garis diperluas agar grid terlihat penuh dan padat
                    if (distance < 140) {
                        let alpha = (140 - distance) / 140 * 0.16;
                        let strokeColor = `rgba(99, 102, 241, ${alpha})`; // Indigo base

                        // Jika garis berada di area kursor mouse, tebalkan dan ubah warna ke Cyan/Indigo neon
                        if (mouse.x !== null && mouse.y !== null) {
                            let mDx = mouse.x - particles[i].x;
                            let mDy = mouse.y - particles[i].y;
                            let mDist = Math.sqrt(mDx * mDx + mDy * mDy);
                            
                            if (mDist < mouse.radius) {
                                let activeForce = (mouse.radius - mDist) / mouse.radius;
                                alpha = (140 - distance) / 140 * (0.2 + activeForce * 0.55);
                                strokeColor = `rgba(6, 182, 212, ${alpha})`; // Bermutasi ke Cyan menyala terang
                            }
                        }

                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = strokeColor;
                        ctx.lineWidth = alpha * 1.5; // Garis otomatis menebal jika dekat kursor
                        ctx.stroke();
                    }
                }
                
                particles[i].update();
                particles[i].draw();
            }

            requestAnimationFrame(renderMatrixEngine);
        }

        // Jalankan mesin visualisasi eksekusi frame
        renderMatrixEngine();
    </script>
</body>
</html>