  <?php
  session_start();
  include 'header.php';
  include 'connection.php';
  if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Session Not set');</script>";
  }
  if (isset($_POST['submit'])) {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];
    $user_id = $_SESSION['user_id'];
    $q = mysqli_query($conn, "select user_password from tbl_user where user_id='$user_id'");
    $row = mysqli_fetch_array($q);
    //Check OLd Pssword From Db and Old Password from textbox
    if ($opass == $row['user_password']) {
      if ($npass == $cpass) {
        //Update Password
        $sql = mysqli_query($conn, "update tbl_user set user_password='$npass' where user_id='$user_id'");
        if ($sql) {
          echo "<script>alert('Password Changed');window.location='about.php';</script>";
        }
      } else {
        echo "<script>alert('New and Confirm Password Do Not Match');window.location='change-password.php';</script>";
      }
    } else {
      echo "<script>alert('Old Password Not Match');window.location='change-password.php';</script>";
    }
  }
  ?>
  <div class="contact-changepass-area padding-bottom-100 padding-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6"><br><br>
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/changepass.jpg');">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
            <div class="section-title padding-top-25 margin-bottom-55">
              <h2 class="title">Set <span>New</span>Password</h2>
            </div>
          </div>
        </div>
        <div class="contact-form style-01">
          <form method="post" class="contact-page-form style-01" novalidate="novalidate">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password"><b> Old Password</b></label>
                  <input type="password" name="opass" placeholder="Enter old password" class="form-control" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password"><b> New Password</b></label>
                  <input type="password" name="npass" placeholder="Enter new Password" class="form-control" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password"><b> Confirm Password</b></label>
                  <input type="password" name="cpass" placeholder="Enter confirm password" class="form-control" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="btn-wrapper">
                  <input class="boxed-btn reverse-color" type="submit" name="submit" value="Reset">
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
  </div>
  <?php
  include "footer.php";
  ?>