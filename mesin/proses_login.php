<?php
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    include "../koneksi.php";

    $sql_get = "SELECT * FROM `tbl_user` WHERE `username` = '$user' AND `password` = '$pass'";
    $result_get = $conn->query($sql_get);

    if ($result_get->num_rows > 0) {

        session_start();
        $_SESSION['user'] = $user;
        echo "<script>window.location.href='../index.php?hal=home'</script>";
    } else {
        echo "<script>alert('Maaf username dan password masih salah!')</script>";
        echo "<script>window.location.href='../login.php'</script>";
    }
?>