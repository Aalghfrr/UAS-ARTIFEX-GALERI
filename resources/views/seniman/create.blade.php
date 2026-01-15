<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karya - Artifex Gallery</title>
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
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 1000px;
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
            padding: 20px 0;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #7c4dff, #5e35b1);
            border-radius: 2px;
        }

        .header p {
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 20px auto 0;
            line-height: 1.6;
        }

        .form-container {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(0, 0, 0, 0.04);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(0, 0, 0, 0.04);
        }

        /* Karya Box Styling */
        .karya-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 25px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .karya-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #7c4dff, #5e35b1);
            border-radius: 2px 0 0 2px;
        }

        .karya-box:hover {
            border-color: #7c4dff;
            background: #fefbff;
            transform: translateY(-2px);
        }

        .karya-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .karya-number {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .karya-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #7c4dff, #5e35b1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(124, 77, 255, 0.3);
        }

        .karya-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2d3748;
        }

        .remove-btn {
            background: #ff4757;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: #ff3742;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 71, 87, 0.3);
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a5568;
            font-size: 15px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #7c4dff;
            box-shadow: 0 0 0 3px rgba(124, 77, 255, 0.1);
            background: white;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #a0aec0;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Price Input Specific */
        .price-input-container {
            position: relative;
        }

        .price-input-container::before {
            content: 'Rp';
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #4a5568;
            font-weight: 500;
            z-index: 2;
        }

        .price-input {
            padding-left: 45px !important;
        }

        .price-hint {
            font-size: 12px;
            color: #718096;
            margin-top: 4px;
            font-style: italic;
        }

        /* Button Styling */
        .buttons-container {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .add-btn {
            background: linear-gradient(135deg, #7c4dff, #5e35b1);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(124, 77, 255, 0.25);
        }

        .add-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(124, 77, 255, 0.35);
        }

        .add-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn {
            background: linear-gradient(135deg, #00b894, #00a085);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 184, 148, 0.25);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 184, 148, 0.35);
            background: linear-gradient(135deg, #00d4aa, #00b894);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        /* Counter */
        .counter {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #edf2f7;
            padding: 12px 20px;
            border-radius: 10px;
            margin-top: 30px;
            font-weight: 500;
            color: #4a5568;
        }

        .counter .count {
            background: #7c4dff;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Animation for new boxes */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .new-karya {
            animation: slideIn 0.4s ease;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 25px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .buttons-container {
                flex-direction: column;
            }
            
            .add-btn,
            .submit-btn {
                width: 100%;
                justify-content: center;
            }
            
            .karya-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .karya-box {
                padding: 20px;
            }
        }

        /* Input focus animation */
        .form-group input:focus,
        .form-group textarea:focus {
            animation: pulse 0.3s ease;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(124, 77, 255, 0.1); }
            70% { box-shadow: 0 0 0 6px rgba(124, 77, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(124, 77, 255, 0); }
        }

        /* Hover label effect */
        .form-group label {
            position: relative;
            padding-left: 8px;
        }

        .form-group label::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 16px;
            background: #7c4dff;
            border-radius: 1.5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .form-group:hover label::before {
            opacity: 1;
        }

        /* Currency formatting */
        .currency-display {
            display: inline-block;
            margin-left: 5px;
            color: #718096;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Tambah Karya Seni</h1>
        <p>Tambahkan multiple karya seni sekaligus dengan formulir yang mudah digunakan. Setiap karya akan disimpan sebagai entri terpisah.</p>
    </div>

    <form method="POST" action="{{ route('seniman.store') }}" id="mainForm">
        @csrf
        
        <div id="karya-wrapper">
            <!-- KARYA 1 -->
            <div class="karya-box new-karya">
                <div class="karya-header">
                    <div class="karya-number">
                        <div class="karya-icon">1</div>
                        <h3 class="karya-title">Karya Pertama</h3>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="artist_name_0">Nama Seniman</label>
                        <input type="text" name="karya[0][artist_name]" id="artist_name_0" placeholder="Masukkan nama seniman" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="title_0">Judul Karya</label>
                        <input type="text" name="karya[0][title]" id="title_0" placeholder="Masukkan judul karya" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="price_0">Harga</label>
                        <div class="price-input-container">
                            <input type="text" name="karya[0][price]" id="price_0" placeholder="0" class="price-input" required
                                   oninput="formatPrice(this)" onblur="validatePrice(this)">
                        </div>
                        <div class="price-hint">Masukkan harga dalam angka (contoh: 1500000 atau 1.500.000)</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image_0">URL Gambar</label>
                        <input type="text" name="karya[0][image]" id="image_0" placeholder="https://example.com/image.jpg">
                    </div>
                    
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label for="description_0">Deskripsi Karya</label>
                        <textarea name="karya[0][description]" id="description_0" placeholder="Deskripsikan karya seni ini secara detail..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="counter">
            <div class="count">1</div>
            <span>Karya ditambahkan</span>
        </div>

        <div class="buttons-container">
            <button type="button" class="add-btn" onclick="addKarya()">
                <i class="fas fa-plus-circle"></i>
                Tambah Karya Baru
            </button>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-save"></i>
                Simpan Semua Karya
            </button>
        </div>
    </form>

    <div class="footer">
        <p>© 2024 Artifex Gallery. Semua hak dilindungi.</p>
    </div>
</div>

<script>
let index = 1;

function addKarya() {
    const karyaNumber = index + 1;
    const box = document.createElement('div');
    box.className = 'karya-box new-karya';
    box.innerHTML = `
        <div class="karya-header">
            <div class="karya-number">
                <div class="karya-icon">${karyaNumber}</div>
                <h3 class="karya-title">Karya ${karyaNumber}</h3>
            </div>
            <button type="button" class="remove-btn" onclick="removeKarya(this)">
                <i class="fas fa-trash"></i>
                Hapus
            </button>
        </div>
        
        <div class="form-grid">
            <div class="form-group">
                <label for="artist_name_${index}">Nama Seniman</label>
                <input type="text" name="karya[${index}][artist_name]" id="artist_name_${index}" placeholder="Masukkan nama seniman" required>
            </div>
            
            <div class="form-group">
                <label for="title_${index}">Judul Karya</label>
                <input type="text" name="karya[${index}][title]" id="title_${index}" placeholder="Masukkan judul karya" required>
            </div>
            
            <div class="form-group">
                <label for="price_${index}">Harga</label>
                <div class="price-input-container">
                    <input type="text" name="karya[${index}][price]" id="price_${index}" placeholder="0" class="price-input" required
                           oninput="formatPrice(this)" onblur="validatePrice(this)">
                </div>
                <div class="price-hint">Masukkan harga dalam angka (contoh: 1500000 atau 1.500.000)</div>
            </div>
            
            <div class="form-group">
                <label for="image_${index}">URL Gambar</label>
                <input type="text" name="karya[${index}][image]" id="image_${index}" placeholder="https://example.com/image.jpg">
            </div>
            
            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="description_${index}">Deskripsi Karya</label>
                <textarea name="karya[${index}][description]" id="description_${index}" placeholder="Deskripsikan karya seni ini secara detail..."></textarea>
            </div>
        </div>
    `;
    
    document.getElementById('karya-wrapper').appendChild(box);
    
    // Update counter
    updateCounter();
    
    // Remove animation class after animation completes
    setTimeout(() => {
        box.classList.remove('new-karya');
    }, 400);
    
    index++;
    
    // Add vibration effect on mobile
    if (navigator.vibrate) {
        navigator.vibrate(50);
    }
}

function removeKarya(button) {
    const box = button.closest('.karya-box');
    if (document.querySelectorAll('.karya-box').length > 1) {
        // Add fade out animation
        box.style.transition = 'all 0.3s ease';
        box.style.opacity = '0';
        box.style.transform = 'translateY(-20px)';
        
        setTimeout(() => {
            box.remove();
            updateCounter();
            updateKaryaNumbers();
        }, 300);
        
        // Add vibration effect
        if (navigator.vibrate) {
            navigator.vibrate(30);
        }
    } else {
        alert('Minimal harus ada satu karya!');
    }
}

function updateCounter() {
    const count = document.querySelectorAll('.karya-box').length;
    const counterElement = document.querySelector('.counter .count');
    const counterText = document.querySelector('.counter span');
    
    counterElement.textContent = count;
    counterText.textContent = count === 1 ? 'Karya ditambahkan' : 'Karya ditambahkan';
}

function updateKaryaNumbers() {
    const boxes = document.querySelectorAll('.karya-box');
    boxes.forEach((box, idx) => {
        const icon = box.querySelector('.karya-icon');
        const title = box.querySelector('.karya-title');
        const inputs = box.querySelectorAll('input, textarea');
        
        if (icon) icon.textContent = idx + 1;
        if (title) title.textContent = `Karya ${idx + 1}`;
        
        // Update all input names
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                const newName = name.replace(/\[\d+\]/, `[${idx}]`);
                input.setAttribute('name', newName);
                input.id = input.id.replace(/\d+$/, idx);
            }
        });
    });
    
    // Update global index
    index = boxes.length;
}

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

// Validasi harga saat input kehilangan fokus
function validatePrice(input) {
    let value = input.value.trim();
    
    if (value === '') {
        input.style.borderColor = '#ff4757';
        return false;
    }
    
    // Hapus semua karakter non-digit kecuali tanda minus di depan
    let cleanValue = value.replace(/[^\d-]/g, '');
    if (cleanValue.startsWith('-')) {
        cleanValue = cleanValue.replace(/[^\d]/g, '');
        cleanValue = '-' + cleanValue;
    }
    
    // Konversi ke number
    const numValue = parseInt(cleanValue);
    
    if (isNaN(numValue)) {
        input.style.borderColor = '#ff4757';
        return false;
    }
    
    // Format kembali untuk tampilan
    if (numValue < 0) {
        const absValue = Math.abs(numValue);
        const formatted = absValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        input.value = '-' + formatted;
    } else {
        input.value = numValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    
    input.style.borderColor = '#e2e8f0';
    return true;
}

// Format semua harga sebelum submit
function formatAllPricesBeforeSubmit() {
    const priceInputs = document.querySelectorAll('.price-input');
    let allValid = true;
    
    priceInputs.forEach(input => {
        if (!validatePrice(input)) {
            allValid = false;
            // Tambahkan animasi shake untuk input yang error
            input.style.animation = 'shake 0.5s';
            setTimeout(() => {
                input.style.animation = '';
            }, 500);
        }
    });
    
    return allValid;
}

// Form submission handler
document.getElementById('mainForm').addEventListener('submit', function(e) {
    // Format dan validasi semua harga
    if (!formatAllPricesBeforeSubmit()) {
        e.preventDefault();
        alert('Mohon periksa input harga. Pastikan harga diisi dengan benar.');
        return;
    }
    
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    submitBtn.disabled = true;
    
    // Add progress animation
    submitBtn.style.background = 'linear-gradient(135deg, #00a085, #008b74)';
    
    // Clean harga dari format sebelum dikirim
    const priceInputs = document.querySelectorAll('.price-input');
    priceInputs.forEach(input => {
        const value = input.value.replace(/[^\d-]/g, '');
        input.value = value;
    });
});

// Add CSS for shake animation
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    .form-group.focused label {
        color: #7c4dff;
        font-weight: 600;
    }
    
    .form-group.focused label::before {
        opacity: 1;
        height: 20px;
    }
    
    .price-input:focus {
        border-color: #7c4dff !important;
    }
`;
document.head.appendChild(style);

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input, textarea');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.parentElement.classList.remove('focused');
        });
    });
    
    // Initialize counter
    updateCounter();
    
    // Set default harga jika kosong
    const priceInputs = document.querySelectorAll('.price-input');
    priceInputs.forEach(input => {
        if (!input.value) {
            input.value = '0';
        }
    });
});

// Allow keyboard navigation
document.addEventListener('keydown', function(e) {
    // Ctrl+Enter untuk submit form
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        e.preventDefault();
        document.querySelector('.submit-btn').click();
    }
});
</script>

</body>
</html>