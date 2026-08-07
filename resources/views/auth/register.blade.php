<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FINANIC Business Consultants</title>
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

        .brand-content > p {
            color: rgba(255,255,255,0.7);
            font-size: 16px;
            line-height: 1.7;
            max-width: 380px;
            margin: 0 auto 40px;
        }

        .brand-steps {
            display: flex;
            flex-direction: column;
            gap: 18px;
            max-width: 340px;
        }

        .brand-step {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            color: rgba(255,255,255,0.85);
        }

        .brand-step .step-num {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            flex-shrink: 0;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .brand-step .step-text strong {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .brand-step .step-text span {
            font-size: 13px;
            color: rgba(255,255,255,0.55);
        }

        /* ===== RIGHT FORM PANEL ===== */
        .auth-form-panel {
            width: 580px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #fff;
            animation: fadeInRight 0.6s ease both;
            overflow-y: auto;
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
            max-width: 440px;
        }

        .form-header {
            margin-bottom: 32px;
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
        }

        .form-header p a {
            color: #0f7a4e;
            text-decoration: none;
            font-weight: 600;
        }

        .form-header p a:hover {
            text-decoration: underline;
        }

        /* ===== FORM FIELDS ===== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 18px;
            animation: fadeInUp 0.4s ease both;
        }

        .form-group:nth-child(1) { animation-delay: 0.08s; }
        .form-group:nth-child(2) { animation-delay: 0.12s; }
        .form-group:nth-child(3) { animation-delay: 0.16s; }
        .form-group:nth-child(4) { animation-delay: 0.20s; }
        .form-group:nth-child(5) { animation-delay: 0.24s; }
        .form-group:nth-child(6) { animation-delay: 0.28s; }

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

        .form-group label .optional {
            color: #91a29b;
            font-weight: 500;
            font-size: 12px;
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

        /* ===== PASSWORD STRENGTH ===== */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            border-radius: 2px;
            background: #e8f0ec;
            overflow: hidden;
        }

        .password-strength .bar {
            height: 100%;
            width: 0;
            border-radius: 2px;
            transition: width 0.3s ease, background 0.3s ease;
        }

        .password-strength .bar.weak { width: 33%; background: #dc3545; }
        .password-strength .bar.medium { width: 66%; background: #f0ad4e; }
        .password-strength .bar.strong { width: 100%; background: #0f7a4e; }

        .password-strength-text {
            font-size: 11px;
            font-weight: 600;
            margin-top: 4px;
            color: #91a29b;
        }

        /* ===== TERMS CHECK ===== */
        .terms-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 24px;
            animation: fadeInUp 0.4s ease both;
            animation-delay: 0.32s;
        }

        .terms-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #0f7a4e;
            border-radius: 4px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .terms-check label {
            font-size: 13px;
            color: #71827b;
            line-height: 1.5;
        }

        .terms-check label a {
            color: #0f7a4e;
            text-decoration: none;
            font-weight: 600;
        }

        .terms-check label a:hover {
            text-decoration: underline;
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
            animation-delay: 0.36s;
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

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Left Brand Panel -->
    <div class="auth-brand">
        <div class="brand-content">
            <div class="brand-logo">F</div>
            <h1>Join FINANIC</h1>
            <p>Create your account and take control of your tax compliance with expert guidance.</p>
            <div class="brand-steps">
                <div class="brand-step">
                    <div class="step-num">1</div>
                    <div class="step-text">
                        <strong>Create Account</strong>
                        <span>Sign up with your basic details</span>
                    </div>
                </div>
                <div class="brand-step">
                    <div class="step-num">2</div>
                    <div class="step-text">
                        <strong>Track Deadlines</strong>
                        <span>Never miss a tax filing deadline</span>
                    </div>
                </div>
                <div class="brand-step">
                    <div class="step-num">3</div>
                    <div class="step-text">
                        <strong>Get Expert Help</strong>
                        <span>Connect with professional tax consultants</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Form Panel -->
    <div class="auth-form-panel">
        <div class="form-container">
            <div class="form-header">
                <div class="mobile-logo">F</div>
                <h2>Create your account</h2>
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>

            @if($errors->any())
                <div class="error-alert">
                    @foreach($errors->all() as $error)
                        <p><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <input type="hidden" name="service" value="{{ request('service') }}">
                <div class="form-group">
                    <label>I am a...</label>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
                        <label style="display: flex; flex-direction: column; align-items: center; padding: 16px 12px; border: 2px solid #e8f0ec; border-radius: 12px; cursor: pointer; transition: all 0.2s; text-align: center;" onmouseover="this.style.borderColor='#0f7a4e'" onmouseout="if(!this.querySelector('input').checked)this.style.borderColor='#e8f0ec'">
                            <input type="radio" name="role" value="trader" {{ old('role') === 'trader' ? 'checked' : '' }} style="display: none;" onchange="toggleBusinessField(this)">
                            <i class="fas fa-store" style="font-size: 24px; color: #0f7a4e; margin-bottom: 8px;"></i>
                            <span style="font-size: 13px; font-weight: 600; color: #10201a;">Trader</span>
                            <span style="font-size: 11px; color: #71827b;">Shopkeepers</span>
                        </label>
                        <label style="display: flex; flex-direction: column; align-items: center; padding: 16px 12px; border: 2px solid #e8f0ec; border-radius: 12px; cursor: pointer; transition: all 0.2s; text-align: center;" onmouseover="this.style.borderColor='#0f7a4e'" onmouseout="if(!this.querySelector('input').checked)this.style.borderColor='#e8f0ec'">
                            <input type="radio" name="role" value="corporate" {{ old('role') === 'corporate' ? 'checked' : '' }} style="display: none;" onchange="toggleBusinessField(this)">
                            <i class="fas fa-building" style="font-size: 24px; color: #0f7a4e; margin-bottom: 8px;"></i>
                            <span style="font-size: 13px; font-weight: 600; color: #10201a;">Corporate</span>
                            <span style="font-size: 11px; color: #71827b;">Businesses</span>
                        </label>
                        <label style="display: flex; flex-direction: column; align-items: center; padding: 16px 12px; border: 2px solid #e8f0ec; border-radius: 12px; cursor: pointer; transition: all 0.2s; text-align: center;" onmouseover="this.style.borderColor='#0f7a4e'" onmouseout="if(!this.querySelector('input').checked)this.style.borderColor='#e8f0ec'">
                            <input type="radio" name="role" value="client" {{ old('role', 'client') === 'client' ? 'checked' : '' }} style="display: none;" onchange="toggleBusinessField(this)">
                            <i class="fas fa-user" style="font-size: 24px; color: #0f7a4e; margin-bottom: 8px;"></i>
                            <span style="font-size: 13px; font-weight: 600; color: #10201a;">Individual</span>
                            <span style="font-size: 11px; color: #71827b;">Personal Tax</span>
                        </label>
                    </div>
                </div>

                <div class="form-group" id="businessNameGroup" style="display: {{ in_array(old('role'), ['trader', 'corporate']) ? 'block' : 'none' }};">
                    <label for="business_name">Business Name <span class="optional">(Optional)</span></label>
                    <div class="input-wrapper">
                        <input type="text" id="business_name" name="business_name" value="{{ old('business_name') }}" placeholder="Your business name">
                        <i class="fas fa-store"></i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <div class="input-wrapper">
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
                            <i class="fas fa-user"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number <span class="optional">(Optional)</span></label>
                    <div class="input-wrapper">
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="03xx xxx xxxx">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" placeholder="Min. 8 characters" required oninput="checkPasswordStrength(this.value)">
                            <i class="fas fa-lock"></i>
                            <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength">
                            <div class="bar" id="strengthBar"></div>
                        </div>
                        <div class="password-strength-text" id="strengthText"></div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" required>
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="terms-check">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
                </div>

                <button type="submit" class="submit-btn">
                    Create Account <i class="fas fa-arrow-right"></i>
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

        function toggleBusinessField(radio) {
            const group = document.getElementById('businessNameGroup');
            if (radio.value === 'trader' || radio.value === 'corporate') {
                group.style.display = 'block';
            } else {
                group.style.display = 'none';
            }
        }

        function checkPasswordStrength(password) {
            const bar = document.getElementById('strengthBar');
            const text = document.getElementById('strengthText');
            let strength = 0;

            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password) && /[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength++;

            bar.className = 'bar';
            if (password.length === 0) {
                text.textContent = '';
            } else if (strength <= 1) {
                bar.classList.add('weak');
                text.textContent = 'Weak password';
                text.style.color = '#dc3545';
            } else if (strength === 2) {
                bar.classList.add('medium');
                text.textContent = 'Medium strength';
                text.style.color = '#f0ad4e';
            } else {
                bar.classList.add('strong');
                text.textContent = 'Strong password';
                text.style.color = '#0f7a4e';
            }
        }

        // Highlight selected role card
        document.querySelectorAll('input[name="role"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="role"]').forEach(r => {
                    r.parentElement.style.borderColor = '#e8f0ec';
                    r.parentElement.style.background = 'transparent';
                });
                if (this.checked) {
                    this.parentElement.style.borderColor = '#0f7a4e';
                    this.parentElement.style.background = '#e8f5ee';
                }
            });
            // Initialize on page load
            if (radio.checked) {
                radio.parentElement.style.borderColor = '#0f7a4e';
                radio.parentElement.style.background = '#e8f5ee';
            }
        });
    </script>
</body>
</html>
