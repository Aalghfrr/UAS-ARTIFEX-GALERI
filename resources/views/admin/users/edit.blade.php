<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #333;
        }
        
        .container {
            width: 100%;
            max-width: 800px;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
        }
        
        .header {
            display: flex;
            align-items: center;
            padding: 25px 30px;
            background: linear-gradient(to right, #00b09b, #00d2b5);
            color: white;
            border-radius: 20px 20px 0 0;
            position: relative;
        }
        
        .back-btn {
            position: absolute;
            left: 30px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 1.2rem;
        }
        
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-50%) scale(1.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            width: 100%;
        }
        
        .logo i {
            font-size: 2.5rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 15px;
        }
        
        .logo h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2d3436;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        label i {
            color: #6a11cb;
            width: 20px;
        }
        
        .required:after {
            content: " *";
            color: #ff416c;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #636e72;
            z-index: 2;
        }
        
        input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: white;
            color: #2d3436;
        }
        
        input:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #eaeaea;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        
        .btn-cancel {
            background: linear-gradient(to right, #636e72, #2d3436);
            color: white;
        }
        
        .btn-submit {
            background: linear-gradient(to right, #00b09b, #00d2b5);
            color: white;
        }
        
        .btn-submit:hover {
            background: linear-gradient(to right, #00a896, #00c9b7);
        }
        
        .user-info-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            border-left: 5px solid #6a11cb;
        }
        
        .user-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }
        
        .info-item i {
            color: #6a11cb;
            width: 20px;
        }
        
        .info-label {
            font-weight: 500;
            color: #636e72;
        }
        
        .info-value {
            font-weight: 600;
            color: #2d3436;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .back-btn {
                position: relative;
                left: 0;
                top: 0;
                transform: none;
                align-self: flex-start;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-actions .btn {
                width: 100%;
                justify-content: center;
            }
            
            .user-info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="glass-card">
            <!-- Header -->
            <div class="header">
                <a href="/admin/users" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
                
                <div class="logo">
                    <i class="fas fa-user-edit"></i>
                    <div>
                        <h1>Edit User</h1>
                        <p style="margin-top: 5px; opacity: 0.9; font-size: 0.95rem;">Perbarui informasi pengguna</p>
                    </div>
                </div>
            </div>
            
            <!-- Form -->
            <div class="form-container">
                <!-- User Info Card -->
                <div class="user-info-card">
                    <h3 style="margin-bottom: 15px; color: #2d3436; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-info-circle"></i>
                        Informasi User
                    </h3>
                    <div class="user-info-grid">
                        <div class="info-item">
                            <i class="fas fa-id-card"></i>
                            <span class="info-label">ID User:</span>
                            <span class="info-value">#{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="info-label">Dibuat:</span>
                            <span class="info-value">{{ date('d M Y', strtotime($user->created_at)) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Edit Form -->
                <form method="POST" action="/admin/users/update/{{ $user->id }}" id="editForm">
                    @csrf
                    
                    <div class="form-grid">
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="name" class="required">
                                <i class="fas fa-user"></i>
                                Nama Lengkap
                            </label>
                            <div class="input-group">
                                <i class="fas fa-signature"></i>
                                <input type="text" 
                                       id="name" 
                                       name="name"
                                       value="{{ $user->name }}" 
                                       required
                                       maxlength="100"
                                       placeholder="Masukkan nama lengkap">
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="required">
                                <i class="fas fa-envelope"></i>
                                Email
                            </label>
                            <div class="input-group">
                                <i class="fas fa-at"></i>
                                <input type="email" 
                                       id="email" 
                                       name="email"
                                       value="{{ $user->email }}" 
                                       required
                                       maxlength="100"
                                       placeholder="contoh@email.com">
                            </div>
                        </div>
                        
                        <!-- Password (Opsional) -->
                        <div class="form-group">
                            <label for="password">
                                <i class="fas fa-lock"></i>
                                Password Baru (Opsional)
                            </label>
                            <div class="input-group">
                                <i class="fas fa-key"></i>
                                <input type="password" 
                                       id="password" 
                                       name="password"
                                       placeholder="Kosongkan jika tidak ingin mengubah">
                            </div>
                            <small style="color: #636e72; font-size: 0.85rem; display: block; margin-top: 5px;">
                                <i class="fas fa-info-circle"></i> Isi hanya jika ingin mengganti password
                            </small>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <div>
                            <a href="/admin/users" class="btn btn-cancel">
                                <i class="fas fa-times"></i>
                                Batal
                            </a>
                        </div>
                        
                        <div>
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-save"></i>
                                Update User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Form validation
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            
            if (!name || !email) {
                e.preventDefault();
                alert('Harap isi semua field yang wajib diisi!');
                return false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Format email tidak valid!');
                return false;
            }
            
            // Password confirmation
            const password = document.getElementById('password').value;
            if (password && password.length < 6) {
                e.preventDefault();
                alert('Password minimal 6 karakter!');
                return false;
            }
            
            // Show loading indicator
            const submitBtn = this.querySelector('.btn-submit');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
            
            // Allow form to submit normally after short delay
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 1000);
        });
        
        // Real-time validation for email
        document.getElementById('email').addEventListener('blur', function() {
            const email = this.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (email && !emailRegex.test(email)) {
                this.style.borderColor = '#ff416c';
                this.style.boxShadow = '0 0 0 3px rgba(255, 65, 108, 0.1)';
            } else {
                this.style.borderColor = '#e0e0e0';
                this.style.boxShadow = 'none';
            }
        });
        
        // Clear validation on focus
        document.getElementById('email').addEventListener('focus', function() {
            this.style.borderColor = '#6a11cb';
            this.style.boxShadow = '0 0 0 3px rgba(106, 17, 203, 0.1)';
        });
    </script>
</body>
</html>