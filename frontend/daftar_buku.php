<?php 
    include "koneksi.php";
    include "buku.php";
    $bukuModel = new Buku();
    $buku = $bukuModel->getAllBuku($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: 
                
                url(https://mislanguageschool.co.id/assets/img/artikel/f281c579969ab01f6da96df8cbd90fad.png); /* Gambar latar belakang */
            background-size: cover; /* Menyusun ulang ukuran gambar agar sesuai */
            background-position: center; /* Mengatur posisi gambar di tengah */
            margin: 0;
            padding: 20px;
            color: #333;
            animation: fadeIn 1s ease-in-out; /* Animasi fade in */
        }

        h1 {
            text-align: center;
            color: black;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Bayangan pada teks */
            margin-bottom: 20px;
            font-size: 36px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi hover */
            position: relative;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #ff6f61;
            padding: 12px 18px;
            border-radius: 5px;
            margin: 10px 5px;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 18px;
        }

        a:hover {
            background-color: #ff4f3d;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            animation: fadeIn 2s ease-in-out;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0072ff;
            color: white;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                padding: 20px;
            }

            a {
                padding: 10px 15px;
                font-size: 16px;
            }

            table, th, td {
                font-size: 14px;
            }
        }

        /* Animation for image */
        @keyframes slideIn {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .animated-image {
            position: absolute;
            top: -80px;
            right: -40px;
            width: 150px;
            height: auto;
            animation: slideIn 2s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Buku</h1>
        <div>
            <a href="peminjaman_form.php">Pinjam Buku</a>
            <a href="welcome.php">Kembali</a>
        </div>

        <!-- Gambar animasi sebagai dekorasi -->
        <img src="https://img.icons8.com/clouds/2x/books.png" alt="Books Animation" class="animated-image">

        <table>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
            </tr>
            <?php while ($row = $buku->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['buku_id']; ?></td>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['penulis']; ?></td>
                    <td><?php echo $row['tahun_terbit']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
