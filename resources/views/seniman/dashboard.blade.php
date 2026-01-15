<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Seniman - Artifex Gallery</title>
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
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header h2 {
            font-size: 2.2rem;
            color: #2c3e50;
            position: relative;
        }

        .header h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            border-radius: 2px;
        }

        /* Header Buttons Container */
        .header-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        /* Add Button */
        .add-btn {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.4);
        }

        /* Logout Button */
        .logout-btn {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        /* Table Styling */
        .table-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid #e1e8ed;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        thead {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        th {
            padding: 18px 20px;
            text-align: left;
            color: white;
            font-weight: 600;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        th:first-child {
            border-radius: 15px 0 0 0;
        }

        th:last-child {
            border-radius: 0 15px 0 0;
        }

        tbody tr {
            border-bottom: 1px solid #ecf0f1;
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: #f8f9fa;
            transform: translateX(5px);
        }

        td {
            padding: 18px 20px;
            color: #2c3e50;
            font-size: 14px;
        }

        /* Image Styling */
        .artwork-image {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }

        .artwork-image:hover {
            transform: scale(1.1);
        }

        .no-image {
            width: 70px;
            height: 70px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bdc3c7;
            border: 2px dashed #dfe6e9;
        }

        /* Title and Artist */
        .art-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .artist-name {
            font-size: 13px;
            color: #7f8c8d;
        }

        /* Price Styling */
        .price-tag {
            background: rgba(46, 204, 113, 0.1);
            color: #27ae60;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            border: 1px solid rgba(46, 204, 113, 0.2);
        }

        /* Action Button */
        .action-btn {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .action-btn:hover {
            background: rgba(52, 152, 219, 0.2);
            transform: translateY(-1px);
        }

        /* Statistics */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: 1px solid #e1e8ed;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .stat-1 .stat-icon { background: linear-gradient(135deg, #3498db, #2980b9); }
        .stat-2 .stat-icon { background: linear-gradient(135deg, #2ecc71, #27ae60); }
        .stat-3 .stat-icon { background: linear-gradient(135deg, #9b59b6, #8e44ad); }

        .stat-info h3 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stat-info p {
            font-size: 13px;
            color: #7f8c8d;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-icon {
            font-size: 60px;
            color: #bdc3c7;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .container {
                padding: 20px;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .header-buttons {
                width: 100%;
                justify-content: space-between;
            }
            
            .add-btn, .logout-btn {
                flex: 1;
                justify-content: center;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                overflow-x: auto;
            }
        }

        @media (max-width: 480px) {
            .header h2 {
                font-size: 1.8rem;
            }
            
            .header-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .add-btn, .logout-btn {
                width: 100%;
            }
            
            .stat-card {
                padding: 20px;
            }
            
            th, td {
                padding: 14px 16px;
            }
        }

        /* Animation for table rows */
        @keyframes slideInRow {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        tbody tr {
            animation: slideInRow 0.5s ease;
        }

        tbody tr:nth-child(odd) {
            animation-delay: 0.1s;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Dashboard Seniman</h2>
        <div class="header-buttons">
            <a class="add-btn" href="{{ route('seniman.create') }}">
                <i class="fas fa-plus-circle"></i>
                Tambah Karya Baru
            </a>
            <a class="logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Statistics -->
    <div class="stats-container">
        <div class="stat-card stat-1">
            <div class="stat-icon">
                <i class="fas fa-palette"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $artworks->count() }}</h3>
                <p>Total Karya</p>
            </div>
        </div>
        
        <div class="stat-card stat-2">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $artworks->unique('artist_name')->count() }}</h3>
                <p>Jumlah Seniman</p>
            </div>
        </div>
        
        <div class="stat-card stat-3">
            <div class="stat-icon">
                <i class="fas fa-coins"></i>
            </div>
            <div class="stat-info">
                <h3>Rp {{ number_format($artworks->sum('price'), 0, ',', '.') }}</h3>
                <p>Total Nilai Karya</p>
            </div>
        </div>
    </div>

    <!-- Artworks Table -->
    <div class="table-container">
        @if($artworks->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 100px;">Gambar</th>
                    <th>Karya</th>
                    <th>Seniman</th>
                    <th>Harga</th>
                    <th style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artworks as $art)
                <tr>
                    <td>
                        @if($art->image)
                            <img src="{{ $art->image }}" alt="{{ $art->title }}" class="artwork-image" 
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="no-image" style="display: none;">
                                <i class="fas fa-image"></i>
                            </div>
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="art-title">{{ $art->title }}</div>
                        @if($art->description)
                        <div class="artist-name" style="margin-top: 5px; color: #7f8c8d; font-size: 12px;">
                            {{ Str::limit($art->description, 50) }}
                        </div>
                        @endif
                    </td>
                    <td>
                        <div class="artist-name">{{ $art->artist_name }}</div>
                    </td>
                    <td>
                        <span class="price-tag">Rp {{ number_format($art->price, 0, ',', '.') }}</span>
                    </td>
                    <td>
                        <a href="{{ route('seniman.edit', $art->id) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-palette"></i>
            </div>
            <h3>Belum ada karya</h3>
            <p>Mulai dengan menambahkan karya pertama Anda</p>
            <a class="add-btn" href="{{ route('seniman.create') }}" style="margin-top: 20px;">
                <i class="fas fa-plus-circle"></i>
                Tambah Karya Pertama
            </a>
        </div>
        @endif
    </div>
</div>

<script>
// Initialize table row animations
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effect to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
    
    // Handle broken images
    const images = document.querySelectorAll('.artwork-image');
    images.forEach(img => {
        img.addEventListener('error', function() {
            this.style.display = 'none';
            const noImageDiv = this.nextElementSibling;
            if (noImageDiv && noImageDiv.classList.contains('no-image')) {
                noImageDiv.style.display = 'flex';
            }
        });
    });
    
    // Add fade in animation to stats cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.style.animation = 'fadeIn 0.5s ease forwards';
        card.style.opacity = '0';
    });

    // Logout confirmation
    const logoutBtn = document.querySelector('.logout-btn');
    logoutBtn.addEventListener('click', function(e) {
        if (!e.defaultPrevented) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logout-form').submit();
            }
        }
    });
});
</script>

</body>
</html>