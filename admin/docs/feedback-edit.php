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
    $id=$_GET['fid'];
    $sql= "select * from tbl_feedback where feedback_id='$id'";
    $result = mysqli_query($conn,$sql);
    
        $row=mysqli_fetch_array($result);
        $id=$row['feedback_id'];
        $date=$row['feedback_date'];
        $details=$row['feedback_details'];
?>
<?php
  if($_POST)
  {
          $id=$_POST['feedback_id'];
          $date=$_POST['feedback_date'];
          $detail=mysqli_real_escape_string($conn,$_POST['feedback_details']);
          $userid=$_POST['user_name'];
          $sql="update tbl_feedback set feedback_date='$date', feedback_details= '$detail',user_id='$userid' where feedback_id='$id'";
          $result = mysqli_query($conn,$sql);
          if($result)
          {
            echo "<script>alert('Record Update');window.location = 'feedback-table.php';</script>";
          }
  }
 
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Event Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Event Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Update Feedback Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post">
              <div class="form-group row">
                  <label class="control-label col-md-3">Feedback ID</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text"  name="feedback_id" value="<?php echo $id?>" readonly>
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
                  <label class="control-label col-md-3">Feedback Date</label>
                  <div class="col-md-8">
                    <input class="form-control" type="date" placeholder="Enter feedback date" name="feedback_date" value="<?php echo $date?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Feedback Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="feedback_details" required><?php echo $details?></textarea>
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
                  <input type="submit" value="Submit" name="submit7" class="btn btn-primary" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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