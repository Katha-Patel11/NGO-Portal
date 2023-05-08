<?php
    session_start();
    unset($_SESSION['admin_id']);
    echo "<script>alert('You are Logged Out');window.location='dashboard.php';</script>";
?>