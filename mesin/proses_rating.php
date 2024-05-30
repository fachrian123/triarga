<?php
    $bintang = $_POST['bintang'];
    $id = $_POST['id'];
    $user = $_POST['user'];

    include "../koneksi.php";

    $sql_rating = "UPDATE `tbl_rating` SET `rating`='$bintang' WHERE `username`='$user' AND `id_rating`='$id'";
    $result_rating = $conn->query($sql_rating);
    if ($result_rating){
        echo "<script>alert('Rating berhasil diubah');</script>";
        echo "<script>window.location.href='../?hal=rating'</script>";
    }else{
        echo "<script>alert('Rating GAGAL diubah');</script>";
        echo "<script>window.location.href='../?hal=rating'</script>";
    }
?>