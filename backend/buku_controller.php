<?php 
    include "koneksi.php";
    include "buku.php";

    $bukuModel = new Buku();

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if (isset($_POST['action'])) { 
            switch($_POST['action']){
                case 'add';
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $bukuModel->addBuku($koneksi,$judul,$penulis,$tahun_terbit);
                    break;
                case 'update';
                    $id = $_POST['id']; //Id disini mengacu pada name="id" pada input type hidden bervalue ['buku_id'] pada buku_edit.php
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $bukuModel->updateBuku($koneksi,$id,$judul,$penulis,$tahun_terbit);
                    break;
                case 'delete';
                    $id =$_POST['id'];
                    $bukuModel->deleteBuku($koneksi,$id);
                    break;
            }
        }
    }
    
    header('location:buku_list.php');
    exit();

?>