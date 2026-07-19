<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Bank Sampah</title>
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
            --radius: 14px;
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

        .shell {
            width: 100%;
            max-width: 980px;
            background: var(--surface);
            border-radius: 20px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 340px 1fr;
            box-shadow: 0 20px 60px -20px rgba(31, 77, 61, 0.25);
        }

        @media (max-width: 800px) {
            .shell { grid-template-columns: 1fr; }
        }

        .brand {
            background: var(--forest);
            color: #EFF5F1;
            padding: 40px 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .brand-mark {
            font-family: 'Fraunces', serif;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .brand-loop {
            width: 88px;
            height: 88px;
            margin: 32px 0;
        }

        .brand-copy h2 {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 22px;
            line-height: 1.35;
            margin: 0 0 12px;
        }

        .brand-copy p {
            font-size: 14px;
            line-height: 1.7;
            color: #C7D9CD;
            margin: 0;
        }

        .brand-steps {
            list-style: none;
            padding: 0;
            margin: 28px 0 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .brand-steps li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13px;
            color: #C7D9CD;
        }

        .brand-steps .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--amber);
            margin-top: 6px;
            flex-shrink: 0;
        }

        .form-panel {
            padding: 40px 44px;
        }

        @media (max-width: 500px) {
            .form-panel { padding: 32px 22px; }
        }

        .form-panel h1 {
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 6px;
        }

        .form-panel > .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin: 0 0 28px;
        }

        .status-banner {
            background: var(--sage-tint);
            border: 1px solid var(--sage);
            color: var(--forest-dark);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 22px;
        }

        .error-banner {
            background: #FBEDE8;
            border: 1px solid #E4B3A2;
            color: var(--danger);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 22px;
        }
        .error-banner ul { margin: 4px 0 0; padding-left: 18px; }

        fieldset {
            border: none;
            padding: 0;
            margin: 0 0 26px;
        }

        legend {
            font-size: 12.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--sage);
            margin-bottom: 12px;
            padding: 0;
        }

        .role-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        @media (max-width: 560px) {
            .role-grid { grid-template-columns: 1fr; }
        }

        .role-card {
            position: relative;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 14px 12px;
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease;
        }

        .role-card input {
            position: absolute;
            opacity: 0;
            inset: 0;
            margin: 0;
            cursor: pointer;
        }

        .role-card svg { width: 22px; height: 22px; color: var(--forest); margin-bottom: 8px; }

        .role-card .role-name {
            font-size: 13.5px;
            font-weight: 600;
            display: block;
        }

        .role-card .role-desc {
            font-size: 11.5px;
            color: var(--text-muted);
            display: block;
            margin-top: 2px;
            line-height: 1.4;
        }

        .role-card:has(input:checked) {
            border-color: var(--forest);
            background: var(--sage-tint);
        }

        .role-note {
            font-size: 12.5px;
            color: var(--text-muted);
            background: #FAF6EC;
            border: 1px solid #EAD9A8;
            border-radius: 8px;
            padding: 9px 12px;
            margin-top: 12px;
            display: none;
        }
        .role-note.visible { display: block; }

        .field-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .field-grid .full { grid-column: 1 / -1; }

        @media (max-width: 560px) {
            .field-grid { grid-template-columns: 1fr; }
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        input[type=text], input[type=email], input[type=password], input[type=tel], textarea {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text);
            background: var(--surface);
            transition: border-color .15s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--forest);
        }

        textarea { resize: vertical; min-height: 64px; }

        .field { margin-bottom: 14px; }

        .field .hint { font-size: 11.5px; color: var(--text-muted); margin-top: 4px; }

        .locate-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--forest);
            background: var(--sage-tint);
            border: 1px solid var(--sage);
            border-radius: 8px;
            padding: 7px 12px;
            cursor: pointer;
            margin-bottom: 14px;
        }
        .locate-btn:hover { background: #DCE9E0; }
        .locate-status { font-size: 12px; color: var(--text-muted); margin-left: 8px; }

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
            transition: background .15s ease;
        }
        .submit-btn:hover { background: var(--forest-dark); }

        .login-hint {
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 18px;
        }
        .login-hint a { color: var(--forest); font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>

    <div class="shell">
        <aside class="brand">
            <div>
                <div class="brand-mark">Bank Sampah</div>
                <svg class="brand-loop" viewBox="0 0 88 88" fill="none">
                    <path d="M44 8 L58 22 L44 22 Z" fill="#D9A441"/>
                    <path d="M76 44 L62 58 L62 44 Z" fill="#D9A441"/>
                    <path d="M12 60 L26 46 L26 60 Z" fill="#D9A441"/>
                    <path d="M44 22 A22 22 0 0 1 65 40" stroke="#8FB39F" stroke-width="3" fill="none" stroke-linecap="round"/>
                    <path d="M62 52 A22 22 0 0 1 30 65" stroke="#8FB39F" stroke-width="3" fill="none" stroke-linecap="round"/>
                    <path d="M26 46 A22 22 0 0 1 40 25" stroke="#8FB39F" stroke-width="3" fill="none" stroke-linecap="round"/>
                </svg>
                <div class="brand-copy">
                    <h2>Sampah tersalur, bukan tertumpuk.</h2>
                    <p>Satu akun menghubungkan penyetor, bank sampah, dan DLH di wilayah kamu — dari pencatatan sampai sampah benar-benar tertangani.</p>
                </div>
            </div>
            <ul class="brand-steps">
                <li><span class="dot"></span> Penyetor mencatat dan menyetor sampah</li>
                <li><span class="dot"></span> Bank sampah memilah dan memberi rekomendasi</li>
                <li><span class="dot"></span> DLH menuntaskan sampah yang tak layak daur ulang</li>
            </ul>
        </aside>

        <div class="form-panel">
            <h1>Buat akun baru</h1>
            <p class="subtitle">Pilih peran kamu di sistem, lalu lengkapi data berikut.</p>

            @if (session('status'))
                <div class="status-banner">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="error-banner">
                    Ada isian yang perlu diperbaiki:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="register-form">
                @csrf

                <fieldset>
                    <legend>Daftar sebagai</legend>
                    <div class="role-grid">
                        <label class="role-card">
                            <input type="radio" name="role" value="penyetor" onchange="onRoleChange()" {{ old('role', 'penyetor') === 'penyetor' ? 'checked' : '' }}>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 7h16l-1.5 12.5a2 2 0 0 1-2 1.5H7.5a2 2 0 0 1-2-1.5L4 7Z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/></svg>
                            <span class="role-name">User Penyetor</span>
                            <span class="role-desc">Menyetorkan catatan sampah dari rumah</span>
                        </label>
                        <label class="role-card">
                            <input type="radio" name="role" value="bank_sampah" onchange="onRoleChange()" {{ old('role') === 'bank_sampah' ? 'checked' : '' }}>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="9" width="18" height="11" rx="1.5"/><path d="M3 9l2-5h14l2 5"/><path d="M9 13h6"/></svg>
                            <span class="role-name">Bank Sampah</span>
                            <span class="role-desc">Memilah sampah dan mengelola setoran warga</span>
                        </label>
                        <label class="role-card">
                            <input type="radio" name="role" value="dlh" onchange="onRoleChange()" {{ old('role') === 'dlh' ? 'checked' : '' }}>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/><path d="M9 12l2 2 4-4"/></svg>
                            <span class="role-name">DLH</span>
                            <span class="role-desc">Menangani sampah yang tak layak daur ulang</span>
                        </label>
                    </div>
                    <div class="role-note" id="role-note">
                        Akun bank sampah dan DLH perlu diverifikasi admin dulu sebelum bisa digunakan. Kamu akan menerima kabar setelah disetujui.
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Data akun</legend>
                    <div class="field-grid">
                        <div class="field full">
                            <label for="name">Nama lengkap</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="field">
                            <label for="phone">Nomor HP / WhatsApp</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                        <div class="field">
                            <label for="password">Kata sandi</label>
                            <input type="password" id="password" name="password" required minlength="8">
                        </div>
                        <div class="field">
                            <label for="password_confirmation">Ulangi kata sandi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Alamat</legend>
                    <button type="button" class="locate-btn" onclick="useMyLocation()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3"/></svg>
                        Gunakan lokasi saya
                    </button>
                    <span class="locate-status" id="locate-status"></span>

                    <div class="field">
                        <label for="alamat_lengkap">Alamat lengkap</label>
                        <textarea id="alamat_lengkap" name="alamat_lengkap" required>{{ old('alamat_lengkap') }}</textarea>
                    </div>
                    <div class="field-grid">
                        <div class="field">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
                        </div>
                        <div class="field">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                        </div>
                        <div class="field">
                            <label for="kota">Kota / Kabupaten</label>
                            <input type="text" id="kota" name="kota" value="{{ old('kota') }}" required>
                        </div>
                        <div class="field">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi') }}">
                        </div>
                        <div class="field">
                            <label for="kode_pos">Kode pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}">
                        </div>
                    </div>
                    <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
                    <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">
                    <p class="hint">Titik lokasi (opsional) dipakai untuk mencocokkan kamu dengan bank sampah atau DLH terdekat.</p>
                </fieldset>

                <button type="submit" class="submit-btn">Daftar sekarang</button>
            </form>

            <p class="login-hint">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>

    <script>
        function onRoleChange() {
            const role = document.querySelector('input[name="role"]:checked')?.value;
            const note = document.getElementById('role-note');
            note.classList.toggle('visible', role === 'bank_sampah' || role === 'dlh');
        }

        function useMyLocation() {
            const status = document.getElementById('locate-status');
            if (!navigator.geolocation) {
                status.textContent = 'Perangkat tidak mendukung lokasi otomatis.';
                return;
            }
            status.textContent = 'Mencari lokasi...';
            navigator.geolocation.getCurrentPosition(
                (pos) => {
                    document.getElementById('latitude').value = pos.coords.latitude;
                    document.getElementById('longitude').value = pos.coords.longitude;
                    status.textContent = 'Lokasi berhasil disimpan.';
                },
                () => {
                    status.textContent = 'Gagal mengambil lokasi. Isi alamat manual saja.';
                }
            );
        }

        onRoleChange();
    </script>
</body>
</html>
