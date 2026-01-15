<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>👥 Manajemen Pengguna - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8B5CF6;
            --primary-dark: #7C3AED;
            --primary-light: #C4B5FD;
            --secondary: #10B981;
            --danger: #EF4444;
            --warning: #F59E0B;
            --info: #3B82F6;
            --dark: #1F2937;
            --light: #F9FAFB;
            --gray: #6B7280;
            --card-bg: #FFFFFF;
            --shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            --gradient: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);
            --border: 1px solid #E5E7EB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--dark);
            padding: 30px;
        }

        /* Container */
        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
        }

        /* Header */
        .admin-header {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px 40px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-left: 5px solid var(--primary);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .header-title h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .header-subtitle {
            color: var(--gray);
            font-size: 0.95rem;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: var(--border);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
        }

        .stat-icon.total {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }

        .stat-icon.active {
            background: linear-gradient(135deg, var(--secondary), #059669);
        }

        .stat-icon.premium {
            background: linear-gradient(135deg, var(--warning), #D97706);
        }

        .stat-icon.new {
            background: linear-gradient(135deg, var(--info), #2563EB);
        }

        .stat-info h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .stat-info p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        /* Main Content */
        .content-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
            border: var(--border);
        }

        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(139, 92, 246, 0.1);
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-title i {
            color: var(--primary);
            background: rgba(139, 92, 246, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Search and Filter */
        .table-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 20px;
        }

        .search-box {
            flex: 1;
            max-width: 400px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            z-index: 2;
        }

        .search-box input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid #E5E7EB;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s;
            background: var(--light);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
        }

        .filter-actions {
            display: flex;
            gap: 15px;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
            border-radius: 15px;
            border: var(--border);
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .users-table thead {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        .users-table th {
            padding: 22px 20px;
            text-align: left;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .users-table th i {
            margin-right: 10px;
        }

        .users-table tbody tr {
            border-bottom: 1px solid #E5E7EB;
            transition: all 0.3s ease;
        }

        .users-table tbody tr:hover {
            background-color: rgba(139, 92, 246, 0.05);
        }

        .users-table td {
            padding: 22px 20px;
            vertical-align: middle;
        }

        /* User Avatar */
        .user-cell {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        .avatar-color-1 { background: linear-gradient(135deg, #8B5CF6, #7C3AED); }
        .avatar-color-2 { background: linear-gradient(135deg, #10B981, #059669); }
        .avatar-color-3 { background: linear-gradient(135deg, #3B82F6, #2563EB); }
        .avatar-color-4 { background: linear-gradient(135deg, #F59E0B, #D97706); }
        .avatar-color-5 { background: linear-gradient(135deg, #EC4899, #DB2777); }

        .user-info {
            line-height: 1.4;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.05rem;
        }

        .user-email {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* User Role Badge */
        .user-role {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .role-admin {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .role-user {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .role-premium {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 0.95rem;
            text-decoration: none;
        }

        .btn-sm {
            padding: 10px 16px;
            font-size: 0.9rem;
        }

        .btn-edit {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .btn-edit:hover {
            background: var(--info);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: var(--danger);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-view {
            background: rgba(16, 185, 129, 0.1);
            color: var(--secondary);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .btn-view:hover {
            background: var(--secondary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-add {
            background: var(--gradient);
            color: white;
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
        }

        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #E5E7EB;
        }

        .page-link {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light);
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .page-link:hover,
        .page-link.active {
            background: var(--gradient);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.3);
        }

        /* No Data */
        .no-data {
            text-align: center;
            padding: 60px 40px;
            color: var(--gray);
        }

        .no-data i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #E5E7EB;
        }

        .no-data h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        /* Footer */
        .admin-footer {
            text-align: center;
            padding: 25px;
            color: white;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .admin-container {
                padding: 20px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .admin-header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .header-left {
                flex-direction: column;
                text-align: center;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .table-controls {
                flex-direction: column;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .action-buttons {
                flex-wrap: wrap;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .content-card {
                padding: 25px;
            }
            
            .users-table th,
            .users-table td {
                padding: 15px 10px;
            }
            
            .user-cell {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Header -->
        <div class="admin-header">
            <div class="header-left">
                <div class="header-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="header-title">
                    <h1>Manajemen Pengguna</h1>
                    <p class="header-subtitle">Kelola semua pengguna sistem dengan mudah</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="/admin/dashboard" class="btn btn-view">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3 id="totalUsers">{{ count($users) }}</h3>
                    <p>Total Pengguna</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3 id="activeUsers">{{ count($users) }}</h3>
                    <p>Pengguna Aktif</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon premium">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="stat-info">
                    <h3 id="premiumUsers">0</h3>
                    <p>Pengguna Premium</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon new">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div class="stat-info">
                    <h3 id="newUsers">0</h3>
                    <p>Pengguna Baru (30 Hari)</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-card">
            <div class="content-header">
                <h2 class="section-title">
                    <i class="fas fa-list"></i>
                    Daftar Pengguna
                </h2>
                
                <div class="table-controls">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari pengguna berdasarkan nama atau email...">
                    </div>
                    
                    <div class="filter-actions">
                        <select class="btn btn-sm" style="background: var(--light); border: var(--border); color: var(--dark); padding: 10px 15px;">
                            <option value="all">Semua Pengguna</option>
                            <option value="admin">Admin</option>
                            <option value="user">User Biasa</option>
                            <option value="premium">Premium</option>
                        </select>
                        <button class="btn btn-sm" style="background: var(--light); border: var(--border); color: var(--dark);">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user"></i> Pengguna</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-user-tag"></i> Role</th>
                            <th><i class="fas fa-calendar"></i> Bergabung</th>
                            <th><i class="fas fa-cogs"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $u)
                        <tr>
                            <td style="font-weight: 600; color: var(--primary);">#{{ str_pad($u->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <div class="user-cell">
                                    <div class="user-avatar avatar-color-{{ ($index % 5) + 1 }}">
                                        {{ substr($u->name, 0, 2) }}
                                    </div>
                                    <div class="user-info">
                                        <div class="user-name">{{ $u->name }}</div>
                                        <div class="user-id" style="font-size: 0.8rem; color: var(--gray);">ID: USER-{{ $u->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="user-email">
                                    <i class="fas fa-envelope" style="margin-right: 8px; color: var(--primary-light);"></i>
                                    {{ $u->email }}
                                </div>
                            </td>
                            <td>
                                <span class="user-role {{ $u->id == 1 ? 'role-admin' : 'role-user' }}">
                                    <i class="fas {{ $u->id == 1 ? 'fa-shield-alt' : 'fa-user' }}"></i>
                                    {{ $u->id == 1 ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>
                                <div style="color: var(--gray); font-size: 0.9rem;">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px; color: var(--primary-light);"></i>
                                    {{ date('d M Y', strtotime($u->created_at ?? now())) }}
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="/admin/users/edit/{{ $u->id }}" class="btn btn-sm btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/admin/users/delete/{{ $u->id }}" 
                                       class="btn btn-sm btn-delete"
                                       onclick="return confirmDelete({{ $u->id }}, '{{ $u->name }}')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                    <a href="/admin/users/view/{{ $u->id }}" class="btn btn-sm btn-view">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if(count($users) == 0)
                <div class="no-data">
                    <i class="fas fa-user-slash"></i>
                    <h3>Tidak Ada Pengguna</h3>
                    <p>Belum ada pengguna yang terdaftar dalam sistem.</p>
                    <a href="/admin/users/create" class="btn btn-add" style="margin-top: 20px;">
                        <i class="fas fa-user-plus"></i> Tambah Pengguna Pertama
                    </a>
                </div>
                @endif
            </div>

            <!-- Pagination (Example) -->
            @if(count($users) > 0)
            <div class="pagination">
                <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">4</a>
                <a href="#" class="page-link">5</a>
                <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
            </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="admin-footer">
            <p>© 2024 Admin Dashboard • Sistem Manajemen Pengguna v2.0</p>
            <p style="font-size: 0.9rem; opacity: 0.8; margin-top: 5px;">
                <i class="fas fa-shield-alt"></i> Dilindungi & Terenkripsi
            </p>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.users-table tbody tr');
            
            rows.forEach(row => {
                const name = row.querySelector('.user-name').textContent.toLowerCase();
                const email = row.querySelector('.user-email').textContent.toLowerCase();
                
                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = '';
                    row.style.animation = 'slideIn 0.3s ease-out';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Confirm delete
        function confirmDelete(userId, userName) {
            return Swal.fire({
                title: 'Hapus Pengguna?',
                html: `Anda yakin ingin menghapus <strong>${userName}</strong>?<br><br>
                      <small style="color: var(--danger);">
                          <i class="fas fa-exclamation-triangle"></i> 
                          Tindakan ini tidak dapat dibatalkan. Semua data pengguna akan dihapus permanen.
                      </small>`,
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
                    // Show loading state
                    Swal.fire({
                        title: 'Menghapus...',
                        html: 'Sedang menghapus pengguna dari sistem',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Simulate API call
                    setTimeout(() => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: `Pengguna ${userName} telah dihapus`,
                            icon: 'success',
                            confirmButtonColor: '#10B981'
                        }).then(() => {
                            // Redirect to users list (refresh page)
                            window.location.reload();
                        });
                    }, 1500);
                    
                    return true;
                }
                return false;
            });
        }

        // Load SweetAlert if not present
        if (typeof Swal === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
            document.head.appendChild(script);
        }

        // Update stats with random data (simulation)
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate loading stats
            setTimeout(() => {
                const total = {{ count($users) }};
                document.getElementById('activeUsers').textContent = total;
                document.getElementById('premiumUsers').textContent = Math.floor(total * 0.3);
                document.getElementById('newUsers').textContent = Math.floor(total * 0.2);
            }, 500);

            // Add row hover effects
            const rows = document.querySelectorAll('.users-table tbody tr');
            rows.forEach((row, index) => {
                // Staggered animation
                row.style.animationDelay = `${index * 0.05}s`;
                row.style.animation = 'slideIn 0.4s ease-out forwards';
                row.style.opacity = '0';
                
                // Add click effect
                row.addEventListener('click', function(e) {
                    if (!e.target.closest('.action-buttons')) {
                        this.style.backgroundColor = 'rgba(139, 92, 246, 0.08)';
                        setTimeout(() => {
                            this.style.backgroundColor = '';
                        }, 300);
                    }
                });
            });
        });

        // Export functionality (example)
        function exportUsers(format) {
            Swal.fire({
                title: 'Mengekspor Data',
                text: `Sedang mengekspor data pengguna dalam format ${format.toUpperCase()}...`,
                icon: 'info',
                timer: 2000,
                showConfirmButton: false
            });
            
            setTimeout(() => {
                Swal.fire({
                    title: 'Berhasil!',
                    text: `Data berhasil diekspor dalam format ${format.toUpperCase()}`,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }, 2000);
        }

        // Quick actions
        function toggleUserStatus(userId, currentStatus) {
            Swal.fire({
                title: 'Ubah Status',
                text: `Ubah status pengguna menjadi ${currentStatus ? 'tidak aktif' : 'aktif'}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, Ubah'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulate API call
                    const statusBtn = document.querySelector(`[data-user="${userId}"] .status-badge`);
                    if (statusBtn) {
                        const newStatus = !currentStatus;
                        statusBtn.textContent = newStatus ? 'Aktif' : 'Nonaktif';
                        statusBtn.className = `status-badge ${newStatus ? 'role-user' : 'role-premium'}`;
                        
                        Swal.fire(
                            'Berhasil!',
                            `Status pengguna telah diubah`,
                            'success'
                        );
                    }
                }
            });
        }
    </script>
</body>
</html>