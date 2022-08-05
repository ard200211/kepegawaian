<?php 
    
    function dbConnect(){
        $koneksi = mysqli_connect("localhost", "root", "", "kelompok9_if-6_kepegawaian");
        if (!$koneksi) {
            die('Koneksi Gagal');
        }
        return $koneksi;
    }


 ?>