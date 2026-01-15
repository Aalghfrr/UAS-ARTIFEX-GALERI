<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Karya Seni</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }
        
        .admin-container {
            max-width: 1300px;
            margin: 0 auto;
        }
        
        /* Header */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .admin-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            display: flex;
            align-items: center;
        }
        
        .admin-header h1 i {
            margin-right: 15px;
            color: #6a11cb;
            background: rgba(106, 17, 203, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .header-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn-back {
            padding: 10px 20px;
            background: #6a11cb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-back:hover {
            background: #5a0db3;
            transform: translateY(-2px);
        }
        
        .btn-back i {
            margin-right: 8px;
        }
        
        /* Form Card */
        .form-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-left: 5px solid #6a11cb;
        }
        
        .form-card h2 {
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        
        .form-card h2 i {
            margin-right: 12px;
            color: #6a11cb;
            background: rgba(106, 17, 203, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
            font-size: 14px;
        }
        
        .form-group label i {
            margin-right: 8px;
            color: #6a11cb;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(106, 17, 203, 0.2);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(106, 17, 203, 0.3);
        }
        
        .btn-submit i {
            margin-right: 10px;
        }
        
        /* Table Section */
        .table-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .table-section h2 {
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        
        .table-section h2 i {
            margin-right: 12px;
            color: #6a11cb;
            background: rgba(106, 17, 203, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }
        
        .artworks-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }
        
        .artworks-table thead {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
        }
        
        .artworks-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
        }
        
        .artworks-table th i {
            margin-right: 8px;
        }
        
        .artworks-table tbody tr {
            border-bottom: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .artworks-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .artworks-table td {
            padding: 18px 15px;
            vertical-align: top;
        }
        
        .artwork-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .artwork-img:hover {
            transform: scale(1.05);
            border-color: #6a11cb;
        }
        
        .no-image {
            width: 100px;
            height: 100px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #95a5a6;
            font-size: 12px;
            border: 2px dashed #e9ecef;
        }
        
        .artwork-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 16px;
        }
        
        .artwork-artist {
            color: #6a11cb;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .artwork-price {
            color: #27ae60;
            font-weight: 600;
            font-size: 16px;
        }
        
        .artwork-description {
            color: #7f8c8d;
            font-size: 14px;
            line-height: 1.5;
            margin-top: 8px;
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-width: 150px;
        }
        
        .btn-edit, .btn-delete {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        
        .btn-edit {
            background: rgba(41, 128, 185, 0.1);
            color: #2980b9;
            border: 1px solid rgba(41, 128, 185, 0.3);
        }
        
        .btn-edit:hover {
            background: #2980b9;
            color: white;
        }
        
        .btn-delete {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
            border: 1px solid rgba(231, 76, 60, 0.3);
        }
        
        .btn-delete:hover {
            background: #e74c3c;
            color: white;
        }
        
        .btn-edit i, .btn-delete i {
            margin-right: 8px;
        }
        
        /* Edit Form */
        .edit-form {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 15px;
            border-left: 4px solid #2980b9;
            display: none;
        }
        
        .edit-form.active {
            display: block;
            animation: slideDown 0.3s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .edit-form h4 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        
        .edit-form h4 i {
            margin-right: 10px;
            color: #2980b9;
        }
        
        .edit-form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .edit-form input,
        .edit-form textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 14px;
        }
        
        .edit-form textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .edit-form-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-update {
            background: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-update:hover {
            background: #219653;
        }
        
        .btn-cancel {
            background: #95a5a6;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-cancel:hover {
            background: #7f8c8d;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .artworks-table {
                font-size: 14px;
            }
            
            .artworks-table th,
            .artworks-table td {
                padding: 12px 8px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .admin-header h1 {
                font-size: 22px;
            }
            
            .form-card,
            .table-section {
                padding: 20px;
            }
            
            .btn-submit {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<div class="admin-container">
    {{-- ================= HEADER ================= --}}
    <div class="admin-header">
        <h1>
            <i class="fas fa-palette"></i>
            Kelola Karya Seni
        </h1>
        
        <div class="header-actions">
            <a href="/admin/dashboard" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    {{-- ================= CREATE FORM ================= --}}
    <div class="form-card">
        <h2>
            <i class="fas fa-plus-circle"></i>
            Tambah Karya Seni Baru
        </h2>

        <form action="/admin/artworks/store" method="POST" id="createForm">
            @csrf
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="title"><i class="fas fa-heading"></i> Judul Karya</label>
                    <input type="text" name="title" id="title" placeholder="Masukkan judul karya seni" required>
                </div>
                
                <div class="form-group">
                    <label for="artist_name"><i class="fas fa-user"></i> Nama Seniman</label>
                    <input type="text" name="artist_name" id="artist_name" placeholder="Nama seniman/pembuat" required>
                </div>
                
                <div class="form-group">
                    <label for="price"><i class="fas fa-tag"></i> Harga (Rp)</label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           placeholder="Contoh: 1500000" 
                           required
                           min="1000"
                           max="1000000000">
                </div>
                
                <div class="form-group">
                    <label for="image"><i class="fas fa-image"></i> Link Gambar (URL)</label>
                    <input type="text" name="image" id="image" placeholder="https://example.com/gambar.jpg">
                </div>
            </div>
            
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left"></i> Deskripsi</label>
                <textarea name="description" id="description" placeholder="Deskripsi lengkap tentang karya seni ini..."></textarea>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i>
                Simpan Karya Seni
            </button>
        </form>
    </div>

    {{-- ================= LIST TABLE ================= --}}
    <div class="table-section">
        <h2>
            <i class="fas fa-list"></i>
            Daftar Karya Seni
        </h2>
        
        <div class="table-container">
            <table class="artworks-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-heading"></i> Judul</th>
                        <th><i class="fas fa-user"></i> Seniman</th>
                        <th><i class="fas fa-tag"></i> Harga</th>
                        <th><i class="fas fa-image"></i> Gambar</th>
                        <th><i class="fas fa-cogs"></i> Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($artworks as $art)
                    <tr>
                        <td>
                            <div class="artwork-title">{{ $art->title }}</div>
                            @if($art->description)
                                <div class="artwork-description">{{ Str::limit($art->description, 100) }}</div>
                            @endif
                        </td>
                        
                        <td>
                            <div class="artwork-artist">
                                <i class="fas fa-user-pen"></i> {{ $art->artist_name }}
                            </div>
                        </td>
                        
                        <td>
                            <div class="artwork-price">
                                Rp {{ number_format($art->price, 0, ',', '.') }}
                            </div>
                        </td>
                        
                        <td>
                            @if($art->image)
                                <img src="{{ $art->image }}" alt="{{ $art->title }}" class="artwork-img">
                            @else
                                <div class="no-image">
                                    <i class="fas fa-image"></i>
                                    <span>Tidak ada gambar</span>
                                </div>
                            @endif
                        </td>
                        
                        <td>
                            <div class="action-buttons">
                                {{-- ===== EDIT BUTTON ===== --}}
                                <button type="button" class="btn-edit" onclick="toggleEditForm({{ $art->id }})">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </button>

                                {{-- ===== DELETE FORM ===== --}}
                                <form action="/admin/artworks/delete/{{ $art->id }}" method="POST" class="delete-form">
                                    @csrf
                                    <button type="submit" class="btn-delete" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>

                            {{-- ===== EDIT FORM (Hidden by default) ===== --}}
                            <div class="edit-form" id="editForm{{ $art->id }}">
                                <h4><i class="fas fa-edit"></i> Edit Karya</h4>
                                
                                <form action="/admin/artworks/update/{{ $art->id }}" method="POST">
                                    @csrf
                                    
                                    <div class="edit-form-grid">
                                        <div>
                                            <input type="text" name="title" value="{{ $art->title }}" placeholder="Judul" required>
                                        </div>
                                        
                                        <div>
                                            <input type="text" name="artist_name" value="{{ $art->artist_name }}" placeholder="Seniman" required>
                                        </div>
                                        
                                        <div>
                                            <input type="number" 
                                                   name="price" 
                                                   value="{{ $art->price }}" 
                                                   placeholder="Harga" 
                                                   required
                                                   min="1000"
                                                   max="1000000000">
                                        </div>
                                        
                                        <div>
                                            <input type="text" name="image" value="{{ $art->image }}" placeholder="Link Gambar">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <textarea name="description" placeholder="Deskripsi">{{ $art->description }}</textarea>
                                    </div>
                                    
                                    <div class="edit-form-actions">
                                        <button type="submit" class="btn-update">
                                            <i class="fas fa-check"></i> Update
                                        </button>
                                        <button type="button" class="btn-cancel" onclick="toggleEditForm({{ $art->id }})">
                                            <i class="fas fa-times"></i> Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Toggle edit form visibility
    function toggleEditForm(artId) {
        const editForm = document.getElementById(`editForm${artId}`);
        editForm.classList.toggle('active');
    }
    
    // Confirm before delete
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus karya seni ini? Tindakan ini tidak dapat dibatalkan.');
    }
    
    // Form validation for create form
    document.getElementById('createForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        const artist = document.getElementById('artist_name').value.trim();
        const price = document.getElementById('price').value;
        
        if (!title || !artist || !price) {
            e.preventDefault();
            alert('Harap isi semua field yang wajib diisi!');
            return false;
        }
        
        if (price < 1000) {
            e.preventDefault();
            alert('Harga minimal adalah Rp 1.000!');
            return false;
        }
        
        if (price > 1000000000) {
            e.preventDefault();
            alert('Harga maksimal adalah Rp 1.000.000.000!');
            return false;
        }
        
        return true;
    });
    
    // Hapus semua format harga yang ribet
    document.getElementById('price').addEventListener('blur', function() {
        // Biarkan tetap angka saja, tidak perlu format
    });
    
    document.getElementById('price').addEventListener('focus', function() {
        // Biarkan tetap angka saja
    });
    
    // Hapus semua auto format untuk input harga di edit forms
    document.querySelectorAll('input[name="price"]').forEach(input => {
        input.addEventListener('blur', function() {
            // Biarkan tetap angka saja
        });
        
        input.addEventListener('focus', function() {
            // Biarkan tetap angka saja
        });
    });
</script>

</body>
</html>