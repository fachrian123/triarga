<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                        <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">+ Tambah Barang</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="font-size: 10pt;">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Ukuran</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Foto Depan</th>
                                    <th>Foto Belakang</th>
                                    <th>Detail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../koneksi.php"; 
                                    $sql = "SELECT * FROM tbl_barang";
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
                                    <td><?= $row['nama_barang'] ?></td>
                                    <td><?= $row['kategori'] ?></td>
                                    <td><?= $row['ukuran_barang'] ?></td>
                                    <td><?= $row['stok_barang'] ?></td>
                                    <td><?= $row['harga_barang'] ?></td>
                                    <td><?= $row['foto_barang'] ?></td>
                                    <td><?= $row['foto_barang_belakang'] ?></td>
                                    <td><?= $row['detail_barang'] ?></td>
                                    <td>
                                        <a href="?hal=ubah_barang&id=<?= $row['id_barang'] ?>" class="btn btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1l1-4Z"/></g></svg>
                                        </a>
                                        <a href="mesin/hapus_barang.php?id=<?= $row['id_barang'] ?>" class="btn btn-danger" onClick="return confirm('Yakin Akan Dihapus?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M20 6a1 1 0 0 1 .117 1.993L20 8h-.081L19 19a3 3 0 0 1-2.824 2.995L16 22H8c-1.598 0-2.904-1.249-2.992-2.75l-.005-.167L4.08 8H4a1 1 0 0 1-.117-1.993L4 6zm-6-4a2 2 0 0 1 2 2a1 1 0 0 1-1.993.117L14 4h-4l-.007.117A1 1 0 0 1 8 4a2 2 0 0 1 1.85-1.995L10 2z"/></svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Ukuran</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Foto Depan</th>
                                    <th>Foto Belakang</th>
                                    <th>Detail</th>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="mesin/tambah_barang.php" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="InputFotoBarang">Foto Depan</label>
                                <input type="text" name="foto" class="form-control" id="InputFotoBarang" placeholder="Masukkan url foto depan" 
                                required>
                            </div>
                            <div class="form-group">
                                <label for="InputFotoBelakang">Foto Belakang</label>
                                <input type="text" name="foto_belakang" class="form-control" id="InputFotoBelakang" 
                                placeholder="Masukkan url foto belakang" required>
                            </div>
                            <div class="form-group">
                                <label for="InputNamaBarang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" placeholder="Misal : Kaos Billabong koyak tengah"
                                id="InputNamaBarang" required>
                            </div>
                            <div class="form-group">
                                <label for="InputUkuran">Ukuran</label>
                                <input type="text" name="ukuran" class="form-control" id="InputUkuran" placeholder="Misal : M atau L atau XL"
                                required>
                            </div>
                            <div class="form-group">
                                <label for="InputHarga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="InputHarga" placeholder="Misal : 150000" 
                                required>
                            </div>  
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="InputStok">Stok</label>
                                <input type="number" name="stok" class="form-control" id="InputStok" placeholder="Misal : 5"
                                required>
                            </div>
                            <div class="form-group">
                                <label for="InputKategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control"  id="InputKategori" placeholder="Misal : kaos atau kemeja"
                                required>
                            </div>
                            <div class="form-group">
                                <label for="InputDetail">Detail</label>
                                <textarea name="detail" id="InputDetail" class="form-control" cols="30"rows="3" placeholder="Uraikan detail secara rinci ya" required></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
