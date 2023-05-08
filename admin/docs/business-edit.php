<?php 
  session_start();
   include "header.php";
?>
<!-- Sidebar menu-->
    <?php
      include 'aside.php';
      include 'connection.php';
      $id=$_GET['aid'];
      $sql="select * from tbl_business_profile where busi_cin_no='$id'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      $b_cin=$row['busi_cin_no'];
      $b_name=$row['busi_name'];
      $b_details=$row['busi_details'];
      $b_mno=$row['busi_mobile_no'];
      $b_address=$row['busi_address'];
      $b_email=$row['busi_email'];

    ?>
<?php
    if($_POST)
    {
      $b_cin=$_POST['busi_cin_no'];
      $user_id=$_POST['user_name'];
      $b_name=$_POST['busi_name'];
      $b_details=mysqli_real_escape_string($conn,$_POST['busi_details']);
      $b_mno=$_POST['busi_mobile_no'];
      $b_address=mysqli_real_escape_string($conn,$_POST['busi_address']);
      $b_email=$_POST['busi_email'];
        $sql="update tbl_business_profile set busi_cin_no='$b_cin',user_id='$user_id',busi_name='$b_name',busi_details='$b_details',busi_mobile_no='$b_mno',busi_address='$b_address',busi_email='$b_email' where busi_cin_no='$b_cin'";
        if(mysqli_query($conn,$sql))
        {
          echo "<script>window.location='business-table.php';</script>";
        }
        else
        {
           echo "<script>alert('Data not updated');</script>";
        }
    }
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Form Samples</h1>
          <p>Sample forms</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Business Update Form </h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post" >
              <div class="form-group row">
                  <label class="control-label col-md-3">Business CIN Number</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter CIN no." name="busi_cin_no" value="<?php echo $b_cin; ?>" readonly>
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
                    <input class="form-control" type="text" placeholder="Enter name" name="busi_name" value="<?php echo $b_name; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Business Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="busi_details"><?php echo $b_details; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Contact Number</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter contact no" name="busi_mobile_no" value="<?php echo $b_mno; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter address" name="busi_address" value="<?php echo $b_address; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" placeholder="Enter email" name="busi_email" value="<?php echo $b_email; ?>">
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input type="submit" value="Update" name="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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