<?php 
    session_start();

    // Hapus semua variabel sesi
    $_SESSION = array();

    // Hapus sesi
    session_destroy();

    // Redirect ke halaman login atau halaman lainnya jika diinginkan
    header("location: login.php");
    exit;

?>