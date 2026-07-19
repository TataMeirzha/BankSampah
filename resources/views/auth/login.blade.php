<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Bank Sampah</title>
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
            --danger: #B3452C;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
        }

        .card {
            width: 100%;
            max-width: 400px;
            background: var(--surface);
            border-radius: 20px;
            padding: 40px 36px;
            box-shadow: 0 20px 60px -20px rgba(31, 77, 61, 0.25);
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 19px;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
        }
        .logo svg { width: 22px; height: 22px; }

        h1 {
            font-size: 21px;
            font-weight: 600;
            margin: 0 0 6px;
        }
        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin: 0 0 24px;
        }

        .status-banner {
            background: var(--sage-tint);
            border: 1px solid var(--sage);
            color: var(--forest-dark);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 20px;
        }
        .error-banner {
            background: #FBEDE8;
            border: 1px solid #E4B3A2;
            color: var(--danger);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        input[type=email], input[type=password] {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text);
            background: var(--surface);
        }
        input:focus { outline: none; border-color: var(--forest); }

        .field { margin-bottom: 16px; }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 22px;
        }
        .remember-row input { accent-color: var(--forest); }

        .submit-btn {
            width: 100%;
            background: var(--forest);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 14.5px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
        }
        .submit-btn:hover { background: var(--forest-dark); }

        .register-hint {
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 20px;
        }
        .register-hint a { color: var(--forest); font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

    <div class="card">
        <div class="logo">
            <svg viewBox="0 0 24 24" fill="none" stroke="#1F4D3D" stroke-width="2"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="M9 12l2 2 4-4"/></svg>
            Bank Sampah
        </div>

        <h1>Masuk ke akun kamu</h1>
        <p class="subtitle">Lanjutkan mengelola setoran sampahmu.</p>

        @if (session('status'))
            <div class="status-banner">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-banner">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="field">
                <label for="password">Kata sandi</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="margin:0;font-weight:400;">Ingat saya</label>
            </div>
            <button type="submit" class="submit-btn">Masuk</button>
        </form>

        <p class="register-hint">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>

</body>
</html>
