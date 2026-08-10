<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - FINANIC Business Consultants</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f7faf8;
        }

        h1, h2, h3, h4 {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }

        /* ===== LEFT BRAND PANEL ===== */
        .auth-brand {
            flex: 1;
            background: linear-gradient(135deg, #084b31 0%, #0f7a4e 50%, #18a66a 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .auth-brand::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .auth-brand::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }

        .brand-content {
            position: relative;
            z-index: 2;
            text-align: center;
            animation: fadeInLeft 0.6s ease both;
        }

        .brand-logo {
            width: 72px;
            height: 72px;
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 28px;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin-bottom: 28px;
            backdrop-filter: blur(10px);
        }

        .brand-content h1 {
            color: #fff;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .brand-content p {
            color: rgba(255,255,255,0.7);
            font-size: 16px;
            line-height: 1.7;
            max-width: 380px;
            margin: 0 auto 40px;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 16px;
            max-width: 340px;
        }

        .brand-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            font-weight: 500;
        }

        .brand-feature i {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        /* ===== RIGHT FORM PANEL ===== */
        .auth-form-panel {
            width: 520px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #fff;
            animation: fadeInRight 0.6s ease both;
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            margin-bottom: 36px;
        }

        .form-header .mobile-logo {
            display: none;
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #0f7a4e, #084b31);
            border-radius: 12px;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin-bottom: 24px;
        }

        .form-header h2 {
            font-size: 28px;
            font-weight: 800;
            color: #10201a;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #71827b;
            font-size: 15px;
            line-height: 1.5;
        }

        /* ===== FORM FIELDS ===== */
        .form-group {
            margin-bottom: 20px;
            animation: fadeInUp 0.4s ease both;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.15s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.25s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #10201a;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #91a29b;
            font-size: 14px;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .input-wrapper input {
            width: 100%;
            height: 50px;
            padding: 0 14px 0 42px;
            border: 1.5px solid #e8f0ec;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            color: #10201a;
            background: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #0f7a4e;
            box-shadow: 0 0 0 4px rgba(15, 122, 78, 0.08);
        }

        .input-wrapper input:focus + i,
        .input-wrapper input:focus ~ i {
            color: #0f7a4e;
        }

        .input-wrapper .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #91a29b;
            cursor: pointer;
            padding: 4px 8px;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .input-wrapper .password-toggle:hover {
            color: #0f7a4e;
        }

        .form-options {
            margin-bottom: 28px;
        }

        /* ===== SUBMIT BUTTON ===== */
        .submit-btn {
            width: 100%;
            height: 52px;
            background: linear-gradient(135deg, #0f7a4e, #084b31);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            box-shadow: 0 8px 24px rgba(15, 122, 78, 0.25);
            animation: fadeInUp 0.4s ease both;
            animation-delay: 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 36px rgba(15, 122, 78, 0.35);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn i {
            transition: transform 0.25s ease;
        }

        .submit-btn:hover i {
            transform: translateX(4px);
        }

        /* ===== ERROR ALERT ===== */
        .error-alert {
            background: linear-gradient(135deg, #fde8e8, #fdd4d4);
            border: 1px solid #f5c6c6;
            border-left: 4px solid #dc3545;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            animation: shake 0.4s ease;
        }

        .error-alert p {
            color: #7a1f1f;
            font-size: 13px;
            font-weight: 500;
            margin: 0;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .auth-brand {
                display: none;
            }

            .auth-form-panel {
                width: 100%;
                min-height: 100vh;
            }

            .form-header .mobile-logo {
                display: inline-flex;
            }
        }

        @media (max-width: 575px) {
            .auth-form-panel {
                padding: 24px 20px;
            }

            .form-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Left Brand Panel -->
    <div class="auth-brand">
        <div class="brand-content">
            <div class="brand-logo">F</div>
            <h1>FINANIC</h1>
            <p>Professional tax consulting and business compliance services for individuals and companies across Pakistan.</p>
            <div class="brand-features">
                <div class="brand-feature">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure & Confidential</span>
                </div>
                <div class="brand-feature">
                    <i class="fas fa-clock"></i>
                    <span>Real-time Deadline Tracking</span>
                </div>
                <div class="brand-feature">
                    <i class="fas fa-headset"></i>
                    <span>Expert Tax Consultants</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Form Panel -->
    <div class="auth-form-panel">
        <div class="form-container">
            <div class="form-header">
                <div class="mobile-logo">F</div>
                <h2>Set New Password</h2>
                <p>Create a new strong password to secure your account.</p>
            </div>

            @if($errors->any())
                <div class="error-alert">
                    @foreach($errors->all() as $error)
                        <p><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" placeholder="you@example.com" required autofocus>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Enter new password" required>
                        <i class="fas fa-lock"></i>
                        <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" required>
                        <i class="fas fa-lock"></i>
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options"></div>

                <button type="submit" class="submit-btn">
                    Reset Password <i class="fas fa-check"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const icon = btn.querySelector('i');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
