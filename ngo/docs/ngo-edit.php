<?php
session_start();
include "header.php";
?>

<head>
  <meta name="description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Bring Forth - Admin Panel</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">

    function getXMLHTTP() { //fuction to return the xml http object
      var xmlhttp = false;
      try {
        xmlhttp = new XMLHttpRequest();  // XMLHttpRequest object is used to exchange data with a server behind the scenes. 
      }
      catch (e) {
        try {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
          try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
          }
          catch (e1) {
            xmlhttp = false;
          }
        }
      }

      return xmlhttp;
    }


    // Below Function Will Fetch Data From the URL and Also Will Return Response
    function getsubcat(strURL) {
      var req = getXMLHTTP(); // fuction to get xmlhttp object
      if (req) {
        req.onreadystatechange =
          function () {
            if (req.readyState == 4) { //data is retrieved from server
              if (req.status == 200) { // which reprents ok status                    
                document.getElementById('subdiv').innerHTML = req.responseText;
              }
              else {
                alert("There was a problem while using XMLHTTP:\n");
              }
            }
          }
        req.open("GET", strURL, true); //open url using get method
        req.send(null);
      }
    }
  </script>
</head>
<!-- Sidebar menu-->
<?php
include 'aside.php';
?>
<?php
include 'connection.php';
$id = $_SESSION['ngo_id'];
$sql = "select * from tbl_ngo_master where ngo_id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$id = $row['ngo_id'];
$name = $row['ngo_name'];
$reg_no = $row['ngo_reg_no'];
$details = mysqli_real_escape_string($conn, $row['ngo_details']);
$address = mysqli_real_escape_string($conn, $row['ngo_address']);
$sid = $row['sector_id'];
$aid = $row['area_id'];
$cid = $row['city_id'];
$mo_no = $row['ngo_mobile_no'];
$email = $row['ngo_email'];
$found_year = $row['ngo_found_year'];
$image = $row['ngo_image'];
$path = $row['ngo_image'];
?>
<?php

if ($_POST) {
  $name = $_POST['ngo_name'];
  $reg_no = $_POST['ngo_reg_no'];
  $details = $_POST['ngo_details'];
  $address = $_POST['ngo_address'];
  $sid = $_POST['sector_id'];
  $aid = $_POST['area_id'];
  $cid = $_POST['city_id'];
  $mo_no = $_POST['ngo_mobile_no'];
  $email = $_POST['ngo_email'];
  $found_year = $_POST['ngo_found_year'];
  $image = $_FILES['ngo_image']['name'];
  $path = $_FILES['ngo_image']['tmp_name'];
  $sql = "update tbl_ngo_master set ngo_name='$name', ngo_reg_no='$reg_no', ngo_details='$details', ngo_address='$address',sector_id='$sid',area_id='$aid',city_id='$cid',ngo_mobile_no='$mo_no', ngo_email='$email', ngo_found_year='$found_year', ngo_image='$image' where ngo_id='$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    move_uploaded_file($path, "ngo-uploads/" . $image);
    echo "<script>alert('Record Updated Successfully');window.location = 'my-profile.php';</script>";
  }
}

?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Ngo Form</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item">Forms</li>
    </ul>
  </div>
  <div class="col-md-6" style="text-align:left;">
    <div class="tile">
      <h3 class="tile-title">Update NGO Details</h3>
      <div class="tile-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="control-label col-md-3">NGO ID</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Enter full name" name="ngo_id"
                value="<?php echo $id ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">NGO Name</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Enter full name" name="ngo_name"
                value="<?php echo $name ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">NGO Registration Number</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="text" placeholder="Enter Registration No." name="ngo_reg_no"
                value="<?php echo $reg_no ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Details of Your NGO</label>
            <div class="col-md-8">
              <textarea class="form-control" placeholder="Details" rows="5" cols="40" name="ngo_details"
                required><?php echo $details ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Address</label>
            <div class="col-md-8">
              <input class="form-control" type="address" placeholder="Enter your address" name="ngo_address"
                value="<?php echo $address ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Sector Name</label>
            <div class="col-md-8">
              <select class="form-control" name=sector_id>
                <option>------------------------Select sector------------------------</option>
                <?php
                $sq = mysqli_query($conn, "select *from tbl_sector");
                while ($row = mysqli_fetch_array($sq)) {
                  echo "<option value= '{$row['sector_id']}'>{$row['sector_name']}</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">City Name</label>
            <div class="col-md-8">
              <select class="form-control" name="city_id" onchange="getsubcat('ajax-get-city.php?city='+this.value)">
                <?php
                $q = mysqli_query($conn, "select * from tbl_city");
                echo "<option>------------------------Select city------------------------</option>";
                while ($data = mysqli_fetch_row($q)) {
                  echo "<option value='$data[0]'>$data[1]</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div id="subdiv">
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Contact Number</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Enter your contact nu." name="ngo_mobile_no"
                value="<?php echo $mo_no ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-8">
              <input class="form-control" type="email" placeholder="Enter your email" name="ngo_email"
                value="<?php echo $email ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">NGO Found year</label>
            <div class="col-md-8">
              <input class="form-control" type="year" placeholder="yyyy" name="ngo_found_year"
                value="<?php echo $found_year ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">NGO image</label>
            <div class="col-md-8">
              <input class="form-control" type="file" placeholder="Choose File" name="ngo_image" required>
            </div>
          </div>
          <!--<div class="form-group row">
                  <label class="control-label col-md-3">Create Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter your password" name="ngo_password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Confirm Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter your password" name="con_ngo_password"required>
                  </div>
                </div>
                <div class="form-group row" >
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
            <input type="submit" value="Submit" name="submit4" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input
              type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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