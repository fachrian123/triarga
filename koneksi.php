<?php
    $username = "root";
    $password = "";
    $database = "triarga";
    $host = "localhost"; 

    $conn = new mysqli($host,$username,$password,$database);

    // Cek Koneksi
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }

?>