<?php
    session_start();
    unset($_SESSION['ngo_id']);
    echo "<script>alert('You are Logged Out');window.location='page-login.php';</script>";
?>