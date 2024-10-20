<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            
            margin: 0;
            padding: 20px;
            color: #333;
            text-align: center;
            background-image: url(https://agromediagroup.com/wp-content/uploads/2020/11/pratiksha-mohanty-DRZQLqm-wk8-unsplash-1.jpg); /* Tambahkan gambar latar belakang */
            background-size: cover;
        }

        h1 {
            font-size: 2.5em;
            color: #0072ff;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.8em;
            color: #ff6f61;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            margin-top: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #ff6f61;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #e55a50;
        }

        .footer {
            margin-top: 30px;
            font-size: 1.2em;
            color: #555;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.5em;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Membaca</h1>
        <h2>Jangan Lupa Bukunya Dikembalikan!</h2>
        <a href='logout.php' class='logout-button'>Logout</a>
    </div>
    <div class="footer">
        <p>&copy; 2024 Library System | All Rights Reserved</p>
    </div>
</body>
</html>