<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        echo "
            <script>
                alert('Login Dahulu');
                document.location.href = '../auth/loginUser.php';
            </script>
        ";
    }
    include '../config.php';
    $db = dbConnect();
    $ss = $_SESSION['username'];
    $sql = "SELECT a.*, b.*, c.* FROM ((karyawan as a
            INNER JOIN jabatan as b ON a.id_jabatan = b.id_jabatan)
            INNER JOIN status as c ON a.id_status = c.id_status)
            WHERE NIK = '$ss'";
    $execSql = $db->query($sql);
    $assocSql = $execSql->fetch_assoc();

    $sqlLog = "SELECT a.*, b.* FROM (log_karyawan as a
                INNER JOIN jabatan as b ON a.gaji_lama = b.id_jabatan)
               WHERE nik = '$ss'";
    $execLog = $db->query($sqlLog);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
  <link href="../adminSeeSalary/dist/css/adminSeeSalary.min.css" rel="stylesheet">
	<title>SeeSalary!</title>
</head>
<style type="text/css">
  li{
    margin-left: 40px;
  }

</style>
<body>


<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3">
  <div class="container">
    <a class="navbar-brand" href="">
      <h1 style="color: #4e73df;">
        <b>See$alary!</b>
      </h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="text-danger" style="text-decoration: none;" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container">
    
    <div class="mt-5 mb-3">
      <h5>
        <i>
          Halo, Nama <?= $assocSql['nama']?>
        </i>
      </h5>
    </div>


    <div class="mt-5 mb-5">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <th>Status</th>
          </tr> 
        </thead>
        <tr>
          <td>1</td>
          <td><?= $assocSql['NIK']?></td>
          <td><?= $assocSql['nama']?></td>
          <td><?= $assocSql['nama_jabatan']?></td>
          <td><?= $assocSql['jumlah_gaji']?></td>
          <td><?= $assocSql['status']?></td>
        </tr>
      </table>      
    </div>
    <br>
    <br>
    <div class="mt-5 mb-3">
          <h5>
            <i>
              Log Gaji Karyawan
            </i>
          </h5>
        </div>


        <div class="mt-5 mb-5">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Jabatan Lama</th>
                <th>Tanggal Ubah</th>
              </tr> 
            </thead>
            <?php $i = 1; foreach($execLog as $resLog):?>
            <tr>
              <td><?= $i++;?></td>
              <td><?= $resLog['nik']?></td>
              <td><?= $resLog['nama_jabatan']?></td>
              <td><?= $resLog['waktu']?></td>
            </tr>
            <?php endforeach;?>
          </table>      
        </div>
      </div>

  </div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa kamu yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../adminSeeSalary/dist/vendor/jquery/jquery.min.js"></script>
    <script src="../adminSeeSalary/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../adminSeeSalary/dist/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../adminSeeSalary/dist/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>