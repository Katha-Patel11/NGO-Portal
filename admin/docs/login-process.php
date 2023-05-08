<?php

    $conn=mysqli_connect("localhost","root","","ngo_db");
    if(!$conn)
    {
        echo "Connection Failed";
    }  
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="select * from admin_tbl where email='$email'";
    $result=mysqli_query($conn,$sql);

?>