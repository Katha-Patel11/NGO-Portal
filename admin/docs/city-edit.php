<?php 
  session_start();
   include "header.php";
?>
<!-- Sidebar menu-->
    <?php
      include 'aside.php';
      include 'connection.php';
      $id=$_GET['aid'];
      $sql="select * from tbl_City where City_id='$id'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      $cid=$row['city_id'];
      $cname=$row['city_name'];
    ?>
<?php
    if($_POST)
    {
        $id=$_POST['city_id'];
        $name=$_POST['city_name'];
        $sql="update tbl_city set city_name='$name' where city_id='$id'";
        if(mysqli_query($conn,$sql))
        {
          echo "<script>window.location='city-table.php';</script>";
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
            <h3 class="tile-title">City Update Form </h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post" >
              <div class="form-group row">
                  <label class="control-label col-md-3">City Id</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="city_id" value="<?php echo $cid; ?>" readonly> 
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">City Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="city_name" value="<?php echo $cname; ?>" required>
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