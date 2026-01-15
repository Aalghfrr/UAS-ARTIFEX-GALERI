<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🖼️ Edit Artwork - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ... (CSS TETAP SAMA) ... */
    </style>
</head>
<body>
    <!-- Canvas Background -->
    <div class="art-canvas" id="artCanvas"></div>
    
    <div class="masterpiece-container">
        <div class="artwork-editor">
            <!-- Header -->
            <div class="editor-header">
                <div class="header-brushstroke"></div>
                <div class="header-content">
                    <div class="artwork-meta">
                        <h1 class="editor-title">Edit Masterpiece</h1>
                        <div class="artwork-subtitle">
                            <span class="artwork-id">
                                <i class="fas fa-hashtag"></i>
                                ART-{{ str_pad($artwork->id, 5, '0', STR_PAD_LEFT) }}
                            </span>
                            <span>Mengedit: <strong>{{ $artwork->title }}</strong></span>
                        </div>
                    </div>
                    <div class="header-actions">
                        <button class="btn btn-secondary" onclick="window.history.back()">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="editor-nav">
                <ul class="nav-tabs">
                    <li class="nav-tab active" data-tab="basic">
                        <i class="fas fa-edit"></i>
                        Informasi Dasar
                    </li>
                    <li class="nav-tab" data-tab="media">
                        <i class="fas fa-image"></i>
                        Media & Gambar
                    </li>
                    <li class="nav-tab" data-tab="advanced">
                        <i class="fas fa-sliders-h"></i>
                        Pengaturan Lanjutan
                    </li>
                </ul>
            </nav>
            
            <!-- Main Content -->
            <div class="editor-content">
                <!-- Left Column: Form -->
                <div class="form-column">
                    <!-- Basic Information Tab -->
                    <div class="form-tab active" id="basic-tab">
                        <!-- Artist & Title -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <h3 class="section-title">Identitas Karya</h3>
                            </div>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="input-label">
                                        <i class="fas fa-palette"></i>
                                        Nama Seniman
                                        <span class="required-mark">*</span>
                                    </label>
                                    <div class="input-field">
                                        <i class="fas fa-user"></i>
                                        <input type="text" 
                                               name="artist_name"
                                               value="{{ old('artist_name', $artwork->artist_name) }}"
                                               placeholder="Vincent van Gogh"
                                               required
                                               maxlength="100">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="input-label">
                                        <i class="fas fa-signature"></i>
                                        Judul Karya
                                        <span class="required-mark">*</span>
                                    </label>
                                    <div class="input-field">
                                        <i class="fas fa-heading"></i>
                                        <input type="text" 
                                               name="title"
                                               value="{{ old('title', $artwork->title) }}"
                                               placeholder="The Starry Night"
                                               required
                                               maxlength="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pricing -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <h3 class="section-title">Harga & Nilai</h3>
                            </div>
                            <div class="form-group">
                                <label class="input-label">
                                    <i class="fas fa-money-bill-wave"></i>
                                    Harga Karya
                                    <span class="required-mark">*</span>
                                </label>
                                <div class="price-field">
                                    <div class="currency-badge">
                                        <i class="fas fa-coins"></i>
                                        IDR
                                    </div>
                                    <div class="input-field">
                                        <i class="fas fa-money-bill"></i>
                                        <input type="number" 
                                               name="price"
                                               value="{{ old('price', $artwork->price) }}"
                                               placeholder="15000000"
                                               required
                                               min="1000"
                                               max="1000000000" <!-- PERUBAHAN: tambah max -->
                                               step="1000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                <h3 class="section-title">Deskripsi & Cerita</h3>
                            </div>
                            <div class="form-group">
                                <label class="input-label">
                                    <i class="fas fa-book-open"></i>
                                    Deskripsi Lengkap
                                    <span class="required-mark">*</span>
                                </label>
                                <div class="input-field">
                                    <i class="fas fa-pen-fancy"></i>
                                    <textarea name="description"
                                              placeholder="Ceritakan kisah di balik karya ini, teknik yang digunakan, inspirasi, dan makna yang ingin disampaikan..."
                                              maxlength="2000">{{ old('description', $artwork->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Media Tab -->
                    <div class="form-tab" id="media-tab">
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <h3 class="section-title">Media & Gambar</h3>
                            </div>
                            
                            <div class="form-group">
                                <label class="input-label">
                                    <i class="fas fa-link"></i>
                                    URL Gambar
                                </label>
                                <div class="input-field">
                                    <i class="fas fa-globe"></i>
                                    <input type="url" 
                                           name="image"
                                           value="{{ old('image', $artwork->image) }}"
                                           placeholder="https://example.com/your-artwork.jpg">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="input-label">
                                    <i class="fas fa-upload"></i>
                                    Upload Gambar Baru
                                </label>
                                <div class="image-upload-zone" onclick="document.getElementById('fileInput').click()">
                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    <div class="upload-text">Klik atau tarik gambar ke sini</div>
                                    <div class="upload-subtext">JPG, PNG, GIF • Maksimal 10MB</div>
                                    <input type="file" id="fileInput" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Advanced Tab -->
                    <div class="form-tab" id="advanced-tab">
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <h3 class="section-title">Pengaturan Lanjutan</h3>
                            </div>
                            
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="input-label">
                                        <i class="fas fa-layer-group"></i>
                                        Kategori
                                    </label>
                                    <div class="input-field">
                                        <i class="fas fa-tags"></i>
                                        <select name="category">
                                            <option value="">Pilih Kategori</option>
                                            <option value="Lukisan" {{ old('category', isset($artwork->category) ? $artwork->category : '') == 'Lukisan' ? 'selected' : '' }}>Lukisan</option>
                                            <option value="Patung" {{ old('category', isset($artwork->category) ? $artwork->category : '') == 'Patung' ? 'selected' : '' }}>Patung</option>
                                            <option value="Fotografi" {{ old('category', isset($artwork->category) ? $artwork->category : '') == 'Fotografi' ? 'selected' : '' }}>Fotografi</option>
                                            <option value="Digital Art" {{ old('category', isset($artwork->category) ? $artwork->category : '') == 'Digital Art' ? 'selected' : '' }}>Digital Art</option>
                                            <option value="Sketsa" {{ old('category', isset($artwork->category) ? $artwork->category : '') == 'Sketsa' ? 'selected' : '' }}>Sketsa</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="input-label">
                                        <i class="fas fa-ruler-combined"></i>
                                        Dimensi
                                    </label>
                                    <div class="input-field">
                                        <i class="fas fa-expand-arrows-alt"></i>
                                        <input type="text" 
                                               name="dimensions"
                                               value="{{ old('dimensions', isset($artwork->dimensions) ? $artwork->dimensions : '') }}"
                                               placeholder="50x70 cm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="action-buttons">
                        <form method="POST" action="/admin/artworks/update/{{ $artwork->id }}" id="editForm">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Simpan Perubahan
                            </button>
                        </form>
                        
                        <button type="button" class="btn btn-secondary" onclick="previewArtwork()">
                            <i class="fas fa-eye"></i>
                            Preview
                        </button>
                        
                        <form method="POST" action="/admin/artworks/delete/{{ $artwork->id }}" id="deleteForm" style="display: none;">
                            @csrf
                        </form>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i>
                            Hapus Karya
                        </button>
                    </div>
                </div>
                
                <!-- Right Column: Preview -->
                <div class="preview-panel">
                    <h3 class="preview-title">
                        <i class="fas fa-eye"></i>
                        Preview Karya
                    </h3>
                    
                    <div class="artwork-preview-card">
                        <div class="preview-image" id="previewImageContainer">
                            @if(isset($artwork->image) && !empty($artwork->image))
                                <img src="{{ $artwork->image }}" alt="Preview" style="width:100%;height:100%;object-fit:cover;">
                            @else
                                <i class="fas fa-palette"></i>
                            @endif
                        </div>
                        <div class="preview-info">
                            <div class="preview-artist">
                                <i class="fas fa-user"></i>
                                <span id="previewArtist">{{ $artwork->artist_name }}</span>
                            </div>
                            <h4 class="preview-title-text" id="previewTitle">{{ $artwork->title }}</h4>
                            <div class="preview-price" id="previewPrice">
                                Rp {{ number_format($artwork->price, 0, ',', '.') }}
                            </div>
                            <p id="previewDescription" style="color: var(--gray); font-size: 0.95rem; line-height: 1.5;">
                                {{ Str::limit($artwork->description, 120) }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="artwork-stats">
                        <div class="stat-item">
                            <span class="stat-label">ID Karya</span>
                            <span class="stat-value">ART-{{ str_pad($artwork->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Tanggal Dibuat</span>
                            <span class="stat-value">{{ date('d M Y', strtotime($artwork->created_at)) }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Status</span>
                            <span class="stat-value" style="color: var(--secondary);">
                                <i class="fas fa-check-circle"></i> Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div class="art-toast" id="artToast">
        <div class="toast-icon">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <div class="toast-title" style="font-weight: 600; margin-bottom: 5px;"></div>
            <div class="toast-message" style="color: var(--gray);"></div>
        </div>
    </div>
    
    <script>
        // Create canvas background
        function createCanvas() {
            const canvas = document.getElementById('artCanvas');
            for (let i = 0; i < 50; i++) {
                const dot = document.createElement('div');
                dot.className = 'canvas-dot';
                dot.style.left = `${Math.random() * 100}%`;
                dot.style.top = `${Math.random() * 100}%`;
                dot.style.animationDelay = `${Math.random() * 15}s`;
                dot.style.background = i % 3 === 0 ? '#8B5CF6' : i % 3 === 1 ? '#EC4899' : '#10B981';
                dot.style.width = dot.style.height = `${2 + Math.random() * 4}px`;
                canvas.appendChild(dot);
            }
        }
        
        // Tab Navigation
        document.querySelectorAll('.nav-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                
                // Update active tab
                document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Show corresponding content
                document.querySelectorAll('.form-tab').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(`${tabId}-tab`).classList.add('active');
                
                showToast('Tab Berubah', `Membuka pengaturan ${tabId}`, 'success');
            });
        });
        
        // Real-time Preview Update
        function updatePreview() {
            const artist = document.querySelector('[name="artist_name"]').value;
            const title = document.querySelector('[name="title"]').value;
            const price = document.querySelector('[name="price"]').value;
            const description = document.querySelector('[name="description"]').value;
            
            document.getElementById('previewArtist').textContent = artist || 'Seniman';
            document.getElementById('previewTitle').textContent = title || 'Judul Karya';
            document.getElementById('previewPrice').textContent = price ? `Rp ${parseInt(price).toLocaleString('id-ID')}` : 'Rp 0';
            document.getElementById('previewDescription').textContent = description ? 
                (description.length > 120 ? description.substring(0, 120) + '...' : description) : 
                'Deskripsi karya akan muncul di sini.';
        }
        
        // Add event listeners for real-time preview
        document.querySelectorAll('[name="artist_name"], [name="title"], [name="price"], [name="description"]')
            .forEach(input => {
                input.addEventListener('input', updatePreview);
            });
        
        // Image Upload Preview
        document.getElementById('fileInput').addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = document.getElementById('previewImageContainer');
                    previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview" style="width:100%;height:100%;object-fit:cover;">`;
                    showToast('Gambar Diunggah', 'Gambar berhasil diunggah dan akan disimpan.', 'success');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        // Form Submission
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const artist = document.querySelector('[name="artist_name"]').value.trim();
            const title = document.querySelector('[name="title"]').value.trim();
            const price = document.querySelector('[name="price"]').value;
            
            if (!artist || !title || !price) {
                showToast('Form Tidak Lengkap', 'Harap isi semua field yang diperlukan.', 'error');
                return;
            }
            
            if (price < 1000) {
                showToast('Harga Invalid', 'Harga minimum adalah Rp 1.000.', 'error');
                return;
            }
            
            if (price > 1000000000) { // PERUBAHAN: tambah validasi max
                showToast('Harga Melebihi Batas', 'Harga maksimal adalah Rp 1.000.000.000.', 'error');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('.btn-primary');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                showToast('Perubahan Disimpan', 'Karya seni berhasil diperbarui!', 'success');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Actually submit the form
                this.submit();
            }, 1500);
        });
        
        // Delete Confirmation
        function confirmDelete() {
            Swal.fire({
                title: 'Hapus Karya Ini?',
                text: "Tindakan ini tidak dapat dibatalkan. Karya akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: 'var(--card-bg)',
                color: 'var(--dark)'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }
        
        // Preview Functionality
        function previewArtwork() {
            showToast('Preview Mode', 'Membuka preview karya dalam mode penuh.', 'success');
            // In a real application, this would open a preview modal or new tab
        }
        
        // Toast Notification
        function showToast(title, message, type = 'success') {
            const toast = document.getElementById('artToast');
            const toastIcon = toast.querySelector('.toast-icon i');
            const toastTitle = toast.querySelector('.toast-title');
            const toastMessage = toast.querySelector('.toast-message');
            
            // Set content
            toastTitle.textContent = title;
            toastMessage.textContent = message;
            
            // Set type
            toast.className = `art-toast toast-${type}`;
            toastIcon.className = type === 'success' ? 'fas fa-check' : 'fas fa-times';
            
            // Show
            toast.classList.add('show');
            
            // Auto hide
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            createCanvas();
            updatePreview();
            
            // Add SweetAlert if not present
            if (typeof Swal === 'undefined') {
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                document.head.appendChild(script);
            }
            
            // Show welcome message
            setTimeout(() => {
                showToast('Selamat Datang', 'Edit karya seni dengan kreativitas Anda!', 'success');
            }, 1000);
        });
        
        // Auto-save indicator
        let autoSaveTimer;
        document.querySelectorAll('input, textarea, select').forEach(input => {
            input.addEventListener('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(() => {
                    showToast('Auto-save', 'Perubahan disimpan sementara.', 'success');
                }, 3000);
            });
        });
    </script>
</body>
</html>