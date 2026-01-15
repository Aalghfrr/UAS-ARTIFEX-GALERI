<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 6px;
            max-width: 600px;
        }
        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #0066cc;
        }
        .logout {
            margin-top: 20px;
            color: red;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Dashboard Admin</h2>

    <p>
        Login sebagai:
        <b>{{ session('admin_name') }}</b>
    </p>

    <hr>

    <h4>Menu Admin</h4>
    <a href="/admin/galeri">Kelola Galeri</a>
    <a href="/admin/galeri/create">Tambah Galeri</a>

    <a href="/admin/logout" class="logout">Logout</a>
</div>

</body>
</html>
