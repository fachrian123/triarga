<?php 

  if(!isset($_SESSION['user'])){
    header('Location:login.php');
  }

  if(!isset($_GET['nama'])){
    header('Location:index.php');
  }else{
    $nama_barang = urldecode($_GET['nama']);

    include "koneksi.php";

    //Terjual dan Rating
    $sql_tnr = "SELECT MAX(tbl_rating.id_barang) AS id_barang, tbl_barang.nama_barang, SUM(tbl_rating.terjual) AS terjual, 
                ROUND(AVG(tbl_rating.rating),1) AS average_rating FROM tbl_rating 
                INNER JOIN tbl_barang ON tbl_rating.id_barang = tbl_barang.id_barang 
                WHERE tbl_barang.nama_barang = '$nama_barang'";
    $result_tnr = $conn->query($sql_tnr);

    // Mengecek apakah query Barang berhasil dijalankan
    if ($result_tnr->num_rows > 0) {

      $b = $result_tnr->fetch_assoc();

    }else{
      echo "Belum Dirating";
    }       


    $sql_detail = "SELECT MAX(foto_barang) AS foto_barang, MAX(foto_barang_belakang) AS foto_barang_belakang, 
                  MAX(detail_barang) AS detail_barang, nama_barang, GROUP_CONCAT(CONCAT(ukuran_barang, ' - ', harga_barang , ' - ', stok_barang) 
                  ORDER BY ukuran_barang SEPARATOR ', ') AS detail_produk FROM tbl_barang WHERE nama_barang = '$nama_barang' 
                  GROUP BY nama_barang";
    $result_detail = $conn->query($sql_detail);

    // Mengecek apakah query Barang berhasil dijalankan
    if ($result_detail->num_rows > 0) {

      $row = $result_detail->fetch_assoc();

      // Memisahkan detail_produk menjadi array ukuran dan harga
      $detail_produk_arr = explode(', ', $row["detail_produk"]);

    }else{
        echo "Tidak ada data yang ditemukan pada Barang";
    }            
  }

?>

<script>
  function updateNilai(radioButton) {
    var info = radioButton.getAttribute('data-info');
    var stok = radioButton.getAttribute('data-stok');
    var value = radioButton.value;
    document.getElementById('ukuran_terpilih').innerHTML = info;
    document.getElementById('stok_terpilih').innerHTML = stok;
    document.getElementById("jumlah_beli").max = stok;
    document.getElementById("jumlah_beli").value = 1;
    document.getElementById('nilai_terpilih').innerHTML = value;
  }

  function tambahNilai(event){
    event.preventDefault();
    var inputNumber = document.getElementById("jumlah_beli");
    inputNumber.value = parseInt(inputNumber.value) + 1;
  }

  function kurangNilai(event){
    event.preventDefault();
    var inputNumber = document.getElementById("jumlah_beli");
    var currentValue = parseInt(inputNumber.value);
    if (currentValue > 0) {
        inputNumber.value = currentValue - 1;
    }
  }
</script>

    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?= $row['foto_barang'] ?>" class="d-block w-100" alt="<?= $row['nama_barang'] ?>">
                      </div>
                      <div class="carousel-item">
                        <img src="<?= $row['foto_barang_belakang'] ?>" class="d-block w-100" alt="<?= $row['nama_barang'] ?>">
                      </div>
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-sm-4">
                <h3><?= $row['nama_barang'] ?></h3>
                <p><?= $terjual = ($b['terjual'] == NULL) ? 'Belum' : $b['terjual'] ?> Terjual | <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><path fill="#fcd53f" d="m18.7 4.627l2.247 4.31a2.27 2.27 0 0 0 1.686 1.189l4.746.65c2.538.35 3.522 3.479 1.645 5.219l-3.25 2.999a2.225 2.225 0 0 0-.683 2.04l.793 4.398c.441 2.45-2.108 4.36-4.345 3.24l-4.536-2.25a2.282 2.282 0 0 0-2.006 0l-4.536 2.25c-2.238 1.11-4.786-.79-4.345-3.24l.793-4.399c.14-.75-.12-1.52-.682-2.04l-3.251-2.998c-1.877-1.73-.893-4.87 1.645-5.22l4.746-.65a2.23 2.23 0 0 0 1.686-1.189l2.248-4.309c1.144-2.17 4.264-2.17 5.398 0"/></svg>
                <?= $rating = ($b['average_rating'] == NULL) ? 0 : $b['average_rating'] ?>/5</p>
                <h1><span id="nilai_terpilih"> Pilih Ukuran</span></h1>
                <hr>
                <div class="container float-start" style="width:fit-content;">
                  <div class="row">

                    <?php foreach ($detail_produk_arr as $detail): 
                          
                          // Memisahkan ukuran dan harga
                          $detail_arr = explode(' - ', $detail);
                          $ukuran = $detail_arr[0];
                          $harga = $detail_arr[1];
                          $stok = $detail_arr[2];
                    ?>
                      
                      <div class="col">      
                        <form method="post" action="?hal=pembayaran">
                          
                        <input type="hidden" name="namabarang" value="<?= $row['nama_barang'] ?>">

                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ukuran" value="<?= "Rp " . number_format($harga, '0', ',', '.') ?>" data-info="<?= $ukuran ?>" data-stok="<?= $stok ?>" onclick="updateNilai(this)" required>
                          <label class="form-check-label">
                          <?= $ukuran ?>
                          </label>
                        </div>
                      </div>

                    <?php endforeach; ?>
                  </div>
                </div><br>
                <hr>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link text-danger active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Detail</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <small>
                          <?= $row['detail_barang'] ?>
                        </small>
                      </div>
                    </div>

            </div>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Atur jumlah</h5>
                      <h6 class="card-subtitle mb-2 text-muted">
                        Ukuran : <span id="ukuran_terpilih">N/A</span> |
                        Stok : <span id="stok_terpilih">0</span>
                      </h6>
                      <hr>
                      <div class="input-group">
                        <button class="btn btn-outline-danger" onclick="kurangNilai(event)">-</button>
                          <input id="jumlah_beli" type="number" name="jumlah" class="form-control text-center" value="1" min="1" required>
                        <button class="btn btn-outline-danger" onclick="tambahNilai(event)">+</button>
                      </div>
                      <br>
                      <button class="btn btn-outline-danger w-100">Checkout</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
