<?php
    $namalengkap = $_POST['namalengkap'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $nomorhp = $_POST['nomor_hp'];
    $kodepos = $_POST['kodepos'];
    $alamat = $_POST['alamat'];

    include "../koneksi.php";

    $sql_edit = "UPDATE `tbl_user` SET `nama_lengkap`='$namalengkap',`username`='$user',`password`='$pass',
                `nomor_hp`='$nomorhp',`kodepos`='$kodepos',`alamat`='$alamat' WHERE `username`='$user'";
    $result_edit = $conn->query($sql_edit);
    if($result_edit){
        echo "<script>alert('Perubahan Berhasil'); window.location.href = '../index.php?hal=edit&user=". $user ."';</script>";
    }else{
        echo "<script>alert('Perubahan Gagal');  window.location.href = '../index.php?hal=edit&user=". $user ."';</script>";
    }
?>