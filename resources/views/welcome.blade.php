<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah - Sampah tersalur, bukan tertumpuk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #F3F6F1;
            --surface: #FFFFFF;
            --forest: #1F4D3D;
            --forest-dark: #163829;
            --sage: #6B9080;
            --sage-tint: #E7EEE8;
            --amber: #D9A441;
            --text: #1B2A22;
            --text-muted: #5B6B62;
            --border: #DDE5DD;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a { color: inherit; }

        .wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            padding: 22px 0;
            border-bottom: 1px solid var(--border);
        }

        header .wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 19px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo svg { width: 22px; height: 22px; }

        nav { display: flex; align-items: center; gap: 18px; font-size: 14px; }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            padding: 9px 18px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1.5px solid transparent;
            font-family: inherit;
        }
        .btn-primary { background: var(--forest); color: #fff; }
        .btn-primary:hover { background: var(--forest-dark); }
        .btn-ghost { color: var(--forest); border-color: var(--border); background: transparent; }
        .btn-ghost:hover { border-color: var(--sage); }
        .btn-text { color: var(--text-muted); font-weight: 500; text-decoration: none; }

        .role-badge {
            font-size: 11.5px;
            font-weight: 600;
            background: var(--sage-tint);
            color: var(--forest-dark);
            padding: 3px 9px;
            border-radius: 999px;
            text-transform: capitalize;
        }

        form.inline { display: inline; margin: 0; }

        /* Hero */
        .hero {
            padding: 72px 0 88px;
        }
        .hero .wrap {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 48px;
            align-items: center;
        }
        @media (max-width: 820px) {
            .hero .wrap { grid-template-columns: 1fr; padding-top: 8px; }
        }

        .eyebrow {
            font-size: 12.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--sage);
            margin-bottom: 14px;
        }

        .hero h1 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 44px;
            line-height: 1.15;
            margin: 0 0 18px;
            letter-spacing: -0.01em;
        }
        @media (max-width: 560px) {
            .hero h1 { font-size: 32px; }
        }

        .hero p.lead {
            font-size: 16px;
            line-height: 1.7;
            color: var(--text-muted);
            max-width: 480px;
            margin: 0 0 30px;
        }

        .hero-ctas { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-lg { padding: 13px 24px; font-size: 15px; }

        .hero-status {
            margin-top: 22px;
            font-size: 13.5px;
            background: var(--sage-tint);
            border: 1px solid var(--sage);
            color: var(--forest-dark);
            padding: 10px 14px;
            border-radius: 9px;
            display: inline-block;
        }

        .loop-visual {
            width: 100%;
            max-width: 340px;
            margin: 0 auto;
        }
        @media (prefers-reduced-motion: no-preference) {
            .loop-visual .spin { animation: spin 26s linear infinite; transform-origin: 160px 160px; }
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Alur / cara kerja */
        .section { padding: 64px 0; }
        .section-alt { background: var(--surface); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

        .section-head { max-width: 560px; margin: 0 0 40px; }
        .section-head .eyebrow { margin-bottom: 10px; }
        .section-head h2 {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 28px;
            margin: 0 0 10px;
        }
        .section-head p { color: var(--text-muted); font-size: 15px; line-height: 1.7; margin: 0; }

        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        @media (max-width: 760px) {
            .steps { grid-template-columns: 1fr; }
        }

        .step-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            position: relative;
        }
        .section-alt .step-card { background: var(--bg); }

        .step-num {
            font-family: 'Fraunces', serif;
            font-size: 13px;
            color: var(--amber);
            font-weight: 600;
            margin-bottom: 12px;
            display: block;
        }

        .step-card svg { width: 24px; height: 24px; color: var(--forest); margin-bottom: 12px; }

        .step-card h3 { font-size: 15.5px; font-weight: 600; margin: 0 0 8px; }
        .step-card p { font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 0; }

        /* Role cards */
        .roles {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        @media (max-width: 760px) {
            .roles { grid-template-columns: 1fr; }
        }

        .role-card {
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px 22px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .role-card svg { width: 26px; height: 26px; color: var(--forest); }
        .role-card h3 { font-size: 16px; font-weight: 600; margin: 4px 0 0; }
        .role-card p { font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 0 0 8px; flex-grow: 1; }
        .role-card a { font-size: 13.5px; font-weight: 600; color: var(--forest); text-decoration: none; }
        .role-card a:hover { text-decoration: underline; }

        footer {
            padding: 32px 0;
            border-top: 1px solid var(--border);
        }
        footer .wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 13px;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <header>
        <div class="wrap">
            <div class="logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="#1F4D3D" stroke-width="2"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="M9 12l2 2 4-4"/></svg>
                Bank Sampah
            </div>
            <nav>
                @auth
                    <span class="role-badge">{{ str_replace('_', ' ', auth()->user()->role) }}</span>
                    <span>Halo, {{ auth()->user()->name }}</span>
                    <form class="inline" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-ghost">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-text">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="wrap">
            <div>
                <div class="eyebrow">Platform pengelolaan sampah warga</div>
                <h1>Sampah tersalur, bukan tertumpuk.</h1>
                <p class="lead">Bank Sampah menghubungkan warga, bank sampah, dan DLH dalam satu alur: dari sampah dicatat, dipilah, diberi nilai, sampai yang tak layak daur ulang benar-benar tertangani sampai TPA.</p>

                @if (session('status'))
                    <div class="hero-status">{{ session('status') }}</div><br>
                @endif

                <div class="hero-ctas">
                    @auth
                        <a href="#alur" class="btn btn-primary btn-lg">Lihat alur sistem</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar sekarang</a>
                        <a href="#alur" class="btn btn-ghost btn-lg">Pelajari alurnya</a>
                    @endauth
                </div>
            </div>

            <svg class="loop-visual" viewBox="0 0 320 320" fill="none">
                <g class="spin">
                    <path d="M160 40 L200 78 L160 78 Z" fill="#D9A441"/>
                    <path d="M262 160 L224 198 L224 160 Z" fill="#D9A441"/>
                    <path d="M58 198 L96 160 L96 198 Z" fill="#D9A441"/>
                    <path d="M160 78 A82 82 0 0 1 233 118" stroke="#6B9080" stroke-width="6" fill="none" stroke-linecap="round"/>
                    <path d="M224 168 A82 82 0 0 1 108 226" stroke="#6B9080" stroke-width="6" fill="none" stroke-linecap="round"/>
                    <path d="M96 160 A82 82 0 0 1 141 84" stroke="#6B9080" stroke-width="6" fill="none" stroke-linecap="round"/>
                </g>
                <circle cx="160" cy="160" r="34" fill="#1F4D3D"/>
                <path d="M148 160l8 8 16-16" stroke="#EFF5F1" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </section>

    <section class="section section-alt" id="alur">
        <div class="wrap">
            <div class="section-head">
                <div class="eyebrow">Cara kerja</div>
                <h2>Tiga peran, satu alur yang jelas</h2>
                <p>Setiap sampah yang disetor punya jejak yang bisa dilacak, dari rumah warga sampai titik akhirnya.</p>
            </div>
            <div class="steps">
                <div class="step-card">
                    <span class="step-num">01</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 7h16l-1.5 12.5a2 2 0 0 1-2 1.5H7.5a2 2 0 0 1-2-1.5L4 7Z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/></svg>
                    <h3>Penyetor mencatat sampah</h3>
                    <p>Warga mendeskripsikan dan menyetorkan sampah dari rumah ke bank sampah terdekat.</p>
                </div>
                <div class="step-card">
                    <span class="step-num">02</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="9" width="18" height="11" rx="1.5"/><path d="M3 9l2-5h14l2 5"/><path d="M9 13h6"/></svg>
                    <h3>Bank sampah memilah</h3>
                    <p>Sampah diverifikasi dan dipilah, sampah layak dicatat dan diberi rekomendasi pemanfaatan.</p>
                </div>
                <div class="step-card">
                    <span class="step-num">03</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="M9 12l2 2 4-4"/></svg>
                    <h3>DLH menuntaskan sisanya</h3>
                    <p>Sampah yang tak layak daur ulang diteruskan ke DLH hingga tuntas dibuang ke TPA.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrap">
            <div class="section-head">
                <div class="eyebrow">Untuk siapa</div>
                <h2>Daftar sesuai peran kamu</h2>
                <p>Baik warga, pengelola bank sampah, maupun DLH, semua punya tempatnya di sistem ini.</p>
            </div>
            <div class="roles">
                <div class="role-card">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 7h16l-1.5 12.5a2 2 0 0 1-2 1.5H7.5a2 2 0 0 1-2-1.5L4 7Z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/></svg>
                    <h3>User Penyetor</h3>
                    <p>Catat dan setorkan sampah rumah tangga, lacak statusnya sampai selesai.</p>
                    @guest<a href="{{ route('register') }}">Daftar sebagai penyetor →</a>@endguest
                </div>
                <div class="role-card">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="9" width="18" height="11" rx="1.5"/><path d="M3 9l2-5h14l2 5"/><path d="M9 13h6"/></svg>
                    <h3>Bank Sampah</h3>
                    <p>Kelola setoran warga di wilayahmu, pilah sampah, dan berikan rekomendasi pemanfaatan.</p>
                    @guest<a href="{{ route('register') }}">Daftar sebagai bank sampah →</a>@endguest
                </div>
                <div class="role-card">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="M9 12l2 2 4-4"/></svg>
                    <h3>DLH</h3>
                    <p>Pantau dan tuntaskan sampah yang tak layak daur ulang sampai ke TPA.</p>
                    @guest<a href="{{ route('register') }}">Daftar sebagai DLH →</a>@endguest
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="wrap">
            <span>© {{ date('Y') }} Bank Sampah</span>
            <span>Dibangun untuk pengelolaan sampah warga yang lebih tertata</span>
        </div>
    </footer>

</body>
</html>
