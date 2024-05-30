<?php
    include "../koneksi.php";

    $id = $_GET["id"];
    $sql_barang = "SELECT * FROM tbl_barang WHERE id_barang = '$id'";
    $result = $conn->query($sql_barang);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }
?>

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">

                    <div class="card-body">
                        <form action="mesin/ubah_barang.php" method="post">
                            <div class="form-group">
                                <label for="InputFotoBarang">Foto Depan</label>
                                <input type="text" name="foto" class="form-control" id="InputFotoBarang" value="<?= $row['foto_barang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputFotoBelakang">Foto Belakang</label>
                                <input type="text" name="foto_belakang" class="form-control" id="InputFotoBelakang" value="<?= $row['foto_barang_belakang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputNamaBarang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="InputNamaBarang" value="<?= $row['nama_barang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputUkuran">Ukuran</label>
                                <input type="text" name="ukuran" class="form-control" id="InputUkuran" value="<?= $row['ukuran_barang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputHarga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="InputHarga" value="<?= $row['harga_barang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputStok">Stok</label>
                                <input type="number" name="stok" class="form-control" id="InputStok" value="<?= $row['stok_barang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputKategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" id="InputKategori" value="<?= $row['kategori'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputDetail">Detail</label>
                                <textarea name="detail" id="InputDetail" class="form-control" cols="30" rows="3"><?= $row['detail_barang'] ?></textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <a href="?hal=barang" class="btn btn-danger">Kembali</a>
                        <button class="float-right btn btn-success">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>