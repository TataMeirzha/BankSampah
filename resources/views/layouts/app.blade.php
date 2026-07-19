<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Bank Sampah</title>
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
            --amber-tint: #FAF6EC;
            --text: #1B2A22;
            --text-muted: #5B6B62;
            --border: #DDE5DD;
            --danger: #B3452C;
            --danger-tint: #FBEDE8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a { color: inherit; }

        .wrap { max-width: 1100px; margin: 0 auto; padding: 0 24px; }

        header { padding: 20px 0; border-bottom: 1px solid var(--border); background: var(--surface); }
        header .wrap { display: flex; align-items: center; justify-content: space-between; }

        .logo { font-family: 'Fraunces', serif; font-weight: 600; font-size: 18px; display: flex; align-items: center; gap: 8px; }
        .logo svg { width: 20px; height: 20px; }

        nav { display: flex; align-items: center; gap: 16px; font-size: 14px; }

        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 9px; padding: 9px 16px; font-size: 13.5px; font-weight: 600;
            text-decoration: none; cursor: pointer; border: 1.5px solid transparent; font-family: inherit;
        }
        .btn-primary { background: var(--forest); color: #fff; }
        .btn-primary:hover { background: var(--forest-dark); }
        .btn-ghost { color: var(--forest); border-color: var(--border); background: transparent; }
        .btn-ghost:hover { border-color: var(--sage); }

        .role-badge {
            font-size: 11px; font-weight: 600; background: var(--sage-tint); color: var(--forest-dark);
            padding: 3px 9px; border-radius: 999px; text-transform: capitalize;
        }

        form.inline { display: inline; margin: 0; }

        main { padding: 40px 0 64px; }

        .page-head { margin-bottom: 28px; }
        .page-head h1 { font-family: 'Fraunces', serif; font-weight: 600; font-size: 26px; margin: 0 0 6px; }
        .page-head p { color: var(--text-muted); font-size: 14px; margin: 0; }

        .status-banner {
            background: var(--sage-tint); border: 1px solid var(--sage); color: var(--forest-dark);
            padding: 12px 16px; border-radius: 10px; font-size: 13.5px; margin-bottom: 22px;
        }
        .error-banner {
            background: var(--danger-tint); border: 1px solid #E4B3A2; color: var(--danger);
            padding: 12px 16px; border-radius: 10px; font-size: 13.5px; margin-bottom: 22px;
        }

        .stat-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 32px; }
        .stat-card { background: var(--surface); border: 1px solid var(--border); border-radius: 14px; padding: 18px 20px; }
        .stat-card .label { font-size: 12px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
        .stat-card .value { font-family: 'Fraunces', serif; font-size: 26px; font-weight: 600; margin-top: 6px; }

        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 14px; padding: 24px; }
        .card + .card { margin-top: 16px; }
        .card h2 { font-size: 16px; font-weight: 600; margin: 0 0 4px; }
        .card .card-sub { font-size: 13px; color: var(--text-muted); margin: 0 0 18px; }

        table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
        th { text-align: left; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.04em; color: var(--text-muted); padding: 0 10px 10px; border-bottom: 1px solid var(--border); }
        td { padding: 12px 10px; border-bottom: 1px solid var(--border); vertical-align: top; }
        tr:last-child td { border-bottom: none; }

        .badge { display: inline-block; font-size: 11.5px; font-weight: 600; padding: 3px 10px; border-radius: 999px; }
        .badge-menunggu { background: var(--amber-tint); color: #8A6423; }
        .badge-diverifikasi { background: var(--sage-tint); color: var(--forest-dark); }
        .badge-dipilah { background: #E4EEFB; color: #29527A; }
        .badge-selesai { background: var(--sage-tint); color: var(--forest); }
        .badge-layak { background: var(--sage-tint); color: var(--forest); }
        .badge-tidak_layak { background: var(--danger-tint); color: var(--danger); }
        .badge-diterima_dlh { background: var(--amber-tint); color: #8A6423; }
        .badge-dikirim_tpa { background: #E4EEFB; color: #29527A; }
        .badge-terbuang { background: var(--sage-tint); color: var(--forest); }

        .empty-state { text-align: center; padding: 40px 20px; color: var(--text-muted); font-size: 13.5px; }
    </style>
</head>
<body>

    <header>
        <div class="wrap">
            <a href="/" class="logo" style="text-decoration:none;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#1F4D3D" stroke-width="2"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="M9 12l2 2 4-4"/></svg>
                Bank Sampah
            </a>
            <nav>
                @auth
                    <span class="role-badge">{{ str_replace('_', ' ', auth()->user()->role) }}</span>
                    <span>{{ auth()->user()->name }}</span>
                    <form class="inline" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-ghost">Keluar</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <div class="wrap">
            @if (session('status'))
                <div class="status-banner">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="error-banner">{{ $errors->first() }}</div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
