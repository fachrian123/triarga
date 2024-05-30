<div class="container" style="margin-top: 80px;">
    <div class="row gy-4 justify-content-center">

        <?php 
            include "koneksi.php";
            $namabarang = $_GET['q'];
            $sql_barang = "SELECT MAX(id_barang) AS id, MAX(foto_barang) AS foto, nama_barang, GROUP_CONCAT(FORMAT(harga_barang, 0, 'id_ID') SEPARATOR ' - ') AS harga FROM tbl_barang WHERE `nama_barang` LIKE '%$namabarang%' GROUP BY nama_barang";
            $result_barang = $conn->query($sql_barang);

            // Mengecek apakah query Barang berhasil dijalankan
            if ($result_barang->num_rows > 0) {
                // Inisialisasi array untuk menampung data
                $data = array();

                // Loop untuk mengambil data dan memasukkannya ke dalam array
                while($row = $result_barang->fetch_assoc()) {
                    $data[] = $row;
                 }      
        ?>

        <h5>Hasil Pencarian "<?= $namabarang ?>"</h5>

        <?php foreach($data as $row): ?>
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

<?php }else{  echo "<h2 class='mt-5 text-center'>Sepertinya ". $namabarang ." tidak ada di toko kami 🙄</h2>";} ?>