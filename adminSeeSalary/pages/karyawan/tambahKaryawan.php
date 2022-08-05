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