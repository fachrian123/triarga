<?php
    $id = $_GET['id'];

    include "../../koneksi.php";
    $sql_hapus = "DELETE FROM `tbl_barang` WHERE id_barang = $id";
    $result = $conn->query($sql_hapus);
    if($result){
        echo "<script>alert('Barang Berhasil Dihapus'); window.location.href = '../index.php?hal=barang';</script>";
    }else{
        echo "<script>alert('Barang Gagal Dihapus');  window.location.href = '../index.php?hal=barang';</script>";
    }
?>