<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    $sql = "SELECT * FROM anggota WHERE email='$email'";
    $result = $koneksi->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['nama'] = $row['nama'];
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}

$koneksi->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: url(https://stikeshb.ac.id/wp-content/uploads/2022/07/library-g207303354_1920.jpg) no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Transparan putih */
            padding: 60px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            position: relative; 
            overflow: hidden; 
            animation: slideIn 1.5s ease forwards;
        }
        @keyframes slideIn {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        h2 {
            margin-bottom: 25px;
            color: #333333;
            font-size: 32px;
            font-weight: 600;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
            text-align: left;
            font-weight: 500;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            transition: background-color 0.3s, border-color 0.3s;
            font-size: 16px;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            background-color: #ffffff;
            border: 1px solid #667eea;
            outline: none;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
        }
        button {
            width: 100%;
            padding: 14px 16px;
            background-color: #667eea;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        button:hover {
            background-color: #764ba2;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
        }
        .error {
            color: #e74c3c;
            margin-bottom: 20px;
            font-weight: 500;
            animation: shake 0.5s;
        }
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
        h4 {
            margin-top: 25px;
            color: #555555;
            font-size: 14px;
        }
        a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        /* Animasi gambar */
        .animation-image {
            position: absolute;
            top: -60px; 
            left: 50%;
            transform: translateX(-50%);
            animation: float 5s ease-in-out infinite;
            z-index: -1; 
            width: 200px; 
        }
        @keyframes float {
            0% { transform: translate(-50%, -20px); }
            50% { transform: translate(-50%, 20px); }
            100% { transform: translate(-50%, -20px); }
        }
        /* Responsif untuk perangkat kecil */
        @media (max-width: 450px) {
            .container {
                width: 90%;
                padding: 40px 20px;
            }
            h2 {
                font-size: 28px;
            }
            button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Perpustakaan</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form action="index.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required placeholder="Masukkan email Anda">
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="Masukkan password Anda">
            
            <button type="submit">Login</button>
        </form>
        <h4>Belum punya akun? <a href="register.php">Register</a></h4>
        
       
    </div>
</body>
</html>
