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
    $id=$_GET['rid'];
    $sql= "select * from tbl_requirement where req_id='$id'";
    $result = mysqli_query($conn,$sql);
    
        $row=mysqli_fetch_array($result);
        $id=$row['req_id'];
        $title=$row['req_title'];
        $details=$row['req_details'];
    
?>
<?php
  if($_POST)
  {          
    $title=$_POST['req_title'];
    $detail=mysqli_real_escape_string($conn,$_POST['req_details']);
    $status=$_POST['req_status'];
    $ngoid=$_POST['ngo_name'];
    $sql="update tbl_requirement set req_title='$title', req_details= '$detail',req_status = '$status',ngo_id='$ngoid' where req_id='$id'";
    $result = mysqli_query($conn,$sql);
      if($result)
      {
        echo "<script>alert('Record Update');window.location = 'req-table.php';</script>";
      }
  }
 
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Requirement Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Requirement Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Update Requirement Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post" >
              <div class="form-group row">
                  <label class="control-label col-md-3">Requirement ID</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="req_title" value="<?php echo $id?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Requirement title</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter requirement title" name="req_title" value="<?php echo $title?>"required>
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
                  <label class="control-label col-md-3">Requirement details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="req_details" ><?php echo $details?></textarea>
                  </div>
                </div>
                <div class="form-group row" >
                  <label class="control-label col-md-3">Status</label>
                  <div class="col-md-9">
                    <div class="form-check" >
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="req_status" value="Pending">Pending
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="req_status" value="Processing">Processing
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="req_status" value="Complete">Complete
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
                  <input type="submit" value="Submit" name="submit9" class="btn btn-primary" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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