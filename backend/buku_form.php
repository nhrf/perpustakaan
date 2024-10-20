<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #333333;
        }
        label {
            margin: 10px 0 5px;
            display: block;
            color: #555555;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Buku</h1>
        <form method="post" action="buku_controller.php">
            <input type="hidden" name="action" value="add">

            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>

            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" id="penulis" required>

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
