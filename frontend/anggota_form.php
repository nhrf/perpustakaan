<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Anggota</title>
    </head>
    <body>
        <h1>Tambah Anggota</h1>
        <form method="post" action="anggota_controller.php">
            <input type="hidden" name="action" value="add">
            
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required><br>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
