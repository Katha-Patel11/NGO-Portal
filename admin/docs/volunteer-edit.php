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
    $id=$_GET['vid'];
    $sql= "select * from tbl_volunteer where volunteer_id='$id'";
    $result = mysqli_query($conn,$sql);
    
        $row=mysqli_fetch_array($result);
        $id=$row['volunteer_id'];
        $name=$row['volunteer_name'];
        $email=$row['volunteer_email'];
        $address=$row['volunteer_address'];
        $mo_no=$row['volunteer_mobile_no'];
        $dob=$row['volunteer_dob'];
        $gender=$row['volunteer_gender'];
?>
<?php
  if($_POST)
  {
    $name=$_POST['volunteer_name'];
    $email=$_POST['volunteer_email'];
    $address=mysqli_real_escape_string($conn,$_POST['volunteer_address']);
    $mo_no=$_POST['volunteer_mobile_no'];
    $dob=$_POST['volunteer_dob'];
    $gender=$_POST['volunteer_gender'];          
    $sql="update tbl_volunteer set volunteer_name='$name', volunteer_email= '$email', volunteer_address ='$address',volunteer_mobile_no='$mo_no',volunteer_dob ='$dob',volunteer_gender='$gender' where volunteer_id='$id'";
    $result = mysqli_query($conn,$sql);
      if($result)
      {
        echo "<script>alert('Record Update');window.location = 'volunteer-table.php';</script>";
      }
  }
?><main class="app-content">
<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i>Volunteer Form</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item"><a href="#">Volunteer Form</a></li>
  </ul>
</div>
  <div class="col-md-6" style="text-align:left;">
    <div class="tile">
      <h3 class="tile-title">Update Volunteer Details</h3>
      <div class="tile-body">
        <form class="form-horizontal" method="post">
        <div class="form-group row">
            <label class="control-label col-md-3">Volunteer ID</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="volunteer_id" value="<?php echo $id?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Volunteer Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Enter Volunteer name" name="volunteer_name" value="<?php echo $name?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="volunteer_email" value="<?php echo $email?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Address</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Enter your address" name="volunteer_address" value="<?php echo $address?>"required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Contact Number</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Enter your contact no" name="volunteer_mobile_no" value="<?php echo $mo_no?>"requireds>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Date Of Birth</label>
            <div class="col-md-8">
              <input class="form-control" type="date" placeholder="Enter your dob" name="volunteer_dob" value="<?php echo $dob?>"required>
            </div>
          </div>
          <div class="form-group row" >
            <label class="control-label col-md-3">Gender</label>
            <div class="col-md-9">
              <div class="form-check" >
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="volunteer_gender" value="Male">Male
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="volunteer_gender" value="Female">Female
                </label>
              </div>
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
            <input type="submit" value="Submit" name="submit10" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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