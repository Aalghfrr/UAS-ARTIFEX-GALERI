<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Tambah Artwork - Art Gallery Admin</title>
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
            --warning: #ff9a00;
            --danger: #ff416c;
            --dark: #2d3436;
            --light: #f8f9fa;
            --gray: #636e72;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--dark);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            background: white;
            animation: float 20s infinite linear;
        }
        
        .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
            background: linear-gradient(45deg, var(--success), var(--warning));
            animation-delay: 5s;
        }
        
        .shape:nth-child(3) {
            width: 150px;
            height: 150px;
            top: 20%;
            left: 10%;
            background: linear-gradient(45deg, var(--danger), #ff4b2b);
            animation-delay: 10s;
        }
        
        .shape:nth-child(4) {
            width: 180px;
            height: 180px;
            bottom: 30%;
            right: 15%;
            background: linear-gradient(45deg, #36d1dc, #5b86e5);
            animation-delay: 15s;
        }
        
        .container {
            width: 100%;
            max-width: 1000px;
            animation: fadeIn 0.8s ease-out;
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
            background: linear-gradient(to right, var(--success), #00d2b5);
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
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group.full-width {
            grid-column: span 2;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        label i {
            color: var(--primary);
            width: 20px;
        }
        
        .required:after {
            content: " *";
            color: var(--danger);
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            z-index: 2;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: white;
            color: var(--dark);
        }
        
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        textarea {
            min-height: 150px;
            resize: vertical;
            padding: 15px;
        }
        
        .price-input {
            position: relative;
        }
        
        .currency {
            position: absolute;
            left: 45px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 600;
            color: var(--gray);
            z-index: 2;
        }
        
        .price-input input {
            padding-left: 80px;
        }
        
        .input-with-button {
            display: flex;
            gap: 10px;
        }
        
        .input-with-button input {
            flex: 1;
        }
        
        .generate-btn {
            background: linear-gradient(to right, var(--warning), #ff9a00);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0 20px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .generate-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 154, 0, 0.3);
        }
        
        .image-upload {
            border: 2px dashed #e0e0e0;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #f8f9fa;
        }
        
        .image-upload:hover {
            border-color: var(--primary);
            background: #f0f2ff;
            transform: translateY(-2px);
        }
        
        .image-upload.dragover {
            border-color: var(--success);
            background: #e8f5e9;
            transform: scale(1.02);
        }
        
        .image-upload i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .image-preview {
            margin-top: 20px;
            display: none;
        }
        
        .preview-image {
            max-width: 100%;
            max-height: 250px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
            background: linear-gradient(to right, var(--success), #00d2b5);
            color: white;
        }
        
        .btn-submit:hover {
            background: linear-gradient(to right, #00a896, #00c9b7);
        }
        
        .btn-reset {
            background: linear-gradient(to right, var(--warning), #ff9a00);
            color: white;
        }
        
        .character-count {
            text-align: right;
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 5px;
        }
        
        .character-count.warning {
            color: var(--warning);
        }
        
        .character-count.error {
            color: var(--danger);
        }
        
        /* Switch Toggle */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background: linear-gradient(to right, var(--success), #00d2b5);
        }
        
        input:checked + .slider:before {
            transform: translateX(30px);
        }
        
        /* Alert Message */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideDown 0.5s ease-out;
        }
        
        .alert-info {
            background: #e3f2fd;
            color: #1565c0;
            border-left: 5px solid #1565c0;
        }
        
        .alert-warning {
            background: #fff3e0;
            color: #e65100;
            border-left: 5px solid #e65100;
        }
        
        .alert i {
            font-size: 1.5rem;
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
        
        .toast-success .toast-icon {
            background: var(--success);
        }
        
        .toast-error .toast-icon {
            background: var(--danger);
        }
        
        /* Progress Bar */
        .progress-container {
            width: 100%;
            background-color: #f0f0f0;
            border-radius: 10px;
            margin-top: 10px;
            overflow: hidden;
            display: none;
        }
        
        .progress-bar {
            height: 10px;
            background: linear-gradient(to right, var(--success), #00d2b5);
            width: 0%;
            border-radius: 10px;
            transition: width 0.3s ease;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, 10px) rotate(90deg); }
            50% { transform: translate(0, 20px) rotate(180deg); }
            75% { transform: translate(-10px, 10px) rotate(270deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-group.full-width {
                grid-column: span 1;
            }
            
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
        }
        
        /* Dark Mode */
        body.dark-mode {
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
            color: #f5f5f5;
        }
        
        body.dark-mode .glass-card {
            background: rgba(30, 30, 40, 0.95);
            color: #f5f5f5;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        body.dark-mode input,
        body.dark-mode textarea,
        body.dark-mode select {
            background: rgba(50, 50, 60, 0.9);
            border-color: rgba(255, 255, 255, 0.1);
            color: #f5f5f5;
        }
        
        body.dark-mode .image-upload {
            background: rgba(50, 50, 60, 0.9);
            border-color: rgba(255, 255, 255, 0.1);
        }
        
        body.dark-mode label {
            color: #f5f5f5;
        }
        
        body.dark-mode .alert-info {
            background: rgba(30, 60, 90, 0.8);
            color: #90caf9;
        }
        
        body.dark-mode .alert-warning {
            background: rgba(90, 60, 30, 0.8);
            color: #ffcc80;
        }
    </style>
</head>
<body>
    <!-- Floating background shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="container">
        <div class="glass-card">
            <!-- Header -->
            <div class="header">
                <a href="/admin/artworks" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
                
                <div class="logo">
                    <i class="fas fa-plus-circle"></i>
                    <div>
                        <h1>Tambah Artwork Baru</h1>
                        <p style="margin-top: 5px; opacity: 0.9; font-size: 0.95rem;">Isi form berikut untuk menambahkan artwork ke galeri</p>
                    </div>
                </div>
            </div>
            
            <!-- Form -->
            <div class="form-container">
                @if(session('success'))
                <div class="alert alert-info">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('success') }}</div>
                </div>
                @endif
                
                @if($errors->any())
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Perhatian!</strong> Mohon perbaiki kesalahan berikut:
                        <ul style="margin-top: 5px; margin-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                
                <form method="POST" action="/admin/artworks/store" id="createForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-grid">
                        <!-- Judul Artwork -->
                        <div class="form-group full-width">
                            <label for="title" class="required">
                                <i class="fas fa-heading"></i>
                                Judul Artwork
                            </label>
                            <div class="input-group">
                                <i class="fas fa-signature"></i>
                                <input type="text" 
                                       id="title" 
                                       name="title"
                                       value="{{ old('title') }}" 
                                       required
                                       maxlength="200"
                                       placeholder="Masukkan judul artwork yang menarik">
                            </div>
                            <div class="character-count" id="titleCount">0/200 karakter</div>
                        </div>
                        
                        <!-- Nama Seniman -->
                        <div class="form-group">
                            <label for="artist_name" class="required">
                                <i class="fas fa-user"></i>
                                Nama Seniman
                            </label>
                            <div class="input-group">
                                <i class="fas fa-palette"></i>
                                <input type="text" 
                                       id="artist_name" 
                                       name="artist_name"
                                       value="{{ old('artist_name') }}" 
                                       required
                                       maxlength="100"
                                       placeholder="Nama lengkap seniman">
                            </div>
                            <div class="character-count" id="artistCount">0/100 karakter</div>
                        </div>
                        
                        <!-- Harga -->
                        <div class="form-group">
                            <label for="price" class="required">
                                <i class="fas fa-tag"></i>
                                Harga
                            </label>
                            <div class="price-input">
                                <div class="currency">Rp</div>
                                <div class="input-group">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <input type="number" 
                                           id="price" 
                                           name="price"
                                           value="{{ old('price') }}" 
                                           required
                                           min="1000"
                                           max="1000000000" <!-- PERUBAHAN: dari 10000000000 menjadi 1000000000 -->
                                           step="1000"
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="character-count" id="priceDisplay">Rp 0</div>
                        </div>
                        
                        <!-- Kategori -->
                        <div class="form-group">
                            <label for="category" class="required">
                                <i class="fas fa-layer-group"></i>
                                Kategori
                            </label>
                            <div class="input-group">
                                <i class="fas fa-folder"></i>
                                <select id="category" name="category" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Lukisan" {{ old('category') == 'Lukisan' ? 'selected' : '' }}>Lukisan</option>
                                    <option value="Patung" {{ old('category') == 'Patung' ? 'selected' : '' }}>Patung</option>
                                    <option value="Fotografi" {{ old('category') == 'Fotografi' ? 'selected' : '' }}>Fotografi</option>
                                    <option value="Digital Art" {{ old('category') == 'Digital Art' ? 'selected' : '' }}>Digital Art</option>
                                    <option value="Sketsa" {{ old('category') == 'Sketsa' ? 'selected' : '' }}>Sketsa</option>
                                    <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Tahun Pembuatan -->
                        <div class="form-group">
                            <label for="year" class="required">
                                <i class="fas fa-calendar-alt"></i>
                                Tahun Pembuatan
                            </label>
                            <div class="input-group">
                                <i class="fas fa-calendar"></i>
                                <input type="number" 
                                       id="year" 
                                       name="year"
                                       value="{{ old('year', date('Y')) }}" 
                                       required
                                       min="1900"
                                       max="{{ date('Y') + 5 }}"
                                       placeholder="{{ date('Y') }}">
                            </div>
                        </div>
                        
                        <!-- Ukuran -->
                        <div class="form-group">
                            <label>
                                <i class="fas fa-ruler-combined"></i>
                                Ukuran (opsional)
                            </label>
                            <div class="input-with-button">
                                <div class="input-group">
                                    <i class="fas fa-expand"></i>
                                    <input type="text" 
                                           name="dimensions"
                                           value="{{ old('dimensions') }}"
                                           placeholder="Contoh: 50x70 cm">
                                </div>
                                <button type="button" class="generate-btn" id="autoSize">
                                    <i class="fas fa-magic"></i> Auto
                                </button>
                            </div>
                        </div>
                        
                        <!-- Media/Canvas -->
                        <div class="form-group">
                            <label for="medium" class="required">
                                <i class="fas fa-paint-roller"></i>
                                Media/Canvas
                            </label>
                            <div class="input-group">
                                <i class="fas fa-fill-drip"></i>
                                <input type="text" 
                                       id="medium" 
                                       name="medium"
                                       value="{{ old('medium') }}"
                                       required
                                       placeholder="Contoh: Oil on Canvas, Watercolor">
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="form-group">
                            <label>
                                <i class="fas fa-eye"></i>
                                Status Tampil
                            </label>
                            <div style="display: flex; align-items: center; gap: 15px; margin-top: 10px;">
                                <label class="switch">
                                    <input type="checkbox" 
                                           name="is_published" 
                                           value="1"
                                           checked>
                                    <span class="slider"></span>
                                </label>
                                <span id="statusText">Dipublikasikan</span>
                            </div>
                        </div>
                        
                        <!-- Upload Gambar -->
                        <div class="form-group full-width">
                            <label>
                                <i class="fas fa-image"></i>
                                Gambar Artwork (opsional)
                            </label>
                            <div class="image-upload" id="imageUpload">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Klik atau drop gambar di sini</p>
                                <p style="font-size: 0.9rem; color: var(--gray); margin-top: 5px;">
                                    Format: JPG, PNG, GIF. Maks: 5MB
                                </p>
                                <input type="file" 
                                       id="image"
                                       name="image"
                                       accept="image/*"
                                       style="display: none;">
                            </div>
                            <div class="progress-container" id="progressContainer">
                                <div class="progress-bar" id="progressBar"></div>
                            </div>
                            <div class="image-preview" id="imagePreview">
                                <img src="#" alt="Preview" class="preview-image" id="previewImage">
                                <div style="margin-top: 10px;">
                                    <button type="button" class="btn btn-reset" id="removeImage" style="padding: 8px 15px;">
                                        <i class="fas fa-trash"></i> Hapus Gambar
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Deskripsi -->
                        <div class="form-group full-width">
                            <label for="description" class="required">
                                <i class="fas fa-align-left"></i>
                                Deskripsi
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      maxlength="2000"
                                      placeholder="Jelaskan tentang artwork ini, inspirasi, teknik yang digunakan, makna, dll.">{{ old('description') }}</textarea>
                            <div class="character-count" id="descriptionCount">0/2000 karakter</div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <div>
                            <a href="/admin/artworks" class="btn btn-cancel">
                                <i class="fas fa-times"></i>
                                Batal
                            </a>
                        </div>
                        
                        <div style="display: flex; gap: 15px;">
                            <button type="button" class="btn btn-reset" id="resetBtn">
                                <i class="fas fa-redo"></i>
                                Reset Form
                            </button>
                            
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-plus-circle"></i>
                                Tambah Artwork
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toast" class="toast">
        <div class="toast-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title"></div>
            <div class="toast-message"></div>
        </div>
    </div>
    
    <script>
        // Initialize character counters
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial character counts
            updateCharacterCount('artist_name', 'artistCount', 100);
            updateCharacterCount('title', 'titleCount', 200);
            updateCharacterCount('description', 'descriptionCount', 2000);
            updatePriceDisplay();
            
            // Character count listeners
            document.getElementById('artist_name').addEventListener('input', function() {
                updateCharacterCount('artist_name', 'artistCount', 100);
            });
            
            document.getElementById('title').addEventListener('input', function() {
                updateCharacterCount('title', 'titleCount', 200);
            });
            
            document.getElementById('description').addEventListener('input', function() {
                updateCharacterCount('description', 'descriptionCount', 2000);
            });
            
            // Price formatting
            document.getElementById('price').addEventListener('input', updatePriceDisplay);
            
            // Status toggle
            document.querySelector('input[name="is_published"]').addEventListener('change', function() {
                document.getElementById('statusText').textContent = 
                    this.checked ? 'Dipublikasikan' : 'Disembunyikan';
            });
            
            // Auto size button
            document.getElementById('autoSize').addEventListener('click', function() {
                const sizes = [
                    '30x40 cm', '40x50 cm', '50x70 cm', '60x80 cm', 
                    '70x100 cm', '80x120 cm', '100x150 cm', '120x180 cm'
                ];
                const randomSize = sizes[Math.floor(Math.random() * sizes.length)];
                document.querySelector('input[name="dimensions"]').value = randomSize;
                
                showToast('Ukuran Otomatis', `Ukuran ${randomSize} telah dipilih.`, 'success');
            });
            
            // Image upload functionality
            const imageUpload = document.getElementById('imageUpload');
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const removeImageBtn = document.getElementById('removeImage');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            
            imageUpload.addEventListener('click', () => imageInput.click());
            
            imageUpload.addEventListener('dragover', (e) => {
                e.preventDefault();
                imageUpload.classList.add('dragover');
            });
            
            imageUpload.addEventListener('dragleave', () => {
                imageUpload.classList.remove('dragover');
            });
            
            imageUpload.addEventListener('drop', (e) => {
                e.preventDefault();
                imageUpload.classList.remove('dragover');
                
                if (e.dataTransfer.files.length) {
                    imageInput.files = e.dataTransfer.files;
                    previewImageFile(e.dataTransfer.files[0]);
                }
            });
            
            imageInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    previewImageFile(this.files[0]);
                }
            });
            
            removeImageBtn.addEventListener('click', function() {
                imageInput.value = '';
                imagePreview.style.display = 'none';
                previewImage.src = '#';
                showToast('Gambar Dihapus', 'Gambar telah dihapus dari form.', 'success');
            });
            
            // Reset form button
            document.getElementById('resetBtn').addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin mengosongkan semua field?')) {
                    document.getElementById('createForm').reset();
                    updateCharacterCount('artist_name', 'artistCount', 100);
                    updateCharacterCount('title', 'titleCount', 200);
                    updateCharacterCount('description', 'descriptionCount', 2000);
                    updatePriceDisplay();
                    imagePreview.style.display = 'none';
                    previewImage.src = '#';
                    showToast('Form Direset', 'Semua field telah dikosongkan.', 'success');
                }
            });
            
            // Form validation and submission
            document.getElementById('createForm').addEventListener('submit', function(e) {
                const title = document.getElementById('title').value.trim();
                const artistName = document.getElementById('artist_name').value.trim();
                const price = document.getElementById('price').value;
                const category = document.getElementById('category').value;
                const medium = document.getElementById('medium').value.trim();
                const year = document.getElementById('year').value;
                const description = document.getElementById('description').value.trim();
                
                // Validate required fields
                if (!title || !artistName || !price || !category || !medium || !year || !description) {
                    e.preventDefault();
                    showToast('Form Tidak Lengkap', 'Harap isi semua field yang wajib diisi.', 'error');
                    return;
                }
                
                if (price < 1000) {
                    e.preventDefault();
                    showToast('Harga Tidak Valid', 'Harga minimal adalah Rp 1.000.', 'error');
                    return;
                }
                
                if (price > 1000000000) { // PERUBAHAN: dari > 10000000000 menjadi > 1000000000
                    e.preventDefault();
                    showToast('Harga Melebihi Batas', 'Harga maksimal adalah Rp 1.000.000.000.', 'error');
                    return;
                }
                
                if (year < 1900 || year > new Date().getFullYear() + 5) {
                    e.preventDefault();
                    showToast('Tahun Tidak Valid', 'Tahun harus antara 1900 dan ' + (new Date().getFullYear() + 5), 'error');
                    return;
                }
                
                // Show saving indicator
                const submitBtn = this.querySelector('.btn-submit');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;
                
                // Show progress bar for image upload
                if (imageInput.files.length > 0) {
                    progressContainer.style.display = 'block';
                    progressBar.style.width = '50%';
                    
                    // Simulate upload progress
                    let progress = 50;
                    const progressInterval = setInterval(() => {
                        progress += Math.random() * 10;
                        if (progress > 100) {
                            progress = 100;
                            clearInterval(progressInterval);
                        }
                        progressBar.style.width = progress + '%';
                    }, 200);
                }
                
                // Allow form to submit normally
                // The timeout is just for visual feedback
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    if (progressContainer) {
                        progressContainer.style.display = 'none';
                        progressBar.style.width = '0%';
                    }
                }, 2000);
            });
            
            // Auto-generate some sample data for testing
            document.getElementById('title').addEventListener('focus', function() {
                if (!this.value) {
                    const titles = [
                        "Harmoni Alam", "Ekspresi Jiwa", "Melodi Warna", 
                        "Refleksi Kehidupan", "Impian Abadi", "Kebebasan Berkarya"
                    ];
                    this.placeholder = "Contoh: " + titles[Math.floor(Math.random() * titles.length)];
                }
            });
            
            // Show welcome message
            setTimeout(() => {
                showToast('Form Tambah Artwork', 'Isi form dengan detail artwork baru.', 'success');
            }, 1000);
        });
        
        // Helper functions
        function updateCharacterCount(inputId, countId, maxLength) {
            const input = document.getElementById(inputId);
            const count = document.getElementById(countId);
            
            if (!input || !count) return;
            
            const currentLength = input.value.length;
            
            count.textContent = `${currentLength}/${maxLength} karakter`;
            
            // Add warning class if near limit
            count.classList.remove('warning', 'error');
            if (currentLength > maxLength * 0.8) {
                count.classList.add('warning');
            }
            if (currentLength > maxLength) {
                count.classList.add('error');
            }
        }
        
        function updatePriceDisplay() {
            const priceInput = document.getElementById('price');
            const priceDisplay = document.getElementById('priceDisplay');
            
            if (!priceInput || !priceDisplay) return;
            
            const price = parseInt(priceInput.value) || 0;
            
            priceDisplay.textContent = 'Rp ' + price.toLocaleString('id-ID');
            
            // Add warning for very high prices
            priceDisplay.classList.remove('warning');
            if (price > 500000000) { // PERUBAHAN: warning muncul di atas 500 juta
                priceDisplay.classList.add('warning');
                priceDisplay.textContent += ' (Harga sangat tinggi!)';
            }
        }
        
        function previewImageFile(file) {
            if (!file) return;
            
            if (file.size > 5 * 1024 * 1024) {
                showToast('File Terlalu Besar', 'Ukuran file maksimal adalah 5MB.', 'error');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                if (previewImage) {
                    previewImage.src = e.target.result;
                }
                if (imagePreview) {
                    imagePreview.style.display = 'block';
                }
                showToast('Gambar Diunggah', 'Gambar siap digunakan.', 'success');
            }
            reader.readAsDataURL(file);
        }
        
        function showToast(title, message, type = 'success') {
            const toast = document.getElementById('toast');
            if (!toast) return;
            
            const toastIcon = toast.querySelector('.toast-icon i');
            const toastTitle = toast.querySelector('.toast-title');
            const toastMessage = toast.querySelector('.toast-message');
            
            if (!toastIcon || !toastTitle || !toastMessage) return;
            
            // Set toast content
            toastTitle.textContent = title;
            toastMessage.textContent = message;
            
            // Set toast type
            toast.className = `toast toast-${type}`;
            toastIcon.className = type === 'success' ? 'fas fa-check' : 'fas fa-times';
            
            // Show toast
            toast.classList.add('show');
            
            // Hide toast after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }
    </script>
</body>
</html>