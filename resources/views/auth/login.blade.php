<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    @php
        $rawSiteName = $setting->site_name ?? 'IAI Darul Falah';
        $siteName = (in_array(strtoupper(trim($rawSiteName)), ['IAII DARUL FALA', 'IAI DARUL FALA', 'DARUL FALA', 'NAMA KAMPUS'])) 
            ? 'IAI Darul Falah' 
            : $rawSiteName;
    @endphp
    <title>Login Admin - {{ $siteName }}</title>

    @if($setting && $setting->favicon)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/'.$setting->favicon) }}">
    @endif

    {{-- System Fonts Stack: Instan tanpa render-blocking eksternal --}}
    <style>
        :root {
            --brand-primary: #0b5345;
            --brand-primary-dark: #07352c;
            --brand-primary-light: #0e6b59;
            --brand-gold: #cca43b;
            --brand-gold-dark: #b88d21;
            --brand-gold-light: #dfb743;
            --bg-deep: #06241e;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(145deg, #051e18 0%, #0b5345 55%, #083c31 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            color: var(--text-dark);
        }

        /* Container Card */
        .login-wrapper {
            width: 100%;
            max-width: 450px;
        }

        /* Top Return Button */
        .btn-back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #f1f5f9;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 16px;
            transition: background 0.2s, border-color 0.2s;
        }

        .btn-back-home:hover {
            background: rgba(204, 164, 59, 0.2);
            border-color: var(--brand-gold);
            color: #ffffff;
        }

        /* Card Content */
        .login-card {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid rgba(204, 164, 59, 0.35);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            padding: 34px 30px;
            position: relative;
            overflow: hidden;
        }

        /* Top Accent Gold Bar */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--brand-gold-dark) 0%, var(--brand-gold-light) 50%, var(--brand-gold-dark) 100%);
        }

        /* Header Logo & Title */
        .brand-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .logo-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            background: #f8fafc;
            border-radius: 16px;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #e2e8f0;
        }

        .logo-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .brand-title {
            color: var(--brand-primary);
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .brand-subtitle {
            color: var(--text-muted);
            font-size: 0.84rem;
        }

        .gold-divider {
            width: 40px;
            height: 3px;
            background: var(--brand-gold);
            border-radius: 99px;
            margin: 10px auto 0 auto;
        }

        /* Alerts */
        .alert-status {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            border-radius: 10px;
            font-size: 0.84rem;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
        }

        .alert-error {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: 10px;
            font-size: 0.84rem;
            padding: 10px 14px;
            margin-bottom: 18px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            width: 18px;
            height: 18px;
            color: #94a3b8;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-field {
            width: 100%;
            height: 46px;
            padding: 10px 14px 10px 42px;
            font-size: 0.9rem;
            color: #0f172a;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.2s, background-color 0.2s;
        }

        .input-field:focus {
            background: #ffffff;
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 3px rgba(11, 83, 69, 0.12);
        }

        .input-field.is-invalid {
            border-color: #ef4444;
            background-color: #fff5f5;
        }

        .error-feedback {
            font-size: 0.76rem;
            color: #dc2626;
            margin-top: 4px;
            font-weight: 500;
        }

        .btn-toggle-pw {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            padding: 6px;
            color: #94a3b8;
            cursor: pointer;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-toggle-pw:hover {
            color: var(--brand-primary);
        }

        /* Options Row */
        .options-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0 20px 0;
            font-size: 0.83rem;
        }

        .checkbox-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            color: #475569;
        }

        .checkbox-label input {
            accent-color: var(--brand-primary);
            cursor: pointer;
        }

        .forgot-link {
            color: var(--brand-gold-dark);
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-link:hover {
            text-decoration: underline;
            color: var(--brand-primary);
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            height: 48px;
            background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-primary-dark) 100%);
            border: 1px solid var(--brand-gold);
            color: #ffffff;
            font-size: 0.92rem;
            font-weight: 600;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
        }

        .btn-submit:hover {
            opacity: 0.94;
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        /* Quick Login Demo Cards */
        .demo-roles-box {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid #f1f5f9;
        }

        .demo-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .demo-title {
            font-size: 0.74rem;
            font-weight: 700;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .demo-badge-hint {
            font-size: 0.68rem;
            background: #f1f5f9;
            color: #64748b;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 500;
        }

        .demo-list {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .demo-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 8px 10px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            text-align: left;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .demo-btn:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .demo-btn.febit-mbs {
            background: #f0fdf4;
            border-color: #bbf7d0;
        }

        .demo-btn.febit-mbs:hover {
            background: #dcfce7;
            border-color: #86efac;
        }

        .demo-role-name {
            font-size: 0.77rem;
            font-weight: 600;
            color: #1e293b;
            display: block;
        }

        .demo-role-sub {
            font-size: 0.68rem;
            color: #64748b;
            display: block;
        }

        .role-pill {
            font-size: 0.66rem;
            padding: 2px 7px;
            border-radius: 6px;
            font-weight: 600;
            white-space: nowrap;
        }

        .pill-super { background: #0f172a; color: #ffffff; }
        .pill-mbs { background: #0d9488; color: #ffffff; }
        .pill-syariah { background: #0284c7; color: #ffffff; }
        .pill-lpm { background: #d97706; color: #ffffff; }

        /* Security Note */
        .security-note {
            margin-top: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #94a3b8;
            font-size: 0.72rem;
            text-align: center;
        }

        .login-footer-copy {
            text-align: center;
            margin-top: 16px;
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.76rem;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-card {
                padding: 24px 18px;
                border-radius: 14px;
            }
            .brand-title {
                font-size: 1.15rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">

        {{-- Kembali ke Beranda --}}
        <div>
            <a href="{{ route('home') }}" class="btn-back-home">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>

        {{-- Card Utama --}}
        <div class="login-card">

            {{-- Brand / Logo --}}
            <div class="brand-header">
                <div class="logo-wrap">
                    @if($setting && $setting->logo)
                        <img src="{{ asset('storage/'.$setting->logo) }}"
                             alt="{{ $siteName }}"
                             class="logo-img">
                    @else
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#0b5345" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                    @endif
                </div>

                <h1 class="brand-title">{{ $siteName }}</h1>
                <p class="brand-subtitle">Portal Login Sistem Informasi & CMS</p>
                <div class="gold-divider"></div>
            </div>

            {{-- Status Session --}}
            @if (session('status'))
                <div class="alert-status">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            {{-- Error Notifikasi --}}
            @if ($errors->any())
                <div class="alert-error">
                    <div style="font-weight: 600; margin-bottom: 4px;">Autentikasi Gagal:</div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email / Akun</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </span>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="email@kampus.com"
                               class="input-field {{ $errors->has('email') ? 'is-invalid' : '' }}" />
                    </div>
                    @error('email')
                        <div class="error-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </span>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="Masukkan kata sandi"
                               class="input-field {{ $errors->has('password') ? 'is-invalid' : '' }}" />
                        <button type="button" class="btn-toggle-pw" onclick="togglePasswordVisibility()" aria-label="Toggle password">
                            <svg id="eyeIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="error-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Options --}}
                <div class="options-row">
                    <label class="checkbox-label" for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn-submit">
                    <span>Masuk ke Dashboard</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>

                {{-- Security Note --}}
                <div class="security-note">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span>Koneksi aman terenkripsi &bull; Portal Khusus Sivitas Akademika</span>
                </div>
            </form>
        </div>

        {{-- Footer Copy --}}
        <div class="login-footer-copy">
            &copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.
        </div>
    </div>

    {{-- Script Ringan --}}
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path d="m9.88 9.88 4.24 4.24m-4.24 0 4.24-4.24"></path><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path><line x1="2" y1="2" x2="22" y2="22"></line>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle>';
            }
        }

        function fillLogin(email, password) {
            const emailInput = document.getElementById('email');
            const pwInput = document.getElementById('password');
            if (emailInput) {
                emailInput.value = email;
                emailInput.focus();
            }
            if (pwInput) {
                pwInput.value = password;
            }
        }
    </script>
</body>
</html>
