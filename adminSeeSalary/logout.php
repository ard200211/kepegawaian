<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    alert('Sukses Logout');
    echo "<script>document.location.href = '../auth/loginAdmin.php'</script>";
    exit;
?>