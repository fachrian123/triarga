<?php
    $id = $_GET['id'];

    include "../../koneksi.php";
    $sql_hapus = "DELETE FROM `tbl_user` WHERE id_user = $id";
    $result = $conn->query($sql_hapus);
    if($result){
        echo "<script>alert('Data Berhasil Dihapus!'); window.location.href = '../index.php?hal=user';</script>";
    }else{
        echo "<script>alert('Data Gagal Dihapus!');  window.location.href = '../index.php?hal=user';</script>";
    }
?>