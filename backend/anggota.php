<?php
class anggota {
    // Mendapatkan semua anggota
    public function getAllAnggota($koneksi){
        return $koneksi->query("SELECT * FROM anggota");
    }

    // Mendapatkan anggota berdasarkan ID
    public function getAnggotaById($koneksi, $id){
        $stmt = $koneksi->prepare("SELECT * FROM anggota WHERE anggota_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Menambahkan anggota baru dengan password
    public function addAnggota($koneksi, $nama, $email, $password, $tgl_bergabung){
        $stmt = $koneksi->prepare("INSERT INTO anggota (nama, email, password, tgl_bergabung) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $password, $tgl_bergabung);
        return $stmt->execute();
    }
    

    // Memperbarui data anggota, termasuk password
    public function updateAnggota($koneksi, $id, $nama, $email, $password, $tgl_bergabung){
        // Hash password baru
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $koneksi->prepare("UPDATE anggota SET nama=?, email=?, password=?, tgl_bergabung=? WHERE anggota_id=?");
        $stmt->bind_param("ssssi", $nama, $email, $hashed_password, $tgl_bergabung, $id);
        return $stmt->execute();
    }

    // Menghapus anggota berdasarkan ID
    public function deleteAnggota($koneksi, $id) {
        // Hapus peminjaman yang terkait (jika tidak menggunakan ON DELETE CASCADE)
        $koneksi->query("DELETE FROM peminjaman WHERE id_anggota = $id");
        
        $stmt = $koneksi->prepare("DELETE FROM anggota WHERE anggota_id=?");
        $stmt->bind_param("i", $id);
        
        if (!$stmt->execute()) {
            // Tangani kesalahan di sini
            echo "Gagal menghapus anggota: " . $stmt->error;
        }
        return $stmt->execute();
        }
}
?>

