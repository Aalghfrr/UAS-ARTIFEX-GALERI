<!DOCTYPE html>
<html>
<head>
    <title>Edit Karya - Artifex Gallery</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h2 {
            font-size: 2.2rem;
            color: #2c3e50;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            border-radius: 2px;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid #e1e8ed;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #34495e;
            font-size: 15px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #dfe6e9;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Price Input Styling */
        .price-container {
            position: relative;
        }

        .price-container::before {
            content: 'Rp';
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #34495e;
            font-weight: 500;
            z-index: 2;
        }

        #price {
            padding-left: 45px !important;
            letter-spacing: 1px;
        }

        .price-hint {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 6px;
            font-style: italic;
        }

        /* Button Styling */
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .submit-btn {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.4);
        }

        .cancel-btn {
            background: #ecf0f1;
            color: #34495e;
            border: 2px solid #dfe6e9;
            padding: 15px 30px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .cancel-btn:hover {
            background: #dde4e6;
            transform: translateY(-2px);
        }

        /* Art Info Banner */
        .art-info {
            background: rgba(52, 152, 219, 0.1);
            border: 2px solid rgba(52, 152, 219, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .art-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .art-details h3 {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .art-details p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .form-card {
                padding: 30px;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .submit-btn,
            .cancel-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 10px;
            }
            
            .form-card {
                padding: 20px;
            }
            
            .header h2 {
                font-size: 1.8rem;
            }
        }

        /* Loading Animation */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Error Message */
        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Edit Karya</h2>
    </div>

    <!-- Art Information -->
    <div class="art-info">
        <div class="art-icon">
            <i class="fas fa-palette"></i>
        </div>
        <div class="art-details">
            <h3>{{ $art->title }}</h3>
            <p>Seniman: {{ $art->artist_name }} • ID: {{ $art->id }} • Harga: Rp {{ number_format($art->price, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div style="background: #ffeaea; border: 1px solid #ffcccc; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <h4 style="color: #e74c3c; margin-bottom: 10px;">Perbaiki kesalahan berikut:</h4>
            <ul style="color: #c0392b; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; padding: 15px; margin-bottom: 20px; color: #155724;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('seniman.update', $art->id) }}" id="editForm" class="form-card">
        @csrf
        <!-- GANTI: Hapus @method('PUT') karena route hanya support POST -->

        <div class="form-group">
            <label for="artist_name">Nama Seniman</label>
            <input type="text" name="artist_name" id="artist_name" value="{{ old('artist_name', $art->artist_name) }}" required>
            @error('artist_name')
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Judul Karya</label>
            <input type="text" name="title" id="title" value="{{ old('title', $art->title) }}" required>
            @error('title')
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description">{{ old('description', $art->description) }}</textarea>
            @error('description')
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <div class="price-container">
                <input type="text" 
                       name="price" 
                       id="price" 
                       value="{{ old('price', $art->price) }}" 
                       required
                       oninput="formatPrice(this)">
            </div>
            <div class="price-hint">Masukkan harga (contoh: 1500000 atau 1.500.000)</div>
            @error('price')
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">URL Gambar</label>
            <input type="text" name="image" id="image" value="{{ old('image', $art->image) }}">
            @error('image')
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
            <div id="imagePreview" style="margin-top: 10px;">
                @if($art->image)
                    <img src="{{ $art->image }}" alt="Preview" style="max-width: 200px; border-radius: 8px; margin-top: 10px;" 
                         onerror="this.style.display='none'">
                @endif
            </div>
        </div>

        <div class="button-group">
            <button type="submit" class="submit-btn" id="submitBtn">
                <i class="fas fa-save"></i>
                <span id="btnText">Update Karya</span>
            </button>
            
            <button type="button" class="cancel-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </button>
        </div>
    </form>
</div>

<script>
// Format harga saat user mengetik
function formatPrice(input) {
    let value = input.value.replace(/[^\d]/g, '');
    
    // Simpan cursor position
    const cursorPosition = input.selectionStart;
    
    // Format dengan titik sebagai pemisah ribuan
    if (value.length > 3) {
        const parts = [];
        while (value.length > 3) {
            parts.push(value.substring(value.length - 3));
            value = value.substring(0, value.length - 3);
        }
        parts.push(value);
        input.value = parts.reverse().join('.');
    } else {
        input.value = value;
    }
    
    // Restore cursor position
    const newCursorPosition = cursorPosition + (input.value.length - input.value.replace(/\./g, '').length);
    input.setSelectionRange(newCursorPosition, newCursorPosition);
}

// Form submission handler
document.getElementById('editForm').addEventListener('submit', function(e) {
    const priceInput = document.getElementById('price');
    const value = priceInput.value.replace(/[^\d]/g, '');
    
    // Set nilai murni sebelum submit
    priceInput.value = value;
    
    // Tampilkan loading
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    
    submitBtn.disabled = true;
    btnText.innerHTML = '<span class="spinner"></span> Memproses...';
});

// Initialize price formatting
document.addEventListener('DOMContentLoaded', function() {
    const priceInput = document.getElementById('price');
    if (priceInput.value) {
        // Format harga yang sudah ada
        let value = priceInput.value.toString().replace(/[^\d]/g, '');
        if (value.length > 3) {
            const parts = [];
            while (value.length > 3) {
                parts.push(value.substring(value.length - 3));
                value = value.substring(0, value.length - 3);
            }
            parts.push(value);
            priceInput.value = parts.reverse().join('.');
        }
    }
    
    // Auto-focus pada input pertama
    setTimeout(() => {
        document.getElementById('artist_name').focus();
    }, 300);
    
    // Image preview on URL change
    const imageInput = document.getElementById('image');
    if (imageInput) {
        imageInput.addEventListener('input', function() {
            const preview = document.getElementById('imagePreview');
            if (this.value.trim() !== '') {
                preview.innerHTML = `<img src="${this.value}" alt="Preview" style="max-width: 200px; border-radius: 8px; margin-top: 10px;" onerror="this.style.display='none'">`;
            } else {
                preview.innerHTML = '';
            }
        });
    }
});
</script>

</body>
</html>