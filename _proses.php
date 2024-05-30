<?php 
      if(!isset($_SESSION['user'])){
        header('Location:login.php');
      }

      $user = $_SESSION['user'];

      include "koneksi.php";
            $sql_pesanan = "SELECT * FROM tbl_proses WHERE username = '$user' AND kode != 2";
            $result_pesanan = $conn->query($sql_pesanan);      
?>
<div class="container" style="margin-top: 100px;">
    <table id="proses-transaksi" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Waktu Pesanan</th>
                <th>Id Pesanan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total (Rp)</th>
                <th>Alamat</th>
                <th>Kodepos</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

        <?php  
        // Mengecek apakah query Barang berhasil dijalankan
        if ($result_pesanan->num_rows > 0) {
            // Inisialisasi array untuk menampung data
            $data = array();

            // Loop untuk mengambil data dan memasukkannya ke dalam array
            while($row = $result_pesanan->fetch_assoc()) {
                $data[] = $row;
             }
        
        foreach($data as $row): ?>
            <tr>
                <td><?= $row['waktu_pesanan'] ?></td>
                <td><?= $row['id_barang'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= number_format($row['total'],'0',',','.') ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['kodepos'] ?></td>
                <td>
                    <?= $row['status'] ?> 
                    <?php if($row['kode'] == 1){?>
                        <br/><a href="mesin/proses_selesai.php?id_barang=<?= $row['id_barang'] ?>&jumlah=<?= $row['jumlah'] ?>&user=<?= $user ?>" class="btn btn-outline-primary" onClick="return confirm('Yakin Barang Sudah Diterima?')">Klik Jika Pesanan Sudah Diterima</a>
                    <?php } ?>
                </td>
                
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php 
}  

?>
</div>