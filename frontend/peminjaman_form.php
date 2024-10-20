<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #ff6f61, #de4e7b);
            margin: 0;
            padding: 20px;
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            text-align: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            font-size: 36px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: fadeIn 2s ease-in-out;
            background-image: url('https://img.icons8.com/emoji/2x/open-book-emoji.png'); /* Fun book image */
            background-size: cover; /* Cover the container */
            background-position: center; /* Center the image */
            opacity: 0.8; /* Slight transparency */
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            font-size: 16px;
        }

        input[type="number"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s, background-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #ff6f61;
            background-color: #f9f9f9;
        }

        input[type="submit"] {
            background-color: #0072ff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Animasi gambar */
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .animated-image {
            position: absolute;
            top: -80px;
            right: -50px;
            width: 150px;
            height: auto;
            animation: slideIn 1.5s ease-in-out;
        }

        /* Desain responsif */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            input[type="number"],
            input[type="submit"] {
                font-size: 14px;
            }

            .animated-image {
                top: -60px;
                right: -30px;
                width: 120px;
            }
        }
    </style>
</head>
<body>
    <h1>Tambah Peminjaman</h1>
    <div class="container">
        <form method="post" action="peminjaman_controller.php">
            <input type="hidden" name="action" value="add">
            <label for="id_anggota">ID Anggota:</label>
            <input type="number" name="id_anggota" id="id_anggota" required>
            
            <label for="id_buku">ID Buku:</label>
            <input type="number" name="id_buku" id="id_buku" required>
            
            <input type="submit" value="Pinjam">
        </form>

        <!-- Gambar animasi sebagai dekorasi -->
        <img src="https://img.icons8.com/plasticine/2x/book.png" alt="Books Animation" class="animated-image">
    </div>
</body>
</html>
