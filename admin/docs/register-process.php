<?php
  session_start();

    include 'connection.php';
    if(isset($_POST['submit1']))
    {
        $name=$_POST['admin_name'];
        $email=$_POST['admin_email'];
        //$admin_id=$_POST['id'];
        //$password=$_POST['pass'];
        $pass=$_POST['admin_password'];
        $con_pass=$_POST['con_admin_password'];
        //$gender=$_POST['gender'];
        if($pass==$con_pass)
        {
            $sql="insert into tbl_admin (admin_name,admin_email,admin_password) values('$name','$email','$pass')";
        }
        //$sql="insert into admin_tbl(name,email,admin_id,password,address,gender) values('Xyz','xyz@email.com','xyz01','12345678','Ahmedabad','Female')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:admin-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit2']))
    {
        $name=$_POST['type_name'];
        $sql="insert into tbl_type (type_name) values('$name')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:type-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit3']))
    {
        $name=$_POST['area_name'];
        $sql="insert into tbl_area (area_name) values('$name')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:area-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit4']))
    {
        $name=$_POST['ngo_name'];
        $reg_no=$_POST['ngo_reg_no'];
        $details=$_POST['ngo_details'];
        $address=$_POST['ngo_address'];
        $mo_no=$_POST['ngo_mobile_no'];
        $email=$_POST['ngo_email'];
        $pass=$_POST['ngo_password'];
        $con_pass=$_POST['con_ngo_password'];
        $found_year=$_POST['ngo_found_year'];
        if($pass==$con_pass)
        {
            $sql="insert into tbl_ngo_master (ngo_name,ngo_reg_no,ngo_details,ngo_address,ngo_mobile_no,ngo_email,ngo_password,ngo_found_year) values('$name','$reg_no','$details','$address','$mo_no','$email','$pass','$found_year')";
        }
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:ngo-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }

    if(isset($_POST['submit5']))
    {
        $name=$_POST['user_name'];
        $email=$_POST['user_email'];
        $address=$_POST['user_address'];
        $mo_no=$_POST['user_mobile_no'];
        $pass=$_POST['user_password'];
        $con_pass=$_POST['con_user_password'];
        if($pass==$con_pass)
        {
            $sql="insert into tbl_user (user_name,user_email,user_password,user_address,user_mobile_no) values('$name','$email','$pass','$address','$mo_no')";
        }
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:user-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit6']))
    {
        $amount=$_POST['donation_amount'];
        $sql="insert into tbl_donation (donation_amount) values('$amount')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:donation-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit7']))
    {
        $date=$_POST['feedback_date'];
        $detail=$_POST['feedback_details'];
        $sql="insert into tbl_feedback (feedback_date,feedback_detail) values('$feedback_date','$feedback_detail')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:feedback-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit8']))
    {
        $name=$_POST['event_name'];
        $detail=$_POST['event_details'];
        $date=$_POST['event_date'];
        $image=$_POST['feedback_image'];
        $sql="insert into tbl_event (event_name,event_detail,event_date,event_image) values('$name','$detail','$date','$image')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:event-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit9']))
    {
        $title=$_POST['req_title'];
        $detail=$_POST['event_details'];
        $date=$_POST['status'];
        $sql="insert into tbl_requirement (req_title,req_detail,status) values('$title','$detail','$status')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:req-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit10']))
    {
        $name=$_POST['volunteer_name'];
        $email=$_POST['volunteer_email'];
        $address=$_POST['volunteer_address'];
        $mo_no=$_POST['volunteer_mobile_no'];
        $pass=$_POST['volunteer_password'];
        $con_pass=$_POST['con_volunteer_password'];
        $dob=$_POST['volunteer_dob'];
        $gender=$_POST['volunteer_gender'];
        if($pass==$con_pass)
        {
            $sql="insert into tbl_volunteer (volunteer_name,volunteer_email,volunteer_password,volunteer_address,volunteer_mobile_no,volunteer_dob,volunteer_gender) values('$name','$email','$pass','$address','$mo_no','$dob','$gender')";
        }
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:user-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit11']))
    {
        $name=$_POST['item_name'];
        $detail=$_POST['item_details'];
        $cat=$_POST['category'];
        $sql="insert into tbl_item (item_name,item_detail,item_category) values('$name','$detail','$cat')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:item-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit12']))
    {
        $cin_no=$_POST['busi_cin_no'];
        $name=$_POST['busi_name'];
        $detail=$_POST['busi_details'];
        $mo_no=$_POST['busi_mobile_no'];
        $address=$_POST['busi_address'];
        $email=$_POST['busi_email'];
        $sql="insert into tbl_business_profile (busi_cin_no,busi_name,busi_detail,busi_mobile_no,busi_address,busi_email) values('$cin_no','$name','$detail','$mo_no','$address','$email')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:business-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }


    if(isset($_POST['submit13']))
    {
        $title=$_POST['blog_title'];
        $detail=$_POST['blog_details'];
        $date=$_POST['blog_date'];
        $sql="insert into tbl_blog (blog_title,blog_detail,blog_date) values('$title','$detail','$date')";
        if(mysqli_query($conn,$sql))
        {
            //echo "Successful";
            header("location:item-table.php");
        }
        else
        {
            echo "Problem".mysqli_error($conn);
        }
    }
?>