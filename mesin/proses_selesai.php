<?php
    $id = $_GET['id_barang'];
    $jumlah = $_GET['jumlah'];
    $user = $_GET['user'];

    include  "../koneksi.php";
    $sql_tiba = "UPDATE `tbl_proses` SET `status`='Pesanan Sudah Diterima',`kode`='2' WHERE id_barang=$id";
    $res_tiba = $conn->query($sql_tiba);
    if($res_tiba){
        $sql_selesai = "INSERT INTO `tbl_rating`(`id_barang`, `terjual`, `rating`, `username`) 
                        VALUES ($id,$jumlah,5,'$user')";
        $res_selesai = $conn->query($sql_selesai);
        if($res_selesai){
            echo "<script>alert('Waktunya Memberikan Rating! 😎');</script>";
            echo "<script>window.location.href='../?hal=rating'</script>";
        }else{
            echo "<script>alert('Terjadi Kesalahan Ke Rating!');</script>";
            echo "<script>window.location.href='../?hal=proses'</script>";
        }
        echo "<script>alert('Terjadi Kesalahan Saat Proses!');</script>";
        echo "<script>window.location.href='../?hal=proses'</script>";
    }
?>