<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']); 
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    // Hashing password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Mendapatkan tanggal bergabung (hari ini)
    $tgl_bergabung = date('Y-m-d');
    
    // Periksa apakah email sudah terdaftar
    $sql = "SELECT * FROM anggota WHERE email='$email'";
    $result = $koneksi->query($sql);
    
    if ($result->num_rows > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        // Menyimpan data pengguna baru
        $sql = "INSERT INTO anggota (nama, email, password, tgl_bergabung) VALUES ('$nama', '$email', '$hashed_password', '$tgl_bergabung')";
        if ($koneksi->query($sql) === TRUE) {
            $success = "Pendaftaran berhasil!";
            header("Location: index.php");
        } else {
            $error = "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}

$koneksi->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 400px;
            text-align: center;
            animation: slideUp 1s ease-in-out forwards;
            opacity: 0;
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
            animation: zoomIn 1.2s ease forwards;
        }
        @keyframes zoomIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            text-align: left;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            background-color: #fff;
            border-color: #f093fb;
            outline: none;
            transform: scale(1.03);
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #f5576c;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #e84393;
            box-shadow: 0 5px 15px rgba(255, 87, 136, 0.4);
            transform: translateY(-2px);
        }
        .error {
            color: red;
            margin-bottom: 20px;
            animation: shake 0.5s;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }
        .success {
            color: green;
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }
        h4 {
            margin-top: 20px;
            color: #666;
        }
        a {
            color: #f093fb;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #e84393;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="success"><?= $success; ?></div>
        <?php endif; ?>
        <form action="register.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <h4>Sudah punya akun? <a href="index.php">Login</a></h4>
    </div>
</body>
</html>
