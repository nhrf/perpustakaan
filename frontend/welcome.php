<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: 
                
                url(https://stikeshb.ac.id/wp-content/uploads/2022/07/library-g207303354_1920.jpg); /* Gambar latar belakang */
            background-size: cover; /* Menyusun ulang ukuran gambar agar sesuai */
            background-position: center; /* Mengatur posisi gambar di tengah */
            color: #f1f1f1; /* Warna teks putih lembut */
            text-align: center; /* Teks di tengah */
            animation: fadeIn 1s ease-in-out; /* Animasi muncul saat load */
        }

        .container {
            max-width: 900px;
            margin: 100px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        h1 {
            margin-top: 0;
            font-size: 40px;
            color: #007BFF;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            animation: fadeIn 2s ease-in-out;
        }

        p {
            margin: 20px 0;
            font-size: 20px;
            color: #555;
        }

        a {
            color: #ffffff;
            background-color: #007BFF;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            font-size: 18px;
            display: inline-block;
            margin: 20px;
        }

        a:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.6);
        }

        /* Gambar animasi */
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .animated-image {
            width: 200px;
            position: absolute;
            top: -100px;
            right: -100px;
            animation: slideIn 2s ease-in-out;
        }

        footer {
            margin-top: 50px;
            font-size: 16px;
            color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Library: Your Gateway to Knowledge and Imagination!</h1>
        <p><a href="daftar_buku.php">Daftar Buku</a></p>
        <p><a href="peminjaman_form.php">Pinjam Buku</a></p>
        <p><a href='logout.php' class='logout-button'>Logout</a></p>
        
        <!-- Gambar animasi -->
        <img src="https://img.icons8.com/plasticine/2x/book.png" alt="Book Animation" class="animated-image">
    </div>
    <footer>
        &copy; 2024 Library System. All rights reserved.
    </footer>
</body>
</html>
