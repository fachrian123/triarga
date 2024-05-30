<?php
    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        include "../koneksi.php";
        $kurir = $_POST['kurir'];
        $resi = $_POST['resi'];
        $pesan = "Dikirim dengan " .$kurir. " Nomor Resi: ".$resi;

        $sql = "UPDATE `tbl_proses` SET `status`= '$pesan', `kode` = 1 WHERE id=$id";
        $res = $conn->query($sql);
        if($res){
            echo "<script>alert('Berita Pengiriman Berhasil Dibuat'); window.location.href = 'index.php?hal=proses';</script>";
        }else{
            echo "<script>alert('Terjadi Kesalahan!');  window.location.href = 'index.php?hal=proses';</script>";
        }
    }

?>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <form method="post">
        
                            <label>Kurir</label>
                            <input type="text" class="form-control" name="kurir" placeholder="Misal : JNE atau SiCepat" required>
        
                            <label class="mt-3">Nomor Resi</label>
                            <input type="text" class="form-control form-control-lg" name="resi" placeholder="Wajib memasukkan nomor resi ya" required>
        
                    </div>
                    <div class="card-footer">
                        <a href="?hal=proses" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success float-right">Buat Pengiriman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>