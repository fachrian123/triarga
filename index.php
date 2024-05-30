<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Toko Triarga</title>
    <script>
      function updateNilai(nilai) {
          document.getElementById('nilai_terpilih').innerHTML = nilai;
      }
    </script>
</head>

<body>
      
      <?php
        session_start();

        include "navbar.php";

        $halaman = $_GET['hal'];

        switch ($halaman) {
        case "home":
            include "_home.php";
            break;
        case "alamat":
            include "_alamat.php";
            break;
        case "tentang":
            include "_tentang.php";
            break;
        case "detail":
            include "_detail_barang.php";
            break;
        case "edit":
            include "_edituser.php";
            break;
        case "pembayaran":
            include "_pembayaran.php";
            break;
        case "proses":
            include "_proses.php";
            break;
        case "rating":
            include "_rating.php";
            break;
        case "cari":
            include "_cari.php";
            break;
        default:
            header('Location:?hal=home');
        }

        include "modal.php";

      ?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#proses-transaksi').DataTable({
                "language": {
                    "url": "js/dt_ina.json"
                }
            });
        });
    </script>
</body>
</html>