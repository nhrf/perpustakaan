<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Peminjaman</title>
    </head>
    <body>
        <h1>Tambah Peminjaman</h1>
        <form method="post" action="peminjaman_controller.php">
            <input type="hidden" name="action" value="add">
            <label for="id_anggota">ID Anggota:</label>
                <input type="number" name="id_anggota" id="id_anggota" required><br>
            <label for="id_buku">ID Buku:</label>
                <input type="number" name="id_buku" id="id_buku" required><br>
            <input type="submit" value="pinjaman">
        </form>
    </body>
</html>