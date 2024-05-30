<?php
    $id = $_POST['id'];
    $fotodepan = $_POST['foto'];
    $fotobelakang = $_POST['foto_belakang'];
    $namabarang = $_POST['nama_barang'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $detail = $_POST['detail'];
    $kategori = $_POST['kategori'];

    include "../../koneksi.php";

    $sql_ubah = "UPDATE `tbl_barang` SET `kategori`='$kategori',`foto_barang`='$fotodepan',
    `foto_barang_belakang`='$fotobelakang',`nama_barang`='$namabarang',`ukuran_barang`='$ukuran',`harga_barang`='$harga',
    `stok_barang`='$stok',`detail_barang`='$detail' WHERE `id_barang` = $id";
    $result = $conn->query($sql_ubah);
    if($result){
        echo "<script>alert('Perubahan Berhasil'); window.location.href = '../index.php?hal=barang';</script>";
    }else{
        echo "<script>alert('Perubahan Gagal');  window.location.href = '../index.php?hal=barang';</script>";
    }
?>