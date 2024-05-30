<?php
    if(!isset($_SESSION['user'])){
        header('Location:login.php');
    }

    include "koneksi.php";

    $user = $_SESSION['user'];
    $sql_get = "SELECT * FROM tbl_user WHERE `username` = '$user'";
    $result_get = $conn->query($sql_get);
    if ($result_get->num_rows > 0) {
        $row = $result_get->fetch_assoc();
    }
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-sm-6">
            <img style="width: 100%; object-fit: cover;" src="img/vector_edit.jpg" alt="vector">
        </div>
        
        <div class="col-sm-6">
            <form method="post" action="mesin/proses_edituser.php">
                <div class="mb-3 mt-4">
                    <label class="form-label">Nama Lengkap<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="namalengkap" value="<?= $row['nama_lengkap'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="username" value="<?= $row['username'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="pass" value="<?= $row['password'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Handphone<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="nomor_hp" value="<?= $row['nomor_hp'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Pos<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="kodepos" value="<?= $row['kodepos'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat<small class="text-danger">*</small></label>
                    <textarea class="form-control" rows="3" name="alamat" required><?= $row['alamat'] ?></textarea>
                </div>
            
                <button class="btn btn-outline-danger w-100 mt-2 mb-3">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

</div>
