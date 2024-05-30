<?php
    if(!isset($_SESSION['user'])){
        header('Location:login.php');
    }

    include "koneksi.php";

    $user = $_SESSION['user'];

    $sql_rating =  "SELECT tbl_rating.id_rating, tbl_rating.id_barang, tbl_barang.foto_barang, tbl_barang.nama_barang, tbl_rating.rating, tbl_rating.terjual, tbl_barang.ukuran_barang, tbl_rating.waktu_diberi
                    FROM tbl_rating INNER JOIN tbl_barang ON tbl_rating.id_barang = tbl_barang.id_barang  WHERE tbl_rating.username = '$user' ORDER BY `tbl_rating`.`waktu_diberi` DESC";
    $result_rating = $conn->query($sql_rating);
    // Mengecek apakah query Barang berhasil dijalankan
    if ($result_rating->num_rows > 0) {
        // Inisialisasi array untuk menampung data
        $data = array();

        // Loop untuk mengambil data dan memasukkannya ke dalam array
        while($row = $result_rating->fetch_assoc()) {
            $data[] = $row;
         }
    }else{
        echo "Tidak ada data yang ditemukan";
    }   
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">

        <?php 
        $nomor = 1;
        foreach($data as $row):  
        $urutan = $nomor++; ?>

        <div class="col-sm-4" style="border-bottom: 1px solid black; margin-bottom: 10px;">
            <img src="<?= $row['foto_barang'] ?>" alt="fotoBarang" style="width: 40%; object-fit: cover; float: right;">
        </div>
        <div class="col-sm-8" style="border-bottom: 1px solid black; margin-bottom: 10px;">
            <h2><?= $row['nama_barang'] .' ('. $row['ukuran_barang'] .')' ?></h2>
            <p style="margin: 0;">Rating (<?= $row['rating']?>/5) - <?= $row['terjual']?> Terbeli - Pesanan Tiba Pada <?= $row['waktu_diberi'] ?></p>
            <div class="rating" id="rating">
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $isActive = ($i <= $row['rating']) ? "aktif" : "";
                        echo "<span class='star $isActive' data-value='$i'>&#9733;</span>";
                    }
                ?>
            </div>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ratingModal<?= $urutan ?>">Ubah Rating</button>
        </div>

        <div class="modal fade" id="ratingModal<?= $urutan ?>" tabindex="-1" aria-labelledby="ratingModal<?= $urutan ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ratingModal<?= $urutan ?>Label">Ubah Rating</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <form action="mesin/proses_rating.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id_rating'] ?>">
                            <input type="hidden" name="user" value="<?= $user ?>">
                            <input type="radio" name="bintang" value="1" required> 1 &nbsp;&nbsp;
                            <input type="radio" name="bintang" value="2" required> 2 &nbsp;&nbsp;
                            <input type="radio" name="bintang" value="3" required> 3 &nbsp;&nbsp;
                            <input type="radio" name="bintang" value="4" required> 4 &nbsp;&nbsp;
                            <input type="radio" name="bintang" value="5" required> 5
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</div>