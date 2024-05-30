<?php
    $namalengkap = $_POST['namalengkap'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $nomorhp = $_POST['nomor_hp'];
    $kodepos = $_POST['kodepos'];
    $alamat = $_POST['alamat'];

    include "../koneksi.php";

    $sql_add = "INSERT INTO `tbl_user`(`nama_lengkap`, `username`, `password`, `nomor_hp`, `kodepos`, `alamat`) 
                VALUES ('$namalengkap','$user','$pass','$nomorhp','$kodepos','$alamat')";
    $result_add = $conn->query($sql_add);
    if($result_add){
        echo "<script>alert('Pendaftaran Berhasil'); window.location.href = '../login.php';</script>";
    }else{
        echo "<script>alert('Pendaftaran Gagal');  window.location.href = '../daftar.php';</script>";
    }
?>