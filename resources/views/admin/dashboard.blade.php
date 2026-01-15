<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Sistem Manajemen Karya</title>
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
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        /* Header Styles */
        .dashboard-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 30px 40px;
            position: relative;
            overflow: hidden;
        }
        
        .dashboard-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.05);
            transform: rotate(30deg);
        }
        
        .dashboard-header h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
        }
        
        .dashboard-header .subtitle {
            font-size: 16px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            margin-top: 25px;
            position: relative;
            z-index: 1;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-right: 15px;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .user-details {
            flex: 1;
        }
        
        .user-name {
            font-weight: 500;
            font-size: 18px;
        }
        
        .user-role {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 2px;
        }
        
        /* Main Content Styles */
        .dashboard-content {
            padding: 40px;
        }
        
        .section-title {
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
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
        
        .tasks-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .task-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: #6a11cb;
        }
        
        .task-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: #6a11cb;
        }
        
        .task-icon {
            font-size: 24px;
            color: #6a11cb;
            margin-bottom: 15px;
            background: rgba(106, 17, 203, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .task-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .task-desc {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        
        .task-link {
            display: inline-flex;
            align-items: center;
            color: #6a11cb;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 8px;
            background: rgba(106, 17, 203, 0.1);
            transition: all 0.3s ease;
        }
        
        .task-link:hover {
            background: #6a11cb;
            color: white;
            transform: translateX(5px);
        }
        
        .task-link i {
            margin-left: 8px;
            font-size: 14px;
        }
        
        .logout-card {
            background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
            color: white;
        }
        
        .logout-card::before {
            background: #ff4b2b;
        }
        
        .logout-card .task-icon {
            color: white;
            background: rgba(255, 255, 255, 0.2);
        }
        
        .logout-card .task-title {
            color: white;
        }
        
        .logout-card .task-desc {
            color: rgba(255, 255, 255, 0.9);
        }
        
        .logout-card .task-link {
            color: white;
            background: rgba(255, 255, 255, 0.2);
        }
        
        .logout-card .task-link:hover {
            background: white;
            color: #ff416c;
        }
        
        /* Penjelasan Tugas Section */
        .explanation-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }
        
        .explanation-title {
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        
        .explanation-title i {
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
        
        .explanation-content {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .explanation-item {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .explanation-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .explanation-item h4 {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .explanation-item h4 i {
            margin-right: 10px;
            color: #6a11cb;
            background: rgba(106, 17, 203, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        
        .explanation-item p {
            color: #555;
            line-height: 1.7;
            font-size: 15px;
            padding-left: 46px;
        }
        
        .explanation-item ul {
            padding-left: 60px;
            margin-top: 10px;
        }
        
        .explanation-item li {
            color: #555;
            line-height: 1.7;
            margin-bottom: 5px;
            font-size: 14.5px;
        }
        
        /* Footer */
        .dashboard-footer {
            text-align: center;
            padding: 20px;
            color: #95a5a6;
            font-size: 14px;
            border-top: 1px solid #eee;
            background: #f9f9f9;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-header, .dashboard-content {
                padding: 25px;
            }
            
            .tasks-grid {
                grid-template-columns: 1fr;
            }
            
            .explanation-content {
                padding: 20px;
            }
            
            .explanation-item p {
                padding-left: 0;
            }
            
            .explanation-item ul {
                padding-left: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-header h2 {
                font-size: 24px;
            }
            
            .user-name {
                font-size: 16px;
            }
            
            .explanation-item h4 {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h2>Dashboard Admin</h2>
            <p class="subtitle">Sistem Manajemen Karya dan Pengguna</p>
            
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="user-details">
                    <div class="user-name">Login sebagai: <b>{{ session('admin_name') }}</b></div>
                    <div class="user-role">Administrator Sistem</div>
                </div>
            </div>
        </header>
        
        <main class="dashboard-content">
            <h3 class="section-title">
                <i class="fas fa-tasks"></i>
                Tugas Admin
            </h3>
            
            <div class="tasks-grid">
                <div class="task-card">
                    <div class="task-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4 class="task-title">Kelola Karya (Artworks)</h4>
                    <p class="task-desc">Kelola daftar karya seni, tambah, edit, atau hapus data karya seni dari sistem.</p>
                    <a href="/admin/artworks" class="task-link">
                        Akses Panel
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="task-card">
                    <div class="task-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h4 class="task-title">Kelola Pengguna</h4>
                    <p class="task-desc">Kelola data pengguna sistem, termasuk pembuatan, edit, dan penghapusan akun.</p>
                    <a href="/admin/users" class="task-link">
                        Akses Panel
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="task-card logout-card">
                    <div class="task-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <h4 class="task-title">Keluar Sistem</h4>
                    <p class="task-desc">Keluar dari dashboard admin dan kembali ke halaman login sistem.</p>
                    <a href="/admin/logout" class="task-link">
                        Logout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="explanation-section">
                <h3 class="explanation-title">
                    <i class="fas fa-info-circle"></i>
                    Penjelasan Tugas Admin
                </h3>
                
                <div class="explanation-content">
                    <div class="explanation-item">
                        <h4>
                            <i class="fas fa-palette"></i>
                            Kelola Karya Seni (Artworks)
                        </h4>
                        <p>
                            Sebagai admin, Anda memiliki akses penuh untuk mengelola seluruh data karya seni dalam sistem. Tugas Anda meliputi:
                        </p>
                        <ul>
                            <li><strong>Menambahkan Karya Baru:</strong> Input data karya seni baru ke dalam sistem dengan detail seperti judul, deskripsi, artis, kategori, dan gambar.</li>
                            <li><strong>Mengedit Karya:</strong> Memperbarui informasi karya seni yang sudah ada, memperbaiki data, atau menambahkan informasi baru.</li>
                            <li><strong>Menghapus Karya:</strong> Menghapus karya seni yang tidak lagi relevan atau mengandung konten yang tidak sesuai.</li>
                            <li><strong>Mengelola Kategori:</strong> Mengatur kategori karya seni untuk memudahkan pengelompokan dan pencarian.</li>
                            <li><strong>Moderasi Konten:</strong> Memastikan semua karya seni mematuhi pedoman komunitas dan bebas dari konten yang tidak pantas.</li>
                        </ul>
                    </div>
                    
                    <div class="explanation-item">
                        <h4>
                            <i class="fas fa-users-cog"></i>
                            Kelola Pengguna (Users)
                        </h4>
                        <p>
                            Anda bertanggung jawab atas manajemen akun pengguna dalam sistem. Tugas-tugas yang perlu dilakukan:
                        </p>
                        <ul>
                            <li><strong>Verifikasi Akun Baru:</strong> Memverifikasi dan mengaktifkan akun pengguna baru yang mendaftar ke sistem.</li>
                            <li><strong>Edit Profil Pengguna:</strong> Membantu pengguna mengubah informasi profil mereka jika diperlukan.</li>
                            <li><strong>Reset Password:</strong> Membantu pengguna yang lupa password dengan mengatur ulang kredensial login mereka.</li>
                            <li><strong>Menonaktifkan Akun:</strong> Menonaktifkan atau menghapus akun pengguna yang melanggar aturan atau tidak aktif dalam waktu lama.</li>
                            <li><strong>Atur Level Akses:</strong> Mengatur tingkat akses pengguna (user biasa, premium, atau kontributor) sesuai kebutuhan.</li>
                            <li><strong>Pantau Aktivitas:</strong> Memantau aktivitas pengguna untuk keamanan dan analisis penggunaan sistem.</li>
                        </ul>
                    </div>
                    
                    <div class="explanation-item">
                        <h4>
                            <i class="fas fa-shield-alt"></i>
                            Keamanan dan Pemeliharaan Sistem
                        </h4>
                        <p>
                            Selain tugas utama, admin juga bertanggung jawab untuk menjaga keamanan dan kelancaran sistem:
                        </p>
                        <ul>
                            <li><strong>Backup Data:</strong> Memastikan backup data reguler untuk mencegah kehilangan informasi penting.</li>
                            <li><strong>Update Sistem:</strong> Melakukan pembaruan sistem ketika diperlukan untuk perbaikan bug atau penambahan fitur.</li>
                            <li><strong>Monitoring Server:</strong> Memantau kinerja server dan mengatasi masalah teknis yang muncul.</li>
                            <li><strong>Pelaporan:</strong> Membuat laporan bulanan mengenai aktivitas sistem, pertumbuhan pengguna, dan karya seni.</li>
                            <li><strong>Dukungan Teknis:</strong> Memberikan bantuan teknis kepada pengguna yang mengalami kesulitan menggunakan sistem.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="dashboard-footer">
            <p>© 2023 Sistem Manajemen Karya Seni. Hak Cipta Dilindungi.</p>
            <p>Dashboard Admin v2.0 | <span id="current-time">...</span></p>
        </footer>
    </div>
    
    <script>
        // Fungsi untuk update waktu
        function updateTime() {
            const now = new Date();
            
            // Format waktu
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
        }
        
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Update waktu
            updateTime();
            setInterval(updateTime, 1000);
            
            // Animasi card saat halaman dimuat
            const cards = document.querySelectorAll('.task-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            });
            
            // Animasi untuk penjelasan item
            const explanationItems = document.querySelectorAll('.explanation-item');
            setTimeout(() => {
                explanationItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(-20px)';
                    
                    setTimeout(() => {
                        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    }, 300 + (200 * index));
                });
            }, 500);
        });
        
        // Konfirmasi logout
        document.querySelector('.logout-card .task-link').addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin logout dari sistem?')) {
                e.preventDefault();
            }
        });
        
        // Efek hover untuk penjelasan item
        const explanationItems = document.querySelectorAll('.explanation-item');
        explanationItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(106, 17, 203, 0.03)';
                this.style.transition = 'background-color 0.3s ease';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    </script>
</body>
</html>