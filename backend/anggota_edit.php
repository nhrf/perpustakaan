<?php 
    include "koneksi.php";
    include "anggota.php";
    $anggotaModel = new Anggota();
    $anggota = $anggotaModel->getAnggotaById($koneksi, $_GET['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Anggota</title>
    </head>
    <body>
        <h1>Edit Anggota</h1>
        <form method="post" action="anggota_controller.php">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $anggota['anggota_id']; ?>"> <!-- ID Anggota -->

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo $anggota['nama']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $anggota['email']; ?>" required><br>

            <label for="tgl_bergabung">Tanggal Bergabung:</label>
            <input type="date" name="tgl_bergabung" id="tgl_bergabung" value="<?php echo $anggota['tgl_bergabung']; ?>" required><br>

            <label for="password">Password (kosongkan jika tidak ingin mengubah):</label>
            <input type="password" name="password" id="password"><br> <!-- Kolom untuk mengubah password -->

            <input type="submit" value="Update">
        </form>
    </body>
</html>
