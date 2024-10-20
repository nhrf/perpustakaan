<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Buku</title>
    </head>
    <body>
        <h1>Tambah buku</h1>
        <form method="post" action="buku_controller.php">
            <input type="hidden" name="action" value="add">
            <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" required><br>
            <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" id="penulis" required><br>
            <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" required><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>