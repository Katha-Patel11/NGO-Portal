<!DOCTYPE html>
<?php
  session_start();
  include 'connection.php';
  if(isset($_POST['submit']))
  {
        $email=$_POST['ngo_email'];
        $pass=$_POST['ngo_password'];
        $sql="select * from tbl_ngo_master where ngo_email='$email'";
        $row=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($row);
        if($count>0)
        {
          $row=mysqli_fetch_array($row);
          $id=$row['ngo_id'];
          $_SESSION['ngo_id']=$id;
          if($row['ngo_password']==$pass)
          {
            echo "<script>alert('Login Successful');window.location='dashboard.php';</script>";
          }
          else
          {
            echo "<script>alert('Login Unsuccessful');</script>";
          }
        }
        else
        {
        echo "<script>alert('Login Unsuccessful');</script>"; 
        }
    
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali ngo</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content ">
      <div class="login-box col-md-4">
        <form class="login-form " method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>NGO SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">NGO E-MAIL</label>
            <input class="form-control" type="email" placeholder="Email" autofocus name="ngo_email" required>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="ngo_password" required>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="forget-password.php">Forget Password ?</a>
            </div>
          </div>
          <div class="form-group btn-container">
            <!--<input type="submit" name="change-password" value="Change Password" class="btn btn-primary btn-block">-->
            <input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-block">
          </div>  
        </form>
        <!--Forget Password
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forget Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>-->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>