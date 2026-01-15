<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Artifex Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* COPY STYLE DARI LOGIN PAGE */
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

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(124, 77, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.5; }
            90% { opacity: 0.5; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }

        .register-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(124, 77, 255, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 50px 40px;
            text-align: center;
            position: relative;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3),
                        0 0 0 1px rgba(124, 77, 255, 0.1),
                        inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .register-container:hover {
            transform: translateY(-5px);
            border-color: rgba(124, 77, 255, 0.3);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.4),
                        0 0 0 1px rgba(124, 77, 255, 0.2),
                        inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        }

        .header {
            margin-bottom: 30px;
            position: relative;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #7c4dff, #5e35b1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 28px;
            box-shadow: 0 15px 30px rgba(124, 77, 255, 0.3),
                        inset 0 2px 4px rgba(255, 255, 255, 0.3);
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 0%, #7c4dff 50%, #fff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: textShine 8s infinite linear;
            margin-bottom: 10px;
        }

        @keyframes textShine {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }

        .welcome-text {
            color: #aaa;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 1px;
        }

        /* FORM STYLES */
        .form-container {
            margin-bottom: 25px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #7c4dff;
            font-size: 16px;
            z-index: 2;
        }

        .input-field, .role-select {
            width: 100%;
            padding: 16px 20px 16px 50px;
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            font-size: 14px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .input-field::placeholder {
            color: #888;
        }

        .input-field:focus, .role-select:focus {
            outline: none;
            border-color: #7c4dff;
            background: rgba(124, 77, 255, 0.05);
            box-shadow: 0 0 0 4px rgba(124, 77, 255, 0.1);
        }

        /* ROLE SELECT STYLING */
        .role-select {
            appearance: none;
            cursor: pointer;
            padding-right: 50px;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #7c4dff;
            pointer-events: none;
            font-size: 14px;
        }

        .role-hint {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
            margin-bottom: 15px;
            text-align: left;
            padding-left: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .role-hint i {
            color: #7c4dff;
            font-size: 12px;
        }

        /* SUBMIT BUTTON */
        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #7c4dff 0%, #5e35b1 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(124, 77, 255, 0.3);
        }

        /* ALERT BOX */
        .alert-box {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease;
        }

        .alert-box.error {
            background: rgba(244, 67, 54, 0.1);
            border: 1px solid rgba(244, 67, 54, 0.3);
            color: #ff8a80;
        }

        .alert-box.success {
            background: rgba(76, 175, 80, 0.1);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #a5d6a7;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* LOGIN LINK */
        .login-link {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #888;
        }

        .login-link a {
            color: #7c4dff;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #fff;
            text-decoration: underline;
        }

        /* FOOTER */
        .footer {
            margin-top: 20px;
            font-size: 11px;
            color: #666;
            letter-spacing: 0.5px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .register-container {
                padding: 40px 30px;
                max-width: 90%;
            }
            
            h1 { font-size: 28px; }
            .logo-icon {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 30px 20px;
            }
            
            h1 { font-size: 24px; }
            .input-field, .role-select {
                padding: 14px 20px 14px 45px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <!-- Particles Background -->
    <div class="particles" id="particles"></div>

    <!-- Register Container -->
    <div class="register-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-icon">
                <i class="fas fa-palette"></i>
            </div>
            <h1>Artifex Gallery</h1>
            <p class="welcome-text">Buat akun baru Anda</p>
        </div>

        <!-- Error/Success Messages -->
        @if ($errors->any())
        <div class="alert-box error">
            <i class="fas fa-exclamation-circle"></i>
            {{ $errors->first() }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert-box success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
        @endif

        <!-- Register Form -->
        <div class="form-container">
            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                
                <!-- Name Field -->
                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" name="name" class="input-field" placeholder="Nama Lengkap" required autofocus value="{{ old('name') }}">
                </div>

                <!-- Email Field -->
                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input type="email" name="email" class="input-field" placeholder="Alamat Email" required value="{{ old('email') }}">
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" name="password" class="input-field" placeholder="Kata Sandi (min. 6 karakter)" required>
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" name="password_confirmation" class="input-field" placeholder="Konfirmasi Kata Sandi" required>
                </div>

                <!-- Role Selection (HARUS ADA INI!) -->
                <div class="input-group">
                    <div class="input-icon">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <div class="select-wrapper">
                        <select name="role" class="role-select" required>
                            <option value="">Pilih Peran Akun</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Pengguna (Pembeli Karya)</option>
                            <option value="artist" {{ old('role') == 'artist' ? 'selected' : '' }}>Seniman (Penjual Karya)</option>
                        </select>
                    </div>
                </div>

                <!-- Role Hint -->
                <div class="role-hint">
                    <i class="fas fa-info-circle"></i>
                    Pilih "Seniman" jika ingin mengupload dan menjual karya seni
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <i class="fas fa-user-plus"></i> 
                    <span id="btnText">Daftar Sekarang</span>
                </button>
            </form>
        </div>

        <!-- Login Link -->
        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2024 Artifex Gallery. Platform Seni Digital.
        </div>
    </div>

    <script>
        // Create particles effect
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particlesCount = 40;
            
            for (let i = 0; i < particlesCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 4 + 2;
                const left = Math.random() * 100;
                const duration = Math.random() * 20 + 15;
                const delay = Math.random() * -20;
                const opacity = Math.random() * 0.3 + 0.1;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${left}%`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.opacity = opacity;
                particle.style.background = `rgba(124, 77, 255, ${opacity})`;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Initialize particles
        createParticles();
        
        // Form submission animation
        const registerForm = document.getElementById('registerForm');
        const submitBtn = registerForm.querySelector('.submit-btn');
        const btnText = document.getElementById('btnText');
        
        registerForm.addEventListener('submit', function(e) {
            if (this.checkValidity()) {
                btnText.innerHTML = '<span class="spinner"></span> Membuat Akun...';
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.8';
                
                // Add spinner style
                const style = document.createElement('style');
                style.innerHTML = `
                    .spinner {
                        display: inline-block;
                        width: 16px;
                        height: 16px;
                        border: 2px solid rgba(255,255,255,.3);
                        border-radius: 50%;
                        border-top-color: #fff;
                        animation: spin 1s ease-in-out infinite;
                    }
                    @keyframes spin {
                        to { transform: rotate(360deg); }
                    }
                `;
                document.head.appendChild(style);
            }
        });
        
        // Page load animation
        document.addEventListener('DOMContentLoaded', () => {
            // Fade in effect
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.8s ease';
                document.body.style.opacity = '1';
            }, 100);
            
            // Animate card entrance
            const registerCard = document.querySelector('.register-container');
            registerCard.style.transform = 'translateY(50px) scale(0.95)';
            registerCard.style.opacity = '0';
            
            setTimeout(() => {
                registerCard.style.transition = 'transform 0.8s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.8s ease';
                registerCard.style.transform = 'translateY(0) scale(1)';
                registerCard.style.opacity = '1';
            }, 200);
            
            // Auto-focus name field
            const nameField = document.querySelector('input[name="name"]');
            if (nameField) {
                setTimeout(() => {
                    nameField.focus();
                }, 600);
            }
        });
        
        // Prevent form resubmission on refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>