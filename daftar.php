<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Daftar Triarga</title>
  </head>
  <body class="bg-danger">
    <div class="container ">
        <h1 class=" text-center mt-4">
          <a href="index.php" class="text-white" style="text-decoration: none; font-family: 'Times New Roman', Times, serif;">TRI ARGA</a>
        </h1>
        <div class="card mx-auto mt-5" style="width: 400px;">
            <div class="card-body">
              <h2 class="card-title mt-3">Daftar</h2>
              <h6 class="card-subtitle mb-2 float-end">
                <a href="login.php" class="text-danger" style="text-decoration: none;">Login</a>
              </h6>
              <form method="post" action="mesin/proses_daftar.php">
                <div class="mb-3 mt-4">
                    <label class="form-label">Nama Lengkap<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="namalengkap" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="pass" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Handphone<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="nomor_hp" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Pos<small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="kodepos" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat<small class="text-danger">*</small></label>
                    <textarea class="form-control" rows="3" name="alamat" required></textarea>
                </div>
            
                <button class="btn btn-outline-danger w-100 mt-2 mb-3">
                    Daftar
                </button>
              </form>

            </div>
          </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>