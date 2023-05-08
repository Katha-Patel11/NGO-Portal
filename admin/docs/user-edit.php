<?php 
  session_start();
   include "header.php";
?> 
<!-- Sidebar menu-->
    <?php
      include 'aside.php';
    ?>
<?php
    include 'connection.php';
    $id=$_GET['uid'];
    $sql= "select * from tbl_user where user_id='$id'";
    $result = mysqli_query($conn,$sql);
    
        $row=mysqli_fetch_array($result);
        $id=$row['user_id'];
        $name=$row['user_name'];
        $email=$row['user_email'];
        $address=$row['user_address'];
        $mo_no=$row['user_mobile_no'];
?>
//update
<?php
  if($_POST)
  {
    $name=$_POST['user_name'];
    $email=$_POST['user_email'];
    $address=mysqli_real_escape_string($conn,$_POST['user_address']);
    $mo_no=$_POST['user_mobile_no'];
    $sql="update tbl_user set user_name='$name', user_email= '$email',user_address ='$address',user_mobile_no='$mo_no' where user_id='$id'";
    $result = mysqli_query($conn,$sql);
      if($result)
      {
        echo "<script>alert('Record Update');window.location = 'user-table.php';</script>";
      }
  }
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>User Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">User Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Update User Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post">
              <div class="form-group row">
                  <label class="control-label col-md-3">User ID</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="user_id" value="<?php echo $id?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="user_name" value="<?php echo $name?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="user_email" value="<?php echo $email?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter your address" name="user_address"value="<?php echo $address?>" requireds>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Contact Number</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter your contact no" name="user_mobile_no" value="<?php echo $mo_no?>" required>
                  </div>
                </div>
                <!--<div class="form-group row">
                  <label class="control-label col-md-3">Create Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter your password" name="user_password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Confirm Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter your password" name="con_user_password">
                  </div>
                </div>
                <div class="form-group row" >
                  <label class="control-label col-md-3">Gender</label>
                  <div class="col-md-9">
                    <div class="form-check" >
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="Male">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="Female">Female
                      </label>
                    </div>
                  </div>
                </div>-->
                <!--<div class="form-group row">
                  <label class="control-label col-md-3">Identity Proof</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file">
                  </div>
                </div>-->
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input type="submit" value="Submit" name="submit5" class="btn btn-primary" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <?php 
        include "script.php";
    ?>
  </body>
</html>