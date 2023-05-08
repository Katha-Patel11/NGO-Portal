<?php
    session_start();
    include "connection.php";
    if (isset($_SESSION['user_id'])) 
    {
        $iid = $_GET['iid'];
        $userid = $_SESSION['user_id'];
        $q = "insert into tbl_cart(user_id,item_id,qty) values('$userid','$iid','1')";
        $res = mysqli_query($conn, $q);
        if($res)
        {
            echo "<script>window.location='cart.php';</script>";
        }
    }
    else 
    {
        echo "<script>alert('You will have to log in.');window.location='login.php';</script>";
    }
