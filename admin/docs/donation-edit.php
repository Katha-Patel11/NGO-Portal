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
    $id=$_GET['doid'];
    $sql= "select * from tbl_donation where donation_id='$id'";
    $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $id=$row['donation_id'];
        $ngoid=$row['ngo_id'];
        $amount=$row['donation_amount'];
?>
//update
<?php
  if($_POST)
  {
          $ngoid=$_POST['ngo_name'];
          $id=$_POST['donation_id'];
          $user_id=$_POST['user_name'];
          $amount=$_POST['donation_amount'];
          $sql="update tbl_donation set ngo_id='$ngoid',donation_amount='$amount',user_id='$user_id' where donation_id='$id'";
          $result = mysqli_query($conn,$sql);
          if($result)
          {
            echo "<script>alert('Record Update');window.location = 'donation-table.php';</script>";
          }
  }
 
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Donation Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Donation Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Update Donation Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post">
                <div class="form-group row">
                    <label class="control-label col-md-3">Donation ID</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Enter amount" name="donation_id" value="<?php echo $id?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">NGO Name</label>
                  <div class="col-md-8">
                  <select class="form-control col-md-15" name="ngo_name">
                    <?php
                      $q=mysqli_query($conn,"select * from tbl_ngo_master");
                      while($row=mysqli_fetch_array($q))
                      {
                        //echo "<option value=".$row['sector_id'].">". $row['sector_name']." </option>";
                        echo "<option value='{$row['ngo_id']}'> {$row['ngo_name']} </option>";
                      }
                    ?>
                  </select>
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
                              //echo "<option value=".$row['sector_id'].">". $row['sector_name']." </option>";
                              echo "<option value='{$row['user_id']}'> {$row['user_name']} </option>";
                            }
                          ?>
                        </select>
                      </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Amount</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" placeholder="Enter amount" name="donation_amount" value="<?php echo $amount?>"required>
                  </div>
                </div>
                
                <!--<div class="form-group row" >
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
                  <input type="submit" value="Submit" name="submit6" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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