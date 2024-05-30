<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="fixed-top container-fluid bg-danger">
        <a class="navbar-brand text-white" href="?hal=home" style="font-size: 40px; font-family: 'Times New Roman', Times, serif;">TRI ARGA</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="?hal=tentang" style="text-decoration: none;">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="?hal=alamat" style="text-decoration: none;">Alamat Kami</a>
            </li>
        </ul>
          <?php 
            include "koneksi.php";
            if (isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $sql_recom = "SELECT tbl_rating.rating, tbl_barang.nama_barang, tbl_barang.kategori FROM `tbl_rating`
                          INNER JOIN tbl_barang ON tbl_rating.id_barang = tbl_barang.id_barang
                          ORDER BY `tbl_rating`.`rating` DESC LIMIT 1 ";
            $result_recom = $conn->query($sql_recom);
            if ($result_recom->num_rows > 0) {
              // Inisialisasi array untuk menampung data
              $data = array();
      
              // Loop untuk mengambil data dan memasukkannya ke dalam array
              while($baris = $result_recom->fetch_assoc()) {
                  $data[] = $baris;
               }
             ?>

            <form method="post" action="mesin/proses_cari.php" style="display: flex; gap: 5px;">
              <input type="text" name="cari" id="mesinCari" style="width: 500px; border: 1px solid red; border-radius: 5px; padding: 0px 10px;" placeholder="Rekomendasi : <?php  foreach($data as $baris){ echo $baris['nama_barang']; } ?>, ..." required> 
              <button type="submit" class="btn btn-secondary">Cari Barang</button>
            </form>

          <?php }else{ ?>

            <form method="post" action="mesin/proses_cari.php" style="display: flex; gap: 5px;">
              <input type="text" name="cari" id="mesinCari" style="width: 500px; border: 1px solid red; border-radius: 5px; padding: 0px 10px;" placeholder="Cari Kaos, Celana, dan masih banyak lainnya..." required> 
              <button type="submit" class="btn btn-secondary">Cari Barang</button>
            </form>

          <?php }}else{?>


              <form method="post" action="mesin/proses_cari.php" style="display: flex; gap: 5px;">
                <input type="text" name="cari" id="mesinCari" style="width: 500px; border: 1px solid red; border-radius: 5px; padding: 0px 10px;" placeholder="Cari Kaos, Celana, dan masih banyak lainnya..." required> 
                <button type="submit" class="btn btn-secondary">Cari Barang</button>
              </form>


          <?php } ?>

          <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 2048 2048"><path fill="white" d="M1024 128v1792H896V128z"/></svg>

          <?php  if(!isset($_SESSION['user'])){  ?>

          <div style="display: flex; gap: 5px;">
            <a href="login.php" class="btn btn-light text-danger">Login</a>
    
            <a href="daftar.php" class="btn btn-light text-danger">Daftar</a>
          </div>

        <?php }else{ ?>
        
          <div style="display: flex; gap: 5px;">
            <a href="#" class="btn btn-light text-danger" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><?= $_SESSION['user'] ?></a>
          </div>

      <?php } ?>
    </div>    
</nav> 