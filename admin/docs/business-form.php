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
  if(isset($_POST['submit12']))
  {
    $cin_no=$_POST['busi_cin_no'];
    $name=$_POST['busi_name'];
    $uid=$_POST['user_name'];
    $detail=mysqli_real_escape_string($conn,$_POST['busi_details']);
    $mo_no=$_POST['busi_mobile_no'];
    $address=mysqli_real_escape_string($conn,$_POST['busi_address']);
    $email=$_POST['busi_email'];
    $sql="insert into tbl_business_profile (busi_cin_no,user_name,busi_name,busi_details,busi_mobile_no,busi_address,busi_email) values('$cin_no','$uid','$name','$detail','$mo_no','$address','$email')";
    if(mysqli_query($conn,$sql))
    {
      echo "<script>window.location='business-table.php';</script>";
    }
    else
    {
      echo "Problem".mysqli_error($conn);
    }
  }
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Business Form</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item"><a href="#">Business Form</a></li>
    </ul>
  </div>
    <div class="col-md-6" style="text-align:left;">
      <div class="tile">
        <h3 class="tile-title">Business Details</h3>
        <div class="tile-body">
          <form class="form-horizontal" method="post" >
            <div class="form-group row">
              <label class="control-label col-md-3">Business CIN Number</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Enter CIN no." name="busi_cin_no" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">User Name</label>
                <div class="col-md-8">
                  <select class="form-control col-md-15" name="user_name">
                    <?php
                      $q=mysqli_query($conn,"select * from tbl_user");
                      while($row=mysqli_fetch_array($q))
                      {
                        echo "<option value='{$row['user_id']}'> {$row['user_name']} </option>";
                      }
                    ?>
                  </select>
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Business Name</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Enter name" name="busi_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Business Details</label>
              <div class="col-md-8">
                <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="busi_details"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Contact Number</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Enter contact no" name="busi_mobile_no">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Enter address" name="busi_address">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-8">
                <input class="form-control" type="email" placeholder="Enter email" name="busi_email">
              </div>
            </div>
            
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
              <input type="submit" value="Submit" name="submit12" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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