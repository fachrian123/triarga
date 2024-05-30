<?php
    include "koneksi.php";
    if(isset($user)){ 
        //Ambil Barang Terakhir yang dibeli oleh user
        $sql_fav = "SELECT tbl_proses.id_barang, tbl_proses.waktu_pesanan, tbl_barang.kategori FROM `tbl_proses` INNER JOIN tbl_barang ON tbl_proses.id_barang = tbl_barang.id_barang WHERE tbl_proses.username = '$user' ORDER BY `tbl_proses`.`waktu_pesanan` DESC LIMIT 1";
        $res_fav = $conn->query($sql_fav);

        if ($res_fav->num_rows > 0) {
            $r = $res_fav->fetch_assoc();
            $fav = $r['kategori'];
        }
        
        $sql_saran = "SELECT MAX(tbl_rating.id_barang) AS id_barang, ROUND(AVG(tbl_rating.rating),1) AS average_rating, 
                    MAX(tbl_barang.kategori) AS kategori, MAX(tbl_barang.foto_barang) AS foto_barang, tbl_barang.nama_barang, 
                    MAX(tbl_barang.harga_barang) AS harga_barang FROM tbl_rating INNER JOIN tbl_barang 
                    ON tbl_rating.id_barang = tbl_barang.id_barang WHERE tbl_barang.kategori = '$fav' 
                    GROUP BY tbl_barang.nama_barang ORDER BY average_rating DESC LIMIT 4";
        $res_saran = $conn->query($sql_saran);

        if ($res_saran->num_rows > 0) {
            $d = array();
            while($rows = $res_saran->fetch_assoc()) {
                    $d[] = $rows;
            } 
         ?>           

<div class="container" style="margin-top: 80px;">
    <div class="row gy-4 justify-content-center">
        <h4>Saran terbaik kami untuk anda ⭐</h4>

        <?php foreach($d as $rows): ?>
        <div class="col-sm-3">
            <div class="card mb-3 bg-rekom" style="max-width: 540px;" onclick="window.location.href='?hal=detail&nama=<?= $rows['nama_barang'] ?>'">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="<?= $rows['foto_barang'] ?>" class="img-fluid rounded-start" style="padding-left: 5px;" alt="fotoBarang">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $rows['nama_barang'] ?></h5>
                            <p class="card-text pb-3">Rp<?= number_format($rows['harga_barang'],'0',',','.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; 
    }else{ ?>

        <h2 class="text-center mt-5">Ayo Belanja! Tunggu apa lagi??</h2>

    </div>
</div>
     
<?php } 
} ?>

<div class="container" style="margin-top: 80px;">
    <div class="row gy-4 justify-content-center">

        <?php 
            $sql_barang = "SELECT MAX(id_barang) AS id, MAX(foto_barang) AS foto, nama_barang, GROUP_CONCAT(FORMAT(harga_barang, 0, 'id_ID') SEPARATOR ' - ') AS harga FROM tbl_barang WHERE `stok_barang` > 0 GROUP BY nama_barang";
            $result_barang = $conn->query($sql_barang);

            // Mengecek apakah query Barang berhasil dijalankan
            if ($result_barang->num_rows > 0) {
                // Inisialisasi array untuk menampung data
                $data = array();

                // Loop untuk mengambil data dan memasukkannya ke dalam array
                while($row = $result_barang->fetch_assoc()) {
                    $data[] = $row;
                 }
            }else{
                header('location:err.php');
            }            


            foreach($data as $row):
        ?>

        <div class="col col-sm-4 text-center">
            <div class="card mx-auto" style="width: 80%;">
                <img class="w-100" src="<?= $row['foto']?>"
                    alt="<?= $row['nama_barang']?>" />
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama_barang']?></h5>
                    <p class="card-text">Rp<?= $row['harga']?></p>
                    <a href="?hal=detail&nama=<?= $row['nama_barang'] ?>" class="btn btn-warning w-100">Beli</a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</div>