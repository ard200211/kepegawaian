<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        echo "
            <script>
                alert('Login Dahulu');
                document.location.href = '../../../auth/loginAdmin.php';
            </script>
        ";
    }

    include '../../../config.php';
    $db = dbConnect();

    $sqlSt = "SELECT * FROM status";
    $execsqlSt = $db->query($sqlSt);

    if (isset($_POST['save'])) {
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $jk = $_POST['jk'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];

        $sqlInsert = "INSERT INTO karyawan VALUES ('$nik', '$nama', '$jk', '$telepon', '$alamat', '$jabatan', '$status', '$password')";
        $execute = $db->query($sqlInsert);
        if ($execute) {
            echo "
                <script>
                    alert('Data Sukses Insert');
                    document.locatio.href = 'karyawan.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Gagal Insert');
                    document.locatio.href = 'karyawan.php';
                </script>
            ";
        }


    }







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">
    <div class="mt-5 mb-5">
        <h1>
            <b>Insert Data Karyawan</b>
        </h1>

        <div class="mt-5">
            <a href="karyawan.php" class="btn btn-primary">Back</a>
            <table class="table">
                <form action="" method="post">
                    <tr>
                        <th>Jabatan</th>
                        <td>
                            <select name="jabatan" class="form-control">
                                <option value="" required>Pilih Jabatan</option>
                                <?php
                                    $sql = "SELECT * FROM jabatan";
                                    $execsql = $db->query($sql);
                                ?>
                                <?php foreach($execsql as $res):?>
                                    <option value="<?= $res['id_jabatan']?>"><?= $res['nama_jabatan']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select name="status" class="form-control">
                                <option value="" required>Pilih Status</option>
                                <?php foreach($execsqlSt as $resSt):?>
                                    <option value="<?= $resSt['id_status']?>"><?= $resSt['status']?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td><input type="text" name="nik" value="<?= random_int(10, 100000)?>" class="form-control" readonly></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><input type="text" name="nama" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            <select name="jk" class="form-control" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><input type="text" name="telepon" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><input type="text" name="alamat" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="password" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-primary" name="save" type="submit">Save</button></td>
                    </tr>
                </form>
            </table>
        </div>

    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>