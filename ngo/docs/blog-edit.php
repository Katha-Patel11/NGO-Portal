<?php 
  session_start();
   include "header.php";
?>
<!-- Sidebar menu-->
    <?php
      include 'aside.php';
      include 'connection.php';
      $id=$_GET['bid'];
      $sql="select * from tbl_blog where blog_id='$id'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      $bid=$row['blog_id'];
      $btitle=$row['blog_title'];
      $bdetails=$row['blog_details'];
      $bdate=$row['blog_date'];
    ?>
<?php
    if(isset($_POST['submit']))
    {
        $bid=$_POST['blog_id'];
        $btitle=$_POST['blog_title'];
        $bdetails=mysqli_real_escape_string($conn,$_POST['blog_details']);
        $bdate=$_POST['blog_date'];
        $image=$_FILES['blog_image']['name'];
        $path=$_FILES['blog_image']['tmp_name'];
        $ngoid=$_POST['ngo_name'];
        $sql="update tbl_blog set blog_id='$bid',blog_title='$btitle',blog_details='$bdetails',blog_date='$bdate',ngo_id='$ngoid',blog_image='$image' where blog_id='$bid'";
        if(mysqli_query($conn,$sql))
        {
          move_uploaded_file($path,"blog-uploads/".$image);
          echo "<script>window.location='blog-table.php';</script>";
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
            <h3 class="tile-title">Blog Update Form </h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                  <label class="control-label col-md-3">Blog Id</label>
                  <div class="col-md-8">
                  <input class="form-control" type="text" placeholder="" name="blog_id" value="<?php echo $bid; ?>" readonly>
                  </div>
                </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Blog Title</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter title" name="blog_title" value="<?php echo $btitle; ?>" required>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="blog_details" ><?php echo $bdetails; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Date</label>
                  <div class="col-md-8">
                    <input class="form-control" type="date" placeholder="Enter date" name="blog_date" value="<?php echo $bdate; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Blog image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" placeholder="Choose File" name="blog_image" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">NGO Name</label>
                  <div class="col-md-8">
                  <select class="form-control col-md-15" name="ngo_name">
                    <option>-------------------Select NGO Name-------------------</option>
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