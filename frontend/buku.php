<?php
class buku{
    public function getAllBuku($koneksi){
        return $koneksi->query("SELECT * FROM buku");
    }

    public function getBukuById($koneksi, $id){
        $stmt = $koneksi->prepare("SELECT * FROM buku WHERE buku_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();

        return $result->fetch_assoc();
    }

    public function addBuku($koneksi,$judul,$penulis,$tahun_terbit){
        $stmt = $koneksi->prepare("INSERT INTO buku(judul,penulis,tahun_terbit) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $judul,$penulis,$tahun_terbit);
        return $stmt->execute();
    }

    public function updateBuku($koneksi,$id,$judul,$penulis,$tahun_terbit){
        $stmt=$koneksi->prepare("UPDATE buku SET judul=?, penulis=?,tahun_terbit=? WHERE buku_id=?");
        $stmt->bind_param("ssii", $judul,$penulis,$tahun_terbit,$id);
        return $stmt->execute();
    }

    public function deleteBuku($koneksi,$id){
        $stmt=$koneksi->prepare("DELETE FROM buku WHERE buku_id=?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}
    
?>