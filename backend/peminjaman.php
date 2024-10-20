<?php 
    class peminjaman{
        public function getAllPeminjaman($koneksi){
            return $koneksi->query("SELECT p.*, a.nama AS nama_anggota, b.judul AS judul_buku 
            FROM peminjaman p JOIN anggota a ON p.id_anggota=a.anggota_id JOIN buku b on p.id_buku=b.buku_id");
        }

        public function getPeminjamanById($koneksi,$id){
            $stmt = $koneksi->prepare("SELECT p.*, a.nama AS nama_anggota, b.judul AS judul_buku 
            FROM peminjaman p JOIN anggota a ON p.id_anggota=a.anggota_id JOIN buku b on p.id_buku=b.buku_id WHERE peminjaman_id=?");
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $result=$stmt->get_result();
            return $result->fetch_assoc();
        }

        public function addPeminjaman($koneksi,$id_anggota,$id_buku,$tgl_pinjam,$tgl_kembali){
            $stmt = $koneksi->prepare("INSERT INTO peminjaman (id_anggota,id_buku,tgl_pinjam,tgl_kembali) VALUES (?,?,?,?)");
            $stmt->bind_param("iiss", $id_anggota,$id_buku,$tgl_pinjam,$tgl_kembali);
            return $stmt->execute();
        }

        public function updatePeminjaman($koneksi,$id,$id_anggota,$id_buku,$tgl_pinjam,$tgl_kembali){
            $stmt = $koneksi->prepare("UPDATE peminjaman SET id_anggota=?,id_buku=?,tgl_pinjam=?,tgl_kembali=? WHERE peminjaman_id=?");
            $stmt->bind_param("iissi", $id_anggota,$id_buku,$tgl_pinjam,$tgl_kembali,$id);
            return $stmt->execute();
        }

        public function deletePeminjaman($koneksi,$id){
            $stmt = $koneksi->prepare("DELETE FROM peminjaman WHERE peminjaman_id=?");
            $stmt->bind_param("i",$id);
            return $stmt->execute();
        }
        
        public function pengembalianPinjaman($koneksi,$id){
            $tgl_kembali=date("Y-m-d"); //Mengambil current date dengan format (Year-Month-Day)
            $stmt=$koneksi->prepare("UPDATE peminjaman SET tgl_kembali=? WHERE peminjaman_id=?");
            $stmt->bind_param("si",$tgl_kembali,$id);
            return $stmt->execute();
        }
    }
?>