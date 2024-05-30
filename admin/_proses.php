<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang yang Diproses</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Proses</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Kodepos</th>
                                    <th>Alamat</th>
                                    <th>Waktu</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    include "../koneksi.php"; 
                                    $sql = "SELECT * FROM tbl_proses";
                                    $res = $conn->query($sql);
                                    $data = array();
                                    if($res->num_rows > 0){
                                        while($row = $res->fetch_assoc()) {
                                            $data[] = $row;
                                         }
                                    }
                                    foreach($data as $row):
                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nama_barang'] ?></td>
                                    <td><?= $row['jumlah'] ?></td>
                                    <td><?= $row['total'] ?></td>
                                    <td><?= $row['kodepos'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $row['waktu_pesanan'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><img src="../img/<?= $row['bukti'] ?>" alt="gbrBukti" style="width: 100%;"></td>
                                    <td>
                                        <?php  
                                            $kode = $row['kode'];
                                            if($kode == 1){
                                                echo "Menunggu Barang Diterima oleh ". $row['pembeli'];
                                            }else if($kode == 2){
                                                echo "Sukses";}else{
                                        ?>
                                        <a href="?hal=kirim&id=<?= $row['id'] ?>" class="btn btn-warning">
                                           Kirim Barang 
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Proses</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Kodepos</th>
                                    <th>Alamat</th>
                                    <th>Waktu</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

