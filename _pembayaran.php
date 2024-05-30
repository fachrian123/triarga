<?php
    if(!isset($_SESSION['user'])){
        header('Location:login.php');
    }
    $user = $_SESSION['user'];
    $namabarang = $_POST['namabarang'];
    $harga = str_replace(array('Rp', '.'), '', $_POST['ukuran']);
    $jumlah = $_POST['jumlah'];
      
    include "koneksi.php";

    //Ambil Data Barang
    $sql_get_data = "SELECT * FROM tbl_barang WHERE nama_barang = '$namabarang' AND harga_barang = '$harga'";
    $result_get_data = $conn->query($sql_get_data);

    //Mengecek apakah query Barang berhasil dijalankan
    if ($result_get_data->num_rows > 0) {
        $row = $result_get_data->fetch_assoc();
    }else{
        echo "Tidak ada data yang ditemukan";
    }

    //Ambil Data User
    $sql_get_user = "SELECT * FROM tbl_user WHERE username = '$user'";
    $result_get_user = $conn->query($sql_get_user);

    //Mengecek apakah query Barang berhasil dijalankan
    if ($result_get_user->num_rows > 0) {
        $data = $result_get_user->fetch_assoc();
    }else{
        echo "Tidak ada data yang ditemukan";
    }
    
    //Penentuan Ongkir
    switch ($data['kodepos']){
        case 20858:
            $ongkir = 10000;
            break;
        case 20859:
            $ongkir = 30000;
            break;
        case 20857:
            $ongkir = 20000;
            break;
        default:
            $ongkir = 50000;
        }
?>
    <form action="mesin/proses_pembayaran.php" method="post" enctype="multipart/form-data">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="img/unboxing.jpg" alt="gbr-buatpesanan" style="width: 60%; height: 200px; object-fit: cover;">
                </div>
                <div class="col-sm-4 mt-3">
                    <p>Detail Pesanan</p>
                    <h5><?= $row['nama_barang'] . " " . $row['ukuran_barang']  ?></h5>
                    <?php $subtotal = $row['harga_barang']*$jumlah; ?>
                    <h5><?= "Rp" . number_format($row['harga_barang'], '0', ',','.') ." x ". $jumlah ." = ". "Rp" . number_format($subtotal, '0', ',','.') ?></h5>
                    <h5><?= "Biaya Pengiriman =  Rp" . number_format($ongkir, '0', ',','.') ?></h5>
                </div>
                <div class="col-sm-2 mt-3">
                    <p>Total Pembayaran</p>
                    <h5><?= "Rp" . number_format($subtotal+$ongkir, '0', ',','.')?></h5>
                </div>
                <div class="col-sm-2 mt-3">
                    <p>Pembeli</p>
                    <h5><?= $data['nama_lengkap'] ?></h5>
                </div>
                <div class="col-sm-4 mt-3">
                    <p>Upload Bukti Transaksi <small class="text-danger" style="font-size: 8pt;">(*.jpg, *.png)</small></p>
                    <input type="file" name="bukti_transaksi" accept="image/jpeg, image/png" required>
                </div>
                <div class="col-sm-4 mt-3">
                    <p>Alamat Pengiriman</p>
                    <h5><?= $data['alamat'] ?></h5>
                </div>
                <div class="col-sm-2 mt-3">
                    <p>Kode Pos</p>
                    <h5><?= $data['kodepos'] ?></h5>
                </div>
                <div class="col-sm-6 mt-3">
                    <p class="text-danger">Pastikan Alamat sudah sesuai ya!<br>
                    <small style="color: #000;">kalau belum sesuai, silahkan ubah di menu edit profil 👌</small></p>
                    <input type="hidden" name="user" value="<?=  $data['username'] ?>">
                    <input type="hidden" name="pembeli" value="<?=  $data['nama_lengkap'] ?>">
                    <input type="hidden" name="id_barang" value="<?=  $row['id_barang'] ?>">
                    <input type="hidden" name="nama_barang" value="<?=  $row['nama_barang'] .'('. $row['ukuran_barang'].')' ?>">
                    <input type="hidden" name="jumlah_barang" value="<?=  $jumlah ?>">
                    <input type="hidden" name="total_bayar" value="<?= $subtotal+$ongkir ?>">
                    <input type="hidden" name="alamat_pengiriman" value="<?= $data['alamat'] ?>">
                    <input type="hidden" name="kodepos" value="<?= $data['kodepos'] ?>">
                    <input type="submit" value="Buat Pesanan" class="btn btn-outline-danger">
                </div>
            </div>
        </div>
    </form>
