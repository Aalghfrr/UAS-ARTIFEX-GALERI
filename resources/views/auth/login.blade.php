<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun - Artifex Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Enhanced Background Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            animation: float 15s infinite linear;
            filter: blur(1px);
        }

        .particle:nth-child(3n) {
            background: rgba(124, 77, 255, 0.3);
            box-shadow: 0 0 15px rgba(124, 77, 255, 0.4);
        }

        .particle:nth-child(3n+1) {
            background: rgba(156, 39, 176, 0.2);
            box-shadow: 0 0 10px rgba(156, 39, 176, 0.3);
        }

        .particle:nth-child(3n+2) {
            background: rgba(33, 150, 243, 0.2);
            box-shadow: 0 0 10px rgba(33, 150, 243, 0.3);
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.8;
            }
            90% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Floating Gradient Orbs */
        .gradient-orbs {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            pointer-events: none;
            opacity: 0.3;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.4;
        }

        .orb-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #7c4dff, transparent);
            top: 10%;
            left: 5%;
            animation: orbFloat 20s infinite alternate ease-in-out;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #5e35b1, transparent);
            bottom: 10%;
            right: 5%;
            animation: orbFloat 25s infinite alternate-reverse ease-in-out;
        }

        @keyframes orbFloat {
            0% {
                transform: translateY(0) translateX(0);
            }
            100% {
                transform: translateY(-30px) translateX(30px);
            }
        }

        /* Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 28px;
            border: 1px solid rgba(124, 77, 255, 0.15);
            width: 100%;
            max-width: 500px;
            padding: 70px 50px 50px;
            text-align: center;
            position: relative;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(124, 77, 255, 0.1),
                inset 0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 30px rgba(255, 255, 255, 0.02);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 1;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, 
                transparent 0%,
                rgba(124, 77, 255, 0.05) 50%,
                transparent 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .login-container:hover::before {
            opacity: 1;
        }

        .login-container:hover {
            transform: translateY(-8px);
            border-color: rgba(124, 77, 255, 0.25);
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(124, 77, 255, 0.15),
                inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        }

        /* Header */
        .header {
            margin-bottom: 50px;
            position: relative;
        }

        .logo-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #7c4dff 0%, #5e35b1 50%, #7c4dff 100%);
            background-size: 200% 200%;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: white;
            font-size: 36px;
            box-shadow: 
                0 20px 40px rgba(124, 77, 255, 0.4),
                inset 0 4px 8px rgba(255, 255, 255, 0.3),
                inset 0 -4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .logo-icon::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg, 
                transparent 30%, 
                rgba(255, 255, 255, 0.1) 50%, 
                transparent 70%
            );
            transform: rotate(45deg);
            animation: shine 6s infinite linear;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        h1 {
            font-size: 38px;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #7c4dff 50%, #fff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% auto;
            animation: textShine 8s infinite linear;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(124, 77, 255, 0.3);
        }

        @keyframes textShine {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }

        .welcome-text {
            color: #aaa;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .welcome-text::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #7c4dff, transparent);
        }

        /* Form Styles */
        .form-container {
            margin-bottom: 40px;
        }

        .input-group {
            position: relative;
            margin-bottom: 30px;
        }

        .input-icon {
            position: absolute;
            left: 22px;
            top: 50%;
            transform: translateY(-50%);
            color: #7c4dff;
            font-size: 20px;
            z-index: 2;
            transition: all 0.3s ease;
            text-shadow: 0 0 10px rgba(124, 77, 255, 0.5);
        }

        .input-field {
            width: 100%;
            padding: 20px 25px 20px 60px;
            background: rgba(255, 255, 255, 0.04);
            border: 2px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            font-size: 16px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            letter-spacing: 0.3px;
        }

        .input-field::placeholder {
            color: #888;
            transition: color 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: #7c4dff;
            background: rgba(124, 77, 255, 0.08);
            box-shadow: 
                0 0 0 4px rgba(124, 77, 255, 0.15),
                inset 0 2px 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .input-field:focus::placeholder {
            color: #aaa;
        }

        .input-field:focus + .input-icon {
            color: #fff;
            transform: translateY(-50%) scale(1.2);
            text-shadow: 0 0 15px rgba(124, 77, 255, 0.8);
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 35px;
            font-size: 15px;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .remember-checkbox:hover {
            color: #fff;
        }

        .remember-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(124, 77, 255, 0.5);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.05);
            cursor: pointer;
            appearance: none;
            position: relative;
            transition: all 0.3s ease;
        }

        .remember-checkbox input[type="checkbox"]:checked {
            background-color: #7c4dff;
            border-color: #7c4dff;
            box-shadow: 0 0 10px rgba(124, 77, 255, 0.5);
        }

        .remember-checkbox input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 22px;
            background: linear-gradient(135deg, #7c4dff 0%, #5e35b1 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 
                0 10px 30px rgba(124, 77, 255, 0.3),
                inset 0 1px 1px rgba(255, 255, 255, 0.2);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.3), 
                transparent);
            transition: 0.6s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-4px);
            box-shadow: 
                0 25px 50px rgba(124, 77, 255, 0.4),
                inset 0 1px 1px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, #8a5eff 0%, #6a3dcc 100%);
        }

        .submit-btn:active {
            transform: translateY(-1px);
            box-shadow: 
                0 15px 30px rgba(124, 77, 255, 0.3),
                inset 0 1px 1px rgba(255, 255, 255, 0.2);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none;
        }

        .submit-btn i {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .submit-btn:hover i {
            transform: translateX(3px);
        }

        /* Register Link */
        .register-link {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 16px;
            color: #888;
        }

        .register-link a {
            color: #7c4dff;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            padding-bottom: 3px;
            display: inline-block;
        }

        .register-link a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #7c4dff, #5e35b1);
            transition: width 0.4s ease;
            border-radius: 1px;
        }

        .register-link a:hover {
            color: #fff;
            text-shadow: 0 0 10px rgba(124, 77, 255, 0.5);
        }

        .register-link a:hover::after {
            width: 100%;
        }

        /* Alert Messages */
        .alert-box {
            padding: 18px 22px;
            border-radius: 14px;
            margin-bottom: 30px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .alert-box.error {
            background: rgba(244, 67, 54, 0.1);
            border: 1px solid rgba(244, 67, 54, 0.2);
            color: #ff8a80;
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.1);
        }

        .alert-box.success {
            background: rgba(76, 175, 80, 0.1);
            border: 1px solid rgba(76, 175, 80, 0.2);
            color: #a5d6a7;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.1);
        }

        .alert-box i {
            font-size: 20px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-15px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            font-size: 13px;
            color: #666;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 22px;
            height: 22px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 60px 40px;
                max-width: 90%;
                margin: 20px;
                border-radius: 25px;
            }
            
            h1 {
                font-size: 34px;
            }
            
            .logo-icon {
                width: 80px;
                height: 80px;
                font-size: 32px;
            }
            
            .input-field {
                padding: 18px 22px 18px 55px;
            }
            
            .submit-btn {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 50px 30px;
                border-radius: 22px;
            }
            
            h1 {
                font-size: 30px;
            }
            
            .logo-icon {
                width: 70px;
                height: 70px;
                font-size: 28px;
            }
            
            .input-field {
                padding: 16px 20px 16px 50px;
                font-size: 15px;
            }
            
            .submit-btn {
                padding: 18px;
                font-size: 16px;
            }
            
            .welcome-text {
                font-size: 14px;
            }
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
            z-index: 3;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .password-toggle:hover {
            color: #7c4dff;
            background: rgba(124, 77, 255, 0.1);
        }

        /* Glow Animation */
        @keyframes glow {
            0%, 100% {
                box-shadow: 
                    0 0 20px rgba(124, 77, 255, 0.5),
                    inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            }
            50% {
                box-shadow: 
                    0 0 40px rgba(124, 77, 255, 0.7),
                    inset 0 0 0 1px rgba(255, 255, 255, 0.08);
            }
        }

        .login-container {
            animation: glow 3s infinite alternate;
        }

        /* Input Validation */
        .input-field.valid {
            border-color: rgba(76, 175, 80, 0.5);
        }

        .input-field.invalid {
            border-color: rgba(244, 67, 54, 0.5);
        }
    </style>
</head>
<body>
    <!-- Gradient Orbs -->
    <div class="gradient-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
    </div>

    <!-- Particles Background -->
    <div class="particles" id="particles"></div>

    <!-- Login Container -->
    <div class="login-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-icon">
                <i class="fas fa-palette"></i>
            </div>
            <h1>Artifex Gallery</h1>
            <p class="welcome-text">Masuk ke ruang kreatif Anda</p>
        </div>

        <!-- Error/Success Messages -->
        @if ($errors->any())
        <div class="alert-box error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif

        @if(session('success'))
        <div class="alert-box success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if(session('error'))
        <div class="alert-box error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        <!-- Login Form -->
        <div class="form-container">
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                
                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input type="email" name="email" class="input-field" placeholder="Alamat Email" required autofocus value="{{ old('email') }}">
                </div>

                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" name="password" class="input-field" placeholder="Kata Sandi" required id="password">
                    <button type="button" class="password-toggle" id="passwordToggle">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                <div class="remember-me">
                    <label class="remember-checkbox">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-sign-in-alt"></i> 
                    <span id="btnText">Masuk Sekarang</span>
                </button>
            </form>
        </div>

        <!-- Register Link -->
        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2024 Artifex Gallery. Platform Seni Digital.
        </div>
    </div>

    <script>
        // Enhanced particles effect
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particlesCount = 60;
            
            // Clear existing particles
            particlesContainer.innerHTML = '';
            
            for (let i = 0; i < particlesCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random properties
                const size = Math.random() * 6 + 2;
                const left = Math.random() * 100;
                const top = Math.random() * 100;
                const duration = Math.random() * 20 + 15;
                const delay = Math.random() * -30;
                const blur = Math.random() * 3 + 1;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${left}%`;
                particle.style.top = `${top}%`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.filter = `blur(${blur}px)`;
                
                // Random color variation
                const colors = [
                    'rgba(124, 77, 255, 0.3)',
                    'rgba(156, 39, 176, 0.2)',
                    'rgba(33, 150, 243, 0.2)'
                ];
                const randomColor = colors[Math.floor(Math.random() * colors.length)];
                particle.style.background = randomColor;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Initialize particles
        createParticles();
        
        // Form submission animation
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        
        loginForm.addEventListener('submit', function(e) {
            // Only show loading if form is valid
            if (this.checkValidity()) {
                btnText.innerHTML = '<span class="spinner"></span> Memproses...';
                submitBtn.disabled = true;
                submitBtn.style.cursor = 'wait';
                
                // Add subtle vibration on mobile
                if ('vibrate' in navigator) {
                    navigator.vibrate(30);
                }
            }
        });
        
        // Password toggle functionality
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');
        
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
            
            // Add animation
            this.style.transform = 'translateY(-50%) scale(1.1)';
            setTimeout(() => {
                this.style.transform = 'translateY(-50%) scale(1)';
            }, 200);
        });
        
        // Enhanced input effects
        const inputFields = document.querySelectorAll('.input-field');
        
        inputFields.forEach(input => {
            const icon = input.previousElementSibling;
            
            input.addEventListener('focus', function() {
                icon.style.color = '#fff';
                icon.style.transform = 'translateY(-50%) scale(1.3)';
                icon.style.textShadow = '0 0 20px rgba(124, 77, 255, 1)';
                this.style.borderColor = '#7c4dff';
            });
            
            input.addEventListener('blur', function() {
                icon.style.color = '#7c4dff';
                icon.style.transform = 'translateY(-50%) scale(1)';
                icon.style.textShadow = '0 0 10px rgba(124, 77, 255, 0.5)';
                this.style.borderColor = 'rgba(255, 255, 255, 0.08)';
                
                // Simple validation
                if (this.value.trim() !== '') {
                    if (this.type === 'email') {
                        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
                        this.classList.toggle('valid', isValid);
                        this.classList.toggle('invalid', !isValid);
                    }
                } else {
                    this.classList.remove('valid', 'invalid');
                }
            });
            
            // Real-time validation for email
            if (input.type === 'email') {
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
                        this.classList.toggle('valid', isValid);
                        this.classList.toggle('invalid', !isValid);
                    } else {
                        this.classList.remove('valid', 'invalid');
                    }
                });
            }
        });
        
        // Smooth card hover effect
        const loginCard = document.querySelector('.login-container');
        let mouseX = 0;
        let mouseY = 0;
        let targetX = 0;
        let targetY = 0;
        
        const updateCardTransform = () => {
            const x = targetX * 5;
            const y = targetY * 5;
            
            loginCard.style.transform = `translateY(-8px) rotateY(${x}deg) rotateX(${y}deg)`;
        };
        
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            mouseY = (e.clientY / window.innerHeight) * 2 - 1;
        });
        
        // Smooth animation loop
        function animate() {
            targetX += (mouseX - targetX) * 0.1;
            targetY += (mouseY - targetY) * 0.1;
            
            updateCardTransform();
            requestAnimationFrame(animate);
        }
        
        animate();
        
        // Page load animation
        document.addEventListener('DOMContentLoaded', () => {
            // Fade in effect
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.8s ease';
                document.body.style.opacity = '1';
            }, 100);
            
            // Animate card entrance
            loginCard.style.transform = 'translateY(50px) scale(0.95)';
            loginCard.style.opacity = '0';
            
            setTimeout(() => {
                loginCard.style.transition = 'transform 0.8s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.8s ease';
                loginCard.style.transform = 'translateY(-8px) scale(1)';
                loginCard.style.opacity = '1';
                
                // Gentle bounce effect
                setTimeout(() => {
                    loginCard.style.transform = 'translateY(-12px) scale(1.01)';
                    setTimeout(() => {
                        loginCard.style.transform = 'translateY(-8px) scale(1)';
                    }, 150);
                }, 800);
            }, 200);
            
            // Animate form elements
            const formElements = document.querySelectorAll('.input-group, .remember-me, .submit-btn, .register-link');
            formElements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 400 + (index * 100));
            });
            
            // Auto-focus email field
            const emailField = document.querySelector('input[name="email"]');
            if (emailField) {
                setTimeout(() => {
                    emailField.focus();
                }, 1000);
            }
        });
        
        // Enhanced checkbox interaction
        const checkbox = document.getElementById('remember');
        const checkboxSpan = checkbox.nextElementSibling;
        
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.style.backgroundColor = '#7c4dff';
                this.style.borderColor = '#7c4dff';
                this.style.boxShadow = '0 0 10px rgba(124, 77, 255, 0.5)';
                
                // Animate checkmark
                checkboxSpan.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    checkboxSpan.style.transform = 'scale(1)';
                }, 200);
            } else {
                this.style.backgroundColor = 'rgba(255, 255, 255, 0.05)';
                this.style.borderColor = 'rgba(124, 77, 255, 0.5)';
                this.style.boxShadow = 'none';
            }
        });
        
        // Initialize checkbox style
        if (checkbox.checked) {
            checkbox.style.backgroundColor = '#7c4dff';
            checkbox.style.borderColor = '#7c4dff';
            checkbox.style.boxShadow = '0 0 10px rgba(124, 77, 255, 0.5)';
        }
        
        // Prevent form resubmission on refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl+Enter or Cmd+Enter to submit form
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                loginForm.requestSubmit();
            }
            
            // Escape to blur active element
            if (e.key === 'Escape') {
                document.activeElement.blur();
            }
        });
        
        // Add ripple effect to submit button
        submitBtn.addEventListener('click', function(e) {
            // Create ripple element
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple 0.6s linear;
                width: ${size}px;
                height: ${size}px;
                top: ${y}px;
                left: ${x}px;
                pointer-events: none;
            `;
            
            // Add ripple animation
            if (!document.querySelector('#ripple-animation')) {
                const style = document.createElement('style');
                style.id = 'ripple-animation';
                style.textContent = `
                    @keyframes ripple {
                        to {
                            transform: scale(4);
                            opacity: 0;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
            
            // Remove existing ripples
            const existingRipples = this.querySelectorAll('span');
            existingRipples.forEach(r => r.remove());
            
            // Add new ripple
            this.appendChild(ripple);
            
            // Remove ripple after animation
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
        
        // Update particles on resize
        window.addEventListener('resize', () => {
            createParticles();
        });
        
        // Add subtle background animation
        let time = 0;
        function updateBackground() {
            time += 0.005;
            const orbs = document.querySelectorAll('.orb');
            
            orbs.forEach((orb, index) => {
                const x = Math.sin(time + index) * 20;
                const y = Math.cos(time + index) * 20;
                orb.style.transform = `translate(${x}px, ${y}px)`;
            });
            
            requestAnimationFrame(updateBackground);
        }
        
        updateBackground();
    </script>
</body>
</html>