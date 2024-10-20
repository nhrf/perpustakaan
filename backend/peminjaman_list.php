<?php
    include "koneksi.php";
    include "peminjaman.php";

    $peminjamanModel = new Peminjaman();
    $peminjaman = $peminjamanModel->getAllPeminjaman($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            overflow-y: auto;
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            width: 90%;
            max-width: 1200px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            margin-bottom: 20px;
            display: inline-block;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #45a049;
        }
        button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 5px;
        }
        button:hover {
            background-color: #007bb5;
        }
        .delete-button {
            background-color: #f44336;
        }
        .delete-button:hover {
            background-color: #d32f2f;
        }
        .return-button {
            background-color: #4CAF50;
        }
        .return-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Peminjaman</h1>
        <a href="welcome.php">Back to Home</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $peminjaman->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['peminjaman_id']; ?></td>
                    <td><?php echo $row['nama_anggota']; ?></td>
                    <td><?php echo $row['judul_buku']; ?></td>
                    <td><?php echo $row['tgl_pinjam']; ?></td>
                    <td><?php echo $row['tgl_kembali']; ?></td>
                    <td>
                        <form action="peminjaman_edit.php" method="GET" style="display:inline;"> 
                            <input type="hidden" name="id" value="<?php echo $row['peminjaman_id']?>">
                            <button type="submit">Edit</button>
                        </form>
                        <form action="peminjaman_controller.php" method="post" style="display:inline;" onsubmit="return confirm('Apakah anda yakin?')"> 
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['peminjaman_id']?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                        <?php if (is_null($row['tgl_kembali'])): ?>
                            <form action="peminjaman_controller.php" method="post" style="display:inline;" onsubmit="return confirm('Kembalikan buku?')">
                                <input type="hidden" name="action" value="return">
                                <input type="hidden" name="id" value="<?php echo $row['peminjaman_id']; ?>">
                                <button type="submit" class="return-button">Kembalikan</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
