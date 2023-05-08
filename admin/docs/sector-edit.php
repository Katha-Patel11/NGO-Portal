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
    $id=$_GET['sid'];
    $sql= "select * from tbl_sector where sector_id='$id'";
    $result = mysqli_query($conn,$sql);
    
        $row=mysqli_fetch_array($result);
        $id=$row['sector_id'];
        $name=$row['sector_name'];
?>
//update
<?php
  if($_POST)
  {
          $id=$_POST['sector_id'];
          $name=$_POST['sector_name'];
          $sql="update tbl_sector set sector_name='$name' where sector_id='$id'";
          $result = mysqli_query($conn,$sql);
          if($result)
          {
            echo "<script>alert('Record Update');window.location = 'sector-table.php';</script>";
          }
  }
 
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Sector Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Sector Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Sector Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post">
              <div class="form-group row">
                  <label class="control-label col-md-3">Sector ID</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter Sector name" name="sector_id" value="<?php echo $id?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Sector Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter Sector name" name="sector_name" value="<?php echo $name?>">
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
                  <input type="submit" value="Submit" name="submit2" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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