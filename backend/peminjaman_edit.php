<?php 
    include "koneksi.php";
    include "peminjaman.php";
    $peminjamanModel = new Peminjaman();
    $peminjaman = $peminjamanModel->getPeminjamanById($koneksi,$_GET['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Peminjaman</title>
    </head>
    <body>
        <h1>Edit Peminjaman</h1>
        <form method="post" action="peminjaman_controller.php">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $peminjaman['peminjaman_id']; ?>">
            <label for="id_anggota">ID Anggota:</label>
                <input type="number" name="id_anggota" id="id_anggota" value="<?php echo $peminjaman['id_anggota']; ?>" required><br>
            <label for="id_buku">ID Buku:</label>
                <input type="number" name="id_buku" id="id_buku" value="<?php echo $peminjaman['id_buku']; ?>" required><br>
            <label for="tgl_pinjam">Tanggal Peminjaman:</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $peminjaman['tgl_pinjam']; ?>" required><br>
            <label for="tgl_kembali">Tanggal Pengembalian:</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" value="<?php echo $peminjaman['tgl_kembali']; ?>"><br>           
            <input type="submit" value="Update Peminjaman">
        </form>
    </body>
</html>