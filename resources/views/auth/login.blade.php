<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - {{ $setting->site_name ?? 'IAI DARUL FALAH' }}</title>

    @if($setting && $setting->favicon)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/'.$setting->favicon) }}">
    @endif

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --brand-primary: #0b5345;
            --brand-primary-dark: #07352c;
            --brand-primary-light: #0e6b59;
            --brand-gold: #cca43b;
            --brand-gold-dark: #b88d21;
            --brand-gold-light: #dfb743;
            --bg-deep: #06241e;
        }

        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 15% 20%, rgba(204, 164, 59, 0.18) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(14, 107, 89, 0.28) 0%, transparent 45%),
                linear-gradient(135deg, var(--bg-deep) 0%, var(--brand-primary-dark) 50%, #062a22 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 24px 16px;
        }

        /* Subtle Islamic Arabesque Geometric Background Overlay */
        .bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(204, 164, 59, 0.08) 1.5px, transparent 1.5px);
            background-size: 28px 28px;
            pointer-events: none;
            z-index: 0;
        }

        /* Ambient Glow Elements */
        .glow-orb-1 {
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(204, 164, 59, 0.2) 0%, transparent 70%);
            top: -80px;
            right: -80px;
            filter: blur(50px);
            pointer-events: none;
            animation: pulseGlow 8s ease-in-out infinite alternate;
        }

        .glow-orb-2 {
            position: absolute;
            width: 440px;
            height: 440px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(11, 83, 69, 0.45) 0%, transparent 70%);
            bottom: -100px;
            left: -100px;
            filter: blur(60px);
            pointer-events: none;
            animation: pulseGlow 10s ease-in-out infinite alternate-reverse;
        }

        @keyframes pulseGlow {
            0% { transform: scale(1) translate(0, 0); opacity: 0.6; }
            100% { transform: scale(1.15) translate(20px, 20px); opacity: 0.9; }
        }

        /* Top Bar Floating Navigation */
        .top-nav {
            position: absolute;
            top: 24px;
            left: 24px;
            z-index: 10;
        }

        .btn-back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(204, 164, 59, 0.35);
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.25s ease-in-out;
        }

        .btn-back-home:hover {
            color: #ffffff;
            background: rgba(204, 164, 59, 0.25);
            border-color: var(--brand-gold);
            transform: translateX(-3px);
            box-shadow: 0 4px 15px rgba(204, 164, 59, 0.25);
        }

        /* Main Container Card */
        .login-card-wrapper {
            position: relative;
            z-index: 5;
            width: 100%;
            max-width: 460px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1.5px solid rgba(204, 164, 59, 0.35);
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.4),
                0 0 35px rgba(204, 164, 59, 0.12);
            padding: 40px 36px 36px 36px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        /* Top Golden Bar Accent */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--brand-gold-dark) 0%, var(--brand-gold-light) 50%, var(--brand-gold-dark) 100%);
        }

        /* Brand Header Section */
        .brand-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 78px;
            height: 78px;
            background: #ffffff;
            border-radius: 20px;
            padding: 10px;
            margin-bottom: 14px;
            border: 1.5px solid rgba(204, 164, 59, 0.3);
            box-shadow: 0 8px 24px rgba(11, 83, 69, 0.12);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .logo-wrap:hover {
            transform: scale(1.06) rotate(-2deg);
        }

        .logo-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .brand-title {
            color: var(--brand-primary);
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 0.86rem;
            font-weight: 500;
            margin-bottom: 0;
        }

        .gold-divider {
            width: 44px;
            height: 3px;
            background: linear-gradient(90deg, var(--brand-gold), var(--brand-gold-light));
            border-radius: 99px;
            margin: 12px auto 0 auto;
        }

        /* Alerts */
        .alert-custom-status {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            border-radius: 12px;
            font-size: 0.85rem;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .alert-custom-error {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: 12px;
            font-size: 0.85rem;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        /* Input Controls */
        .form-group-custom {
            margin-bottom: 20px;
        }

        .form-label-custom {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            color: #94a3b8;
            font-size: 1.1rem;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-control-custom {
            width: 100%;
            height: 48px;
            padding: 10px 16px 10px 46px;
            font-size: 0.92rem;
            color: #0f172a;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        .form-control-custom:focus {
            background: #ffffff;
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 3.5px rgba(11, 83, 69, 0.15);
        }

        .form-control-custom:focus + .input-icon,
        .input-wrapper:focus-within .input-icon {
            color: var(--brand-primary);
        }

        .form-control-custom.is-invalid {
            border-color: #ef4444;
            background-color: #fff5f5;
        }

        .form-control-custom.is-invalid:focus {
            box-shadow: 0 0 0 3.5px rgba(239, 68, 68, 0.15);
        }

        .invalid-feedback-custom {
            font-size: 0.78rem;
            color: #dc2626;
            margin-top: 5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Password Toggle Button */
        .btn-toggle-pw {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 6px 8px;
            color: #94a3b8;
            cursor: pointer;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            transition: all 0.2s ease;
        }

        .btn-toggle-pw:hover {
            color: var(--brand-primary);
            background: rgba(11, 83, 69, 0.08);
        }

        /* Remember & Forgot options */
        .options-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 6px;
            margin-bottom: 24px;
            font-size: 0.85rem;
        }

        .custom-checkbox-wrap {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
            color: #475569;
            font-weight: 500;
        }

        .custom-checkbox-wrap input[type="checkbox"] {
            width: 17px;
            height: 17px;
            margin-right: 8px;
            accent-color: var(--brand-primary);
            cursor: pointer;
            border-radius: 4px;
        }

        .forgot-link {
            color: var(--brand-gold-dark);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: var(--brand-primary);
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-login-submit {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-primary-dark) 100%);
            border: 1.5px solid var(--brand-gold);
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 700;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            letter-spacing: 0.4px;
            box-shadow: 0 10px 25px rgba(11, 83, 69, 0.35);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }

        .btn-login-submit:hover {
            background: linear-gradient(135deg, var(--brand-primary-light) 0%, var(--brand-primary) 100%);
            box-shadow: 0 12px 30px rgba(204, 164, 59, 0.35);
            transform: translateY(-2px);
            color: #ffffff;
        }

        .btn-login-submit:active {
            transform: translateY(0);
            box-shadow: 0 6px 18px rgba(11, 83, 69, 0.3);
        }

        /* Security Note in Footer */
        .security-badge {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px dashed #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #64748b;
            font-size: 0.76rem;
            font-weight: 500;
            text-align: center;
        }

        .security-badge i {
            color: var(--brand-gold);
            font-size: 0.9rem;
        }

        /* Footer Copyright outside card */
        .login-footer-copy {
            text-align: center;
            margin-top: 18px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.78rem;
        }

        @media (max-width: 576px) {
            .top-nav {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 16px;
                width: 100%;
                text-align: left;
            }

            .login-card {
                padding: 32px 22px 28px 22px;
                border-radius: 20px;
            }

            .brand-title {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

    {{-- Background Pattern & Glow --}}
    <div class="bg-pattern"></div>
    <div class="glow-orb-1"></div>
    <div class="glow-orb-2"></div>

    <div class="login-card-wrapper">

        {{-- Top Return Navigation --}}
        <div class="mb-3">
            <a href="{{ route('home') }}" class="btn-back-home">
                <i class="bi bi-arrow-left"></i>
                <span>Kembali ke Beranda Website</span>
            </a>
        </div>

        {{-- Main Login Card --}}
        <div class="login-card">

            {{-- Brand / Campus Header --}}
            <div class="brand-header">
                <div class="logo-wrap">
                    @if($setting && $setting->logo)
                        <img src="{{ asset('storage/'.$setting->logo) }}"
                             alt="{{ $setting->site_name ?? 'Logo Kampus' }}"
                             class="logo-img">
                    @else
                        <i class="bi bi-mortarboard-fill fs-1" style="color: var(--brand-primary);"></i>
                    @endif
                </div>

                <h1 class="brand-title">{{ $setting->site_name ?? 'IAI DARUL FALAH' }}</h1>
                <p class="brand-subtitle">Portal Login Sistem Informasi & CMS</p>
                <div class="gold-divider"></div>
            </div>

            {{-- Session Status Alert --}}
            @if (session('status'))
                <div class="alert-custom-status">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            {{-- General Errors --}}
            @if ($errors->any())
                <div class="alert-custom-error">
                    <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <span>Autentikasi Gagal:</span>
                    </div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email Input --}}
                <div class="form-group-custom">
                    <label for="email" class="form-label-custom">Email / Username</label>
                    <div class="input-wrapper">
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="admin@indafa.ac.id"
                               class="form-control-custom {{ $errors->has('email') ? 'is-invalid' : '' }}" />
                        <i class="bi bi-envelope-fill input-icon"></i>
                    </div>
                    @error('email')
                        <div class="invalid-feedback-custom">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                {{-- Password Input --}}
                <div class="form-group-custom">
                    <label for="password" class="form-label-custom">Kata Sandi</label>
                    <div class="input-wrapper">
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="Masukkan kata sandi"
                               class="form-control-custom {{ $errors->has('password') ? 'is-invalid' : '' }}" />
                        <i class="bi bi-shield-lock-fill input-icon"></i>
                        <button type="button" class="btn-toggle-pw" onclick="togglePasswordVisibility()" aria-label="Toggle password visibility">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback-custom">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                {{-- Options: Remember Me & Forgot Password --}}
                <div class="options-row">
                    <label class="custom-checkbox-wrap" for="remember_me">
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
                <button type="submit" class="btn-login-submit">
                    <span>Masuk ke Dashboard</span>
                    <i class="bi bi-arrow-right-circle-fill fs-5"></i>
                </button>

                {{-- Security Info Footer --}}
                <div class="security-badge">
                    <i class="bi bi-shield-fill-check"></i>
                    <span>Koneksi aman terenkripsi &bull; Portal Khusus Administrator</span>
                </div>
            </form>
        </div>

        {{-- Outer Footer Copyright --}}
        <div class="login-footer-copy">
            &copy; {{ date('Y') }} {{ $setting->site_name ?? 'IAI Darul Falah' }}. All rights reserved.
        </div>
    </div>

    {{-- Script: Password Visibility Toggle --}}
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
</body>
</html>
