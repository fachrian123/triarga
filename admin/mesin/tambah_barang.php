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
    $sql_tambah = "INSERT INTO `tbl_barang`(`kategori`, `foto_barang`, `foto_barang_belakang`, `nama_barang`, `ukuran_barang`, `harga_barang`, `stok_barang`, `detail_barang`) 
    VALUES ('$kategori','$fotodepan','$fotobelakang','$namabarang','$ukuran',$harga,$stok,'$detail')";
    $result = $conn->query($sql_tambah);
    if($result){
        echo "<script>alert('Barang Berhasil Ditambah'); window.location.href = '../index.php?hal=barang';</script>";
    }else{
        echo "<script>alert('Barang Gagal Ditambah');  window.location.href = '../index.php?hal=barang';</script>";
    }
?>