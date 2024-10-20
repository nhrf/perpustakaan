<?php 
    include "koneksi.php";
    include "buku.php";
    $bukuModel = new Buku();
    $buku = $bukuModel->getAllBuku($koneksi);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Buku</title>
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
                width: 80%;
                max-width: 1200px;
            }
            h1 {
                text-align: center;
                color: #333333;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th, td {
                padding: 12px;
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
            .button-container {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            .button-container a {
                padding: 10px 20px;
                text-decoration: none;
                background-color: #4CAF50;
                color: white;
                border-radius: 4px;
                transition: background-color 0.3s ease;
            }
            .button-container a:hover {
                background-color: #45a049;
            }
            form {
                display: inline;
            }
            button {
                background-color: #008CBA;
                border: none;
                color: white;
                padding: 8px 16px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover {
                background-color: #007bb5;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Daftar Buku</h1>
            <div class="button-container">
                <a href="buku_form.php">Tambah Buku</a>
                <a href="welcome.php">Back to Home</a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Action</th>
                </tr>
                <?php while ($row=$buku->fetch_assoc()): ?>
                    <tr>
                        <td> <?php echo $row['buku_id']; ?> </td>
                        <td> <?php echo $row['judul']; ?> </td>
                        <td> <?php echo $row['penulis']; ?> </td>
                        <td> <?php echo $row['tahun_terbit']; ?> </td>
                        <td>
                            <form action="buku_edit.php" method="GET"> 
                                <input type="hidden" name="id" value="<?php echo $row['buku_id']?>">
                                <button type="submit">Edit</button>
                            </form>           
                            <form action="buku_controller.php" method="post" onsubmit="return confirm('Apakah anda yakin?')"> 
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $row['buku_id']?>">
                                <button type="submit" style="background-color: #f44336;">Delete</button>
                            </form>                    
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </body>
</html>
