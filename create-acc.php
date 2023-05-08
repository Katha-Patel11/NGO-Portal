<?php 
    session_start();
    include 'header.php';
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_mobile_no=$_POST['user_mobile_no'];
        $user_address=mysqli_real_escape_string($conn,$_POST['user_address']);
        $user_password=$_POST['user_password'];
        $user_con_pass=$_POST['user_con_pass'];
        if($user_con_pass==$user_password)
        {
            $userq="insert into tbl_user(user_name,user_email,user_mobile_no,user_password,user_address) values('$user_name','$user_email','$user_mobile_no','$user_password','$user_address')";
            if(mysqli_query($conn,$userq))
            {
                echo "<script> alert('Account Created'); </script>";
            }
            else
            {
                echo "<script> alert('Account Not Created'); </script>";
            }
        }
        else
        {
            echo "<script> alert('Password and confirm Password Do not match'); </script>";
        }
    }
?>
<!-- Form -->
<div class="contact-create-area padding-bottom-100 padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/createee.jpeg');">
                </div>
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/create2.jpg');">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
                        <div class="section-title padding-top-25 margin-bottom-55">
                            <span>Fill The Form</span>
                        <h2 class="title">Create your <span>Account</span></h2>
                        </div>
                    </div>
                </div>
                <!-- Form to Create Account -->
                <div class="contact-form style-01">
                    <form class="contact-page-form style-01" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"> 
                                    <label for="name"><b>User Name</b></label>
                                    <input type="text" name="user_name" placeholder="Name" class="form-control" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Email Address</b></label>
                                    <input type="email" name="user_email" placeholder="E-mail" class="form-control" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Mobile Number</b></label>
                                    <input type="number" name="user_mobile_no" placeholder="Mobile No." class="form-control" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address"><b>Address</b></label>
                                    <textarea name="user_address" id="msg" cols="1" rows="4" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Password</b></label>
                                    <input type="password" name="user_password" placeholder="Password" class="form-control" required="" pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Confirm Password</b></label>
                                    <input type="password" name="user_con_pass" placeholder="Confirm Password" class="form-control" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-wrapper">
                                    <input class="boxed-btn reverse-color" type="submit" name="submit" value="Create Account">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br><label for="fname"><b>Already have an acoount? <a href="#" style="color:#2B76BC;"> Sign up</a></b></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include "footer.php";
?>