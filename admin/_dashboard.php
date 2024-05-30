 <?php 
    include "../koneksi.php";

    //Total Stok
    $sql_stok = "SELECT SUM(stok_barang)AS total_stok FROM `tbl_barang`";
    $res_stok = $conn->query($sql_stok);
    $s = ($res_stok->num_rows > 0) ? $res_stok->fetch_assoc() : 0; 

    //Total User
    $sql_tuser = "SELECT COUNT(*) AS total_user FROM `tbl_user`";
    $res_tuser = $conn->query($sql_tuser);
    $tu = ($res_tuser->num_rows > 0) ? $res_tuser->fetch_assoc() : 0;

    //Total Terjual
    $sql_terjual = "SELECT SUM(jumlah) AS total_terjual FROM `tbl_proses`";
    $res_terjual = $conn->query($sql_terjual);
    $t = ($res_terjual->num_rows > 0) ? $res_terjual->fetch_assoc() : 0;

    //Total Sukses
    $sql_sukses = "SELECT COUNT(*) AS total_sukses FROM `tbl_proses` WHERE `kode` = 2";
    $res_sukses = $conn->query($sql_sukses);
    $ts = ($res_sukses->num_rows > 0) ? $res_sukses->fetch_assoc() : 0;

    //Top 5 Rating
    $sql_rating = "SELECT MAX(tbl_rating.id_barang) AS id_barang, 
                    MAX(tbl_barang.nama_barang) AS nama_barang, 
                    SUM(tbl_rating.terjual) AS terjual, 
                    ROUND(AVG(tbl_rating.rating),1) AS average_rating 
                    FROM tbl_rating 
                    INNER JOIN tbl_barang ON tbl_rating.id_barang = tbl_barang.id_barang 
                    GROUP BY tbl_barang.nama_barang 
                    ORDER BY average_rating DESC LIMIT 5";
    $res_rating = $conn->query($sql_rating);
    if($res_rating->num_rows > 0) {
        $br = array();
      while($brat = $res_rating->fetch_assoc()) {
        $br[] = $brat; 
      }
    }else{
      echo "Belum ada Data di Rating";
    }

    //Top 5 Terjual
    $sql_terjual = "SELECT MAX(tbl_rating.id_barang) AS id_barang, 
                    MAX(tbl_barang.nama_barang) AS nama_barang, 
                    SUM(tbl_rating.terjual) AS terjual, 
                    ROUND(AVG(tbl_rating.rating),1) AS average_rating 
                    FROM tbl_rating 
                    INNER JOIN tbl_barang ON tbl_rating.id_barang = tbl_barang.id_barang 
                    GROUP BY tbl_barang.nama_barang 
                    ORDER BY terjual DESC LIMIT 5";
    $res_terjual = $conn->query($sql_terjual);
    if($res_terjual->num_rows > 0) {
        $btj = array();
      while($bj = $res_terjual->fetch_assoc()) {
        $btj[] = $bj; 
      }
    }else{
      echo "Belum ada Data di Rating";
    }

 
 ?>
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Selamat Datang <?= $admin ?>!</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $s['total_stok'] ?></h3>
                <p>Stok Barang</p>
              </div>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M20.894 17.553a1 1 0 0 1-.447 1.341l-8 4a1 1 0 0 1-.894 0l-8-4a1 1 0 0 1 .894-1.788L12 20.88l7.554-3.775a1 1 0 0 1 1.341.447m0-4a1 1 0 0 1-.447 1.341l-8 4a1 1 0 0 1-.894 0l-8-4a1 1 0 0 1 .894-1.788L12 16.88l7.554-3.775a1 1 0 0 1 1.341.447m0-4a1 1 0 0 1-.447 1.341l-8 4a1 1 0 0 1-.894 0l-8-4a1 1 0 0 1 .894-1.788L12 12.88l7.554-3.775a1 1 0 0 1 1.341.447M12.008 1q.056 0 .111.007l.111.02l.086.024l.012.006l.012.002l.029.014l.05.019l.016.009l.012.005l8 4a1 1 0 0 1 0 1.788l-8 4a1 1 0 0 1-.894 0l-8-4a1 1 0 0 1 0-1.788l8-4l.011-.005l.018-.01l.078-.032l.011-.002l.013-.006l.086-.024l.11-.02l.056-.005z"/></svg>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $tu['total_user'] ?></h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>   
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $t['total_terjual'] ?></h3>
                <p>Barang Terjual</p>
              </div>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="white" d="M704 288h131.072a32 32 0 0 1 31.808 28.8L886.4 512h-64.384l-16-160H704v96a32 32 0 1 1-64 0v-96H384v96a32 32 0 0 1-64 0v-96H217.92l-51.2 512H512v64H131.328a32 32 0 0 1-31.808-35.2l57.6-576a32 32 0 0 1 31.808-28.8H320v-22.336C320 154.688 405.504 64 512 64s192 90.688 192 201.664v22.4zm-64 0v-22.336C640 189.248 582.272 128 512 128s-128 61.248-128 137.664v22.4h256zm201.408 483.84L768 698.496V928a32 32 0 1 1-64 0V698.496l-73.344 73.344a32 32 0 1 1-45.248-45.248l128-128a32 32 0 0 1 45.248 0l128 128a32 32 0 1 1-45.248 45.248"/></svg>   
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $ts['total_sukses'] ?></h3>
                <p>Pesanan Sukses</p>
              </div>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="white" d="M13 3a5.393 5.393 0 0 1-1.902 1.178c-.748.132-2.818-.828-3.838.152c-.17.17-.38.34-.6.51c-.48-.21-1.22-.53-1.76-.84S3 3 3 3L0 6.5s.74 1 1.2 1.66c.3.44.67 1.11.91 1.56l-.34.4a.876.876 0 0 0 .15 1a.833.833 0 0 0 1.002-.002a.62.62 0 0 0 .077.881a.994.994 0 0 0 1.006-.002a.806.806 0 0 0-.003 1.005a1.012 1.012 0 0 0 .892-.114a.822.822 0 0 0 .187.912a1.093 1.093 0 0 0 1.054-.092l.516-.467c.472.47 1.123.761 1.842.761l.061-.001a1.311 1.311 0 0 0 1.094-.791c.146.056.312.094.488.094c.236 0 .455-.068.64-.185c.585-.387.445-.687.445-.687a1.07 1.07 0 0 0 1.229-.279a.996.996 0 0 0 .138-1.215a.036.036 0 0 0 .021.005c.421 0 .787-.232.978-.574a1.564 1.564 0 0 0-.191-1.48l.003.005c.82-.16.79-.57 1.19-1.17a4.725 4.725 0 0 1 1.387-1.208zm-.05 7.06c-.44.44-.78.25-1.53-.32S9.18 8.1 9.18 8.1c.061.305.202.57.401.781c.319.359 1.269 1.179 1.719 1.599c.28.26 1 .78.58 1.18s-.75 0-1.44-.56s-2.23-1.94-2.23-1.94a.937.937 0 0 0 .27.72c.17.2 1.12 1.12 1.52 1.54s.75.67.41 1s-1.03-.19-1.41-.58c-.59-.57-1.76-1.63-1.76-1.63l-.001.053c0 .284.098.544.263.75c.288.378.848.868 1.188 1.248s.54.7 0 1s-1.34-.44-1.69-.8v-.002a.411.411 0 0 0-.1-.269a.896.896 0 0 0-.906-.188A.609.609 0 0 0 6 11.1a.754.754 0 0 0-.912.001a.61.61 0 0 0-.085-.95a1 1 0 0 0-1.174.08a.66.66 0 0 0-.068-.911a.996.996 0 0 0-1.186-.128L1.91 8.069c-.46-.73-1-1.49-1-1.49l2.28-2.77s.81.5 1.48.88c.33.19.9.44 1.33.64c-.68.51-1.25 1-1.08 1.34a1.834 1.834 0 0 0 2.087.036a2.41 2.41 0 0 1 1.343-.403c.347 0 .677.072.976.203c.554.374 1.574 1.294 2.504 1.874c1.17.85 1.4 1.4 1.12 1.68z"/></svg>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">5 Barang Rating Tertinggi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Rating</th>
                      <th>Terjual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($br as $tr): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $tr['nama_barang'] ?></td>
                      <td><?= $tr['average_rating'] ?></td>
                      <td><?= $tr['terjual'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">5 Barang Terjual Tertinggi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Rating</th>
                      <th>Terjual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($btj as $tj): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $tj['nama_barang'] ?></td>
                      <td><?= $tj['average_rating'] ?></td>
                      <td><?= $tj['terjual'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->