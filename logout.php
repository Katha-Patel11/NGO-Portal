<?php
   session_start();
   unset($_SESSION["user_id"]);
   echo "<script>alert('You are Logged Out');window.location='login.php';</script>";
?>