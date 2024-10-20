<?php 
    include "koneksi.php";
    include "buku.php";
    $bukuModel = new Buku();
    $buku = $bukuModel->getbukuById($koneksi,$_GET['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Buku</title>
    </head>
    <body>
        <h1>Edit Buku</h1>
        <form method="post" action="buku_controller.php">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $buku['buku_id']; ?>">
            <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="<?php echo $buku['judul']; ?>" required><br>
            <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" id="penulis" value="<?php echo $buku['penulis']; ?>" required><br>
            <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required><br>
            <input type="submit" value="Update Buku">
        </form>
    </body>
</html>