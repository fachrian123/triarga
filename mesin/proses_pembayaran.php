<?php

$user = $_POST['user']; 
$pembeli = $_POST['pembeli']; 
$id_barang = $_POST['id_barang']; 
$nama_barang = $_POST['nama_barang'];  
$jumlah = $_POST['jumlah_barang']; 
$total = $_POST['total_bayar'];   
$alamat = $_POST['alamat_pengiriman']; 
$kodepos = $_POST['kodepos'];

include "../koneksi.php";

// Pastikan form di HTML menggunakan method="post" dan memiliki enctype="multipart/form-data"
if (isset($_FILES["bukti_transaksi"])) {
    $targetDir = "../img/"; // Nama folder tempat menyimpan file
    $targetFile = $targetDir . basename($_FILES["bukti_transaksi"]["name"]); // Path lengkap ke file yang akan disimpan
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Periksa apakah file gambar yang valid
    $check = getimagesize($_FILES["bukti_transaksi"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar. Silakan unggah file gambar.";
        $uploadOk = 0;
    }

    // Periksa ukuran file
    if ($_FILES["bukti_transaksi"]["size"] > 500000) {
        echo "Maaf, ukuran file harus di bawah 500KB.";
        $uploadOk = 0;
    }

    // Periksa jenis file
    if (!in_array($imageFileType, array("jpg", "jpeg", "png"))) {
        echo "Maaf, hanya file JPEG, JPG, atau PNG yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Jika tidak ada masalah, coba unggah file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["bukti_transaksi"]["tmp_name"], $targetFile)) {
            $fileName = basename($_FILES["bukti_transaksi"]["name"]);
            $sql = "INSERT INTO `tbl_proses`(`username`, `pembeli`, `id_barang`, `nama_barang`, `jumlah`, `total`, `alamat`, `kodepos`, `bukti`,`status`,`kode`) 
                    VALUES ('$user','$pembeli','$id_barang','$nama_barang','$jumlah','$total','$alamat','$kodepos','$fileName','Pesanan Diproses Toko',0)";
            if ($conn->query($sql) === TRUE) {
                
                $sql_hapus_stok = "UPDATE `tbl_barang` SET `stok_barang`= `stok_barang` - '$jumlah' WHERE `id_barang` = '$id_barang'";
                $conn->query($sql_hapus_stok);

                echo "Pembelian berhasil!";
                header("Location: ../?hal=proses");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                header("Location: ../?hal=detail");
                exit;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
            header("Location: ../?hal=detail");
            exit;
        }
    } else {
        header("Location: ../?hal=detail");
        exit;
    }
}

?>
