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
            <table class="table">
                <form action="" method="post">
                    <tr>
                        <th>NIK</th>
                        <td><input type="text" name="nik" value="<?= random_int(10, 100000)?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><input type="text" name="nama" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            <select name="jk">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><input type="text" name="telepon" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><input type="text" name="alamat" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>input</td>
                    </tr>
                </form>
            </table>
        </div>

    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>