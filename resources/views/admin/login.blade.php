<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Login Admin - Artifex Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary: #6a11cb;
            --secondary: #2575fc;
            --success: #00b09b;
            --danger: #ff416c;
            --dark: #2d3436;
            --light: #f8f9fa;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        /* Floating Particles Background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
            background: white;
            animation: float 15s infinite linear;
        }
        
        /* Container */
        .container {
            width: 100%;
            max-width: 450px;
            animation: slideUp 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            position: relative;
        }
        
        /* Header */
        .header {
            padding: 40px 40px 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        
        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 20px rgba(106, 17, 203, 0.4);
            animation: pulse 2s infinite;
        }
        
        .logo-text h1 {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .logo-text p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }
        
        /* Form */
        .form-container {
            padding: 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.2rem;
            z-index: 2;
            transition: all 0.3s;
        }
        
        input {
            width: 100%;
            padding: 18px 20px 18px 55px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            font-size: 1rem;
            color: white;
            transition: all 0.3s;
            outline: none;
        }
        
        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        input:focus {
            border-color: white;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }
        
        input:focus + .input-icon {
            color: white;
            transform: translateY(-50%) scale(1.1);
        }
        
        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s;
        }
        
        .password-toggle:hover {
            color: white;
        }
        
        /* Remember Me */
        .remember-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .checkbox-container input {
            width: auto;
            margin: 0;
            accent-color: var(--primary);
        }
        
        .checkbox-container label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .forgot-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .forgot-link:hover {
            color: white;
            text-decoration: underline;
        }
        
        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(106, 17, 203, 0.3);
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(106, 17, 203, 0.4);
        }
        
        .submit-btn:active {
            transform: translateY(-1px);
        }
        
        /* Error Message */
        .error-message {
            background: rgba(255, 65, 108, 0.2);
            border-left: 4px solid var(--danger);
            color: #ffcccc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.5s ease-in-out;
        }
        
        .error-message i {
            font-size: 1.2rem;
        }
        
        /* Footer */
        .footer {
            padding: 25px 40px;
            text-align: center;
            background: rgba(0, 0, 0, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        
        .footer a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        /* Loading Spinner */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: white;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 1001;
            transform: translateX(150%);
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        .toast.show {
            transform: translateX(0);
        }
        
        .toast-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }
        
        .toast-error .toast-icon {
            background: var(--danger);
        }
        
        /* Animations */
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, 10px) rotate(90deg); }
            50% { transform: translate(0, 20px) rotate(180deg); }
            75% { transform: translate(-10px, 10px) rotate(270deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 10px 20px rgba(106, 17, 203, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 15px 30px rgba(106, 17, 203, 0.6); }
            100% { transform: scale(1); box-shadow: 0 10px 20px rgba(106, 17, 203, 0.4); }
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .container {
                max-width: 100%;
            }
            
            .header, .form-container, .footer {
                padding: 30px 20px;
            }
            
            .logo-text h1 {
                font-size: 1.5rem;
            }
        }
        
        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            font-size: 1.3rem;
            z-index: 100;
            transition: all 0.3s;
        }
        
        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(30deg);
        }
    </style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>
    
    <!-- Theme Toggle -->
    <div class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon"></i>
    </div>
    
    <!-- Loading Spinner -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toast" class="toast toast-error">
        <div class="toast-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title"></div>
            <div class="toast-message"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="glass-card">
            <!-- Header -->
            <div class="header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div class="logo-text">
                        <h1>Artifex Gallery</h1>
                        <p>Admin Management System</p>
                    </div>
                </div>
            </div>
            
            <!-- Form -->
            <div class="form-container">
                @if(session('error'))
                <div class="error-message" id="errorMessage">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>{{ session('error') }}</div>
                </div>
                @endif
                
                <form method="POST" action="/admin/login" id="loginForm">
                    @csrf
                    
                    <div class="form-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" 
                               name="username" 
                               id="username"
                               placeholder="Username"
                               required
                               autocomplete="username">
                    </div>
                    
                    <div class="form-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               name="password" 
                               id="password"
                               placeholder="Password"
                               required
                               autocomplete="current-password">
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    
                    <div class="remember-group">
                        <div class="checkbox-container">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-link" id="forgotPassword">
                            Lupa password?
                        </a>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-sign-in-alt"></i>
                        Login ke Dashboard
                    </button>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p>© 2024 Artifex Gallery. Hak cipta dilindungi undang-undang.</p>
                <p>Versi 2.1.0 | <a href="#" id="helpLink">Butuh bantuan?</a></p>
            </div>
        </div>
    </div>
    
    <script>
        // Initialize particles
        function initParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random size (10-50px)
                const size = Math.random() * 40 + 10;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random color gradient
                const colors = [
                    'linear-gradient(45deg, #6a11cb, #2575fc)',
                    'linear-gradient(45deg, #00b09b, #96c93d)',
                    'linear-gradient(45deg, #ff416c, #ff4b2b)',
                    'linear-gradient(45deg, #36d1dc, #5b86e5)',
                    'linear-gradient(45deg, #f46b45, #eea849)'
                ];
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                
                // Random animation delay
                particle.style.animationDelay = `${Math.random() * 15}s`;
                
                // Random animation duration
                particle.style.animationDuration = `${Math.random() * 10 + 10}s`;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Password toggle functionality
        document.getElementById('passwordToggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.className = 'fas fa-eye-slash';
                this.title = 'Sembunyikan password';
            } else {
                passwordInput.type = 'password';
                icon.className = 'fas fa-eye';
                this.title = 'Tampilkan password';
            }
        });
        
        // Form submission with loading
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            
            // Basic validation
            if (!username || !password) {
                e.preventDefault();
                showToast('Form Tidak Lengkap', 'Harap isi username dan password.', 'error');
                return;
            }
            
            // Show loading spinner
            showLoading();
            
            // Simulate loading for demo (remove in production)
            setTimeout(() => {
                hideLoading();
            }, 2000);
        });
        
        // Theme toggle
        document.getElementById('themeToggle').addEventListener('click', function() {
            const icon = this.querySelector('i');
            const body = document.body;
            
            if (icon.classList.contains('fa-moon')) {
                // Switch to dark mode
                body.style.background = 'linear-gradient(135deg, #232526 0%, #414345 100%)';
                icon.className = 'fas fa-sun';
                showToast('Mode Gelap', 'Mode gelap diaktifkan.', 'info');
            } else {
                // Switch to light mode
                body.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                icon.className = 'fas fa-moon';
                showToast('Mode Terang', 'Mode terang diaktifkan.', 'info');
            }
        });
        
        // Forgot password modal
        document.getElementById('forgotPassword').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Create modal
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.7);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 2000;
                animation: fadeIn 0.3s ease-out;
            `;
            
            modal.innerHTML = `
                <div style="
                    background: rgba(255,255,255,0.95);
                    border-radius: 15px;
                    padding: 30px;
                    max-width: 400px;
                    width: 90%;
                    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
                    animation: slideUp 0.4s ease-out;
                ">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 style="color: #2d3436; margin: 0;">Reset Password</h3>
                        <button id="closeModal" style="background: none; border: none; font-size: 1.5rem; color: #666; cursor: pointer;">&times;</button>
                    </div>
                    <p style="color: #666; margin-bottom: 20px; line-height: 1.5;">
                        Masukkan email Anda untuk menerima link reset password.
                    </p>
                    <input type="email" placeholder="Email Anda" style="
                        width: 100%;
                        padding: 12px 15px;
                        border: 2px solid #ddd;
                        border-radius: 8px;
                        font-size: 1rem;
                        margin-bottom: 20px;
                        outline: none;
                        transition: border-color 0.3s;
                    " id="resetEmail">
                    <div style="display: flex; gap: 10px;">
                        <button id="cancelReset" style="
                            flex: 1;
                            padding: 12px;
                            background: #666;
                            color: white;
                            border: none;
                            border-radius: 8px;
                            cursor: pointer;
                            font-weight: 600;
                            transition: all 0.3s;
                        ">Batal</button>
                        <button id="submitReset" style="
                            flex: 1;
                            padding: 12px;
                            background: linear-gradient(to right, #6a11cb, #2575fc);
                            color: white;
                            border: none;
                            border-radius: 8px;
                            cursor: pointer;
                            font-weight: 600;
                            transition: all 0.3s;
                        ">Kirim Link</button>
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Close modal handlers
            modal.querySelector('#closeModal').addEventListener('click', () => modal.remove());
            modal.querySelector('#cancelReset').addEventListener('click', () => modal.remove());
            
            // Submit reset handler
            modal.querySelector('#submitReset').addEventListener('click', () => {
                const email = modal.querySelector('#resetEmail').value;
                if (!email) {
                    showToast('Email Kosong', 'Harap masukkan email Anda.', 'error');
                    return;
                }
                
                // Simulate sending reset link
                showToast('Link Terkirim', `Link reset password telah dikirim ke ${email}.`, 'success');
                modal.remove();
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        });
        
        // Help link
        document.getElementById('helpLink').addEventListener('click', function(e) {
            e.preventDefault();
            showToast('Bantuan', 'Hubungi admin di: admin@artifex-gallery.com', 'info');
        });
        
        // Auto-focus username input
        document.getElementById('username').focus();
        
        // Show error message animation
        const errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.animation = 'shake 0.5s ease-in-out';
                setTimeout(() => {
                    errorMessage.style.animation = '';
                }, 500);
            }, 500);
        }
        
        // Helper functions
        function showLoading() {
            document.getElementById('loading').style.display = 'flex';
        }
        
        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }
        
        function showToast(title, message, type = 'error') {
            const toast = document.getElementById('toast');
            const toastIcon = toast.querySelector('.toast-icon i');
            const toastTitle = toast.querySelector('.toast-title');
            const toastMessage = toast.querySelector('.toast-message');
            
            // Set toast content
            toastTitle.textContent = title;
            toastMessage.textContent = message;
            
            // Set toast type
            toast.className = `toast toast-${type}`;
            
            if (type === 'success') {
                toastIcon.className = 'fas fa-check-circle';
                toastIcon.parentElement.style.background = 'var(--success)';
            } else if (type === 'info') {
                toastIcon.className = 'fas fa-info-circle';
                toastIcon.parentElement.style.background = 'var(--secondary)';
            } else {
                toastIcon.className = 'fas fa-exclamation-triangle';
                toastIcon.parentElement.style.background = 'var(--danger)';
            }
            
            // Show toast
            toast.classList.add('show');
            
            // Hide toast after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initParticles();
            
            // Add some demo particles movement
            setInterval(() => {
                const particles = document.querySelectorAll('.particle');
                particles.forEach(particle => {
                    const randomX = Math.random() * 10 - 5;
                    const randomY = Math.random() * 10 - 5;
                    particle.style.transform = `translate(${randomX}px, ${randomY}px)`;
                });
            }, 1000);
            
            // Welcome animation
            setTimeout(() => {
                const container = document.querySelector('.container');
                container.style.animation = 'slideUp 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
            }, 100);
        });
        
        // Add hover effect to form inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + / to focus username
            if (e.ctrlKey && e.key === '/') {
                e.preventDefault();
                document.getElementById('username').focus();
            }
            
            // Esc to clear form
            if (e.key === 'Escape') {
                document.getElementById('loginForm').reset();
            }
            
            // Enter to submit (already default)
            if (e.key === 'Enter' && (e.target.id === 'username' || e.target.id === 'password')) {
                // Allow default behavior
            }
        });
    </script>
</body>
</html>