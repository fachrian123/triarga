<?php
    include "../koneksi.php";

    $id_user = $_GET["id"];
    $sql_user = "SELECT * FROM tbl_user WHERE id_user = '$id_user'";
    $result = $conn->query($sql_user);
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
                        <form action="mesin/ubah_user.php" method="post">
                            <div class="form-group">
                                <label for="InputUsername">Username</label>
                                <input type="text" name="user" class="form-control" id="InputUsername" value="<?= $row['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Password</label>
                                <input type="text" name="pass" class="form-control" id="InputPassword" value="<?= $row['password'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputNamaLengkap">Nama Lengkap</label>
                                <input type="text" name="namalengkap" class="form-control" id="InputNamaLengkap" value="<?= $row['nama_lengkap'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputNope">Nomor HP</label>
                                <input type="text" name="nope" class="form-control" id="InputNope" value="<?= $row['nomor_hp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputKodepos">Kodepos</label>
                                <input type="text" name="kodepos" class="form-control" id="InputKodepos" value="<?= $row['kodepos'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputAlamat">Alamat</label>
                                <textarea name="alamat" id="InputAlamat" class="form-control" cols="30" rows="3"><?= $row['alamat'] ?></textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id" value="<?= $id_user ?>">
                        <a href="?hal=user" class="btn btn-danger">Kembali</a>
                        <button class="float-right btn btn-success">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>