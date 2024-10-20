<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .container h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container p {
            margin: 10px 0;
        }

        .container a {
            display: inline-block;
            width: 100%;
            padding: 12px 0;
            margin: 10px 0;
            text-decoration: none;
            font-size: 16px;
            color: white;
            background-color: #2980b9;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .container a:hover {
            background-color: #3498db;
        }

        .container a.logout {
            background-color: #e74c3c;
        }

        .container a.logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kelola Perpustakaan</h1>
        <p><a href="anggota_list.php">Manage Members</a></p>
        <p><a href="buku_list.php">Manage Books</a></p>
        <p><a href="peminjaman_list.php">Tabel Peminjaman</a></p>
        <p><a href="logout.php" class="logout">Logout</a></p>
    </div>
</body>
</html>
