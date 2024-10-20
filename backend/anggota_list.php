<?php
    include "koneksi.php";
    include "anggota.php";

    $anggotaModel = new Anggota();
    $anggota = $anggotaModel->getAllAnggota($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .actions a {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #555;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            padding: 8px 12px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2ecc71;
        }

        .delete {
            background-color: #e74c3c;
        }

        .delete:hover {
            background-color: #c0392b;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Anggota</h1>

        <div class="actions">
            <a href="anggota_form.php">Tambah Anggota</a>
            <a href="welcome.php">Back to Home</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Tanggal Bergabung</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $anggota->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['anggota_id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['tgl_bergabung']; ?></td>
                        <td>
                            <form action="anggota_edit.php" method="GET" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['anggota_id']?>">
                                <button type="submit">Edit</button>
                            </form>
                            <form action="anggota_controller.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $row['anggota_id']?>">
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <footer>
            <p>&copy; 2024 Library System</p>
        </footer>
    </div>
</body>
</html>
