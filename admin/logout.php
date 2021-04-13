<?php
    session_start();
    session_unset($_SESSION['admin']);
    session_destroy();
    header('Location: ./admin-login/index.php?message=Successfully logged out!');
?>