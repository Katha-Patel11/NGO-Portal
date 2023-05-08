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
      if(isset($_POST['submit8']))
      {
          $name=$_POST['event_name'];
          $time=$_POST['event_time'];
          $address=mysqli_real_escape_string($conn,$_POST['event_address']);
          $detail=mysqli_real_escape_string($conn,$_POST['event_details']);
          $price=$_POST['event_price'];
          $date=$_POST['event_date'];
          $image=$_FILES['event_image']['name'];
          $path=$_FILES['event_image']['tmp_name'];
          $ngoid=$_POST['ngo_name'];
          $sql="insert into tbl_event (event_name,event_time,event_address,event_details,event_price,event_date,event_image,ngo_id) values('$name','$time','$address','$detail','$price','$date','$image','$ngoid')";
              
          if(mysqli_query($conn,$sql))
          {
            move_uploaded_file($path,"event-uploads/".$image);
            echo "<script>window.location='event-table.php';</script>";
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
            <h3 class="tile-title">Event Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="control-label col-md-3">Event Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter event name" name="event_name" required>
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
                <div class="form-group row">
                  <label class="control-label col-md-3">Event Time</label>
                  <div class="col-md-8">
                    <input class="form-control" type="time" placeholder="Enter time" name="event_time">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Event Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" placeholder="Address" rows="5" cols="40" name="event_address"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Event details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="event_details"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Event Price</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" placeholder="Enter price" name="event_price">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Event date</label>
                  <div class="col-md-8">
                    <input class="form-control" type="date" placeholder="Enter date" name="event_date">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Event image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" placeholder="Choose file" name="event_image">
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
                  <input type="submit" value="Submit" name="submit8" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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