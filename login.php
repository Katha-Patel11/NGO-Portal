<html>

<head>

  <?php
  session_start();
  include "header.php";
  include 'connection.php';
  if (isset($_POST['submit'])) {
    $email = $_POST['user_email'];
    $pass = $_POST['user_password'];
    $sql = "select * from tbl_user where user_email='$email' and user_password='$pass'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      $row = mysqli_fetch_array($res);
      $_SESSION['user_id'] = $row['user_id'];
      if ($row['user_password'] == $pass) {
        echo "<script>alert('Login Successful');window.location='about.php';</script>";
      } else {
        echo "<script>alert('Login not successful');</script>";
      }
    } else {
      echo "<script>alert('Login not successful');</script>";
    }
  }
  ?>
  <div class="contact-login-area padding-bottom-100 padding-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/login.jpg');">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
                <div class="section-title padding-top-25 margin-bottom-55">
                <span>Fill The Form</span>
                <h2 class="title">Log <span>In</span></h2>
              </div>
            </div>
          </div>
        <div class="contact-form style-01">
          <form method="post" class="contact-page-form style-01">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email"><b>Eamil Id</b></label>
                  <input type="text" name="user_email" placeholder="Enter user name" class="form-control" required="" aria-required="true">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password"><b>Password</b></label>
                  <input type="password" name="user_password" placeholder="Enter password" class="form-control" required="" aria-required="true">
                </div>
              </div>
              <div class="col-md-12">
                <div class="btn-wrapper">
                  <input class="boxed-btn reverse-color" type="submit" name="submit" value="LogIn">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>
                    <b><input type="checkbox" checked="checked" name="remember"> Stay Signed in </b>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b><a href="forget-password.php">Forgot Password ?</b></a>
                    <!--<b><a href="change-password.php">Change Password</b></a>-->
                  </label>
                </div>
              </div>
            </div>
        </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
  <?php
  include "footer.php";
  ?>