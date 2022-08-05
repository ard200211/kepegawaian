<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    
    echo "
        <script>
            alert('Sukses Logout');
            document.location.href = '../auth/loginAdmin.php';
        </script>
        ";
    exit;
?>