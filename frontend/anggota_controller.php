<?php 
    include "koneksi.php";
    include "anggota.php";

    $anggotaModel = new Anggota();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['action'])) {
            switch($_POST['action']){
                case 'add':
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $tgl_bergabung = date('Y-m-d');
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
                    $anggotaModel->addAnggota($koneksi, $nama, $email, $password, $tgl_bergabung);
                    break;

                case 'update':
                    $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $tgl_bergabung = $_POST['tgl_bergabung'];
                    
                    // Cek apakah ada password baru yang diisi
                    if (!empty($_POST['password'])) {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password baru
                    } else {
                        // Jika password kosong, gunakan password lama dari database
                        $anggota = $anggotaModel->getAnggotaById($koneksi, $id);
                        $password = $anggota['password']; // Password lama tetap digunakan
                    }

                    $anggotaModel->updateAnggota($koneksi, $id, $nama, $email, $password, $tgl_bergabung);
                    break;

                case 'delete':
                    $id = $_POST['id'];
                    $anggotaModel->deleteAnggota($koneksi, $id);
                    break;
            }
        }
    }

    header('Location: anggota_list.php');
    exit();

?>
