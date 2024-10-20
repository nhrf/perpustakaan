<?php 
    include "koneksi.php";
    include "peminjaman.php";

    $peminjamanModel = new Peminjaman();

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if (isset($_POST['action'])) { 
            switch($_POST['action']){
                case 'add';
                    $id_anggota = $_POST['id_anggota'];
                    $id_buku = $_POST['id_buku'];
                    $tgl_pinjam =date('y-m-d');
                    $peminjamanModel->addPeminjaman($koneksi,$id_anggota,$id_buku,$tgl_pinjam,null);
                    break;
                case 'update';
                    $id = $_POST['id'];
                    $id_anggota = $_POST['id_anggota'];
                    $id_buku = $_POST['id_buku'];
                    $tgl_pinjam = $_POST['tgl_pinjam'];
                    $tgl_kembali =$_POST['tgl_kembali'];
                    if (empty($tgl_kembali))
                        $peminjamanModel->updatePeminjaman($koneksi,$id,$id_anggota,$id_buku,$tgl_pinjam,null);
                    else
                        $peminjamanModel->updatePeminjaman($koneksi,$id,$id_anggota,$id_buku,$tgl_pinjam,$tgl_kembali);
                    break;
                case 'delete';
                    $id =$_POST['id'];
                    $peminjamanModel->deletePeminjaman($koneksi,$id);
                    break;
                case 'return';
                    $id = $_POST['id'];
                    $peminjamanModel->pengembalianPinjaman($koneksi,$id);
                    break;
            }
        }
    }
    
    header('location:berhasil.php');
    exit();

?>