<?php 
  session_start();
   include "header.php";
   include "connection.php";
?>
    <!-- Sidebar menu-->
    <?php
      include 'aside.php';
    ?>
    <?php
      $ngoid=$_SESSION['ngo_id'];
      $q="SELECT `tbl_ngo_master`.`ngo_id`, `tbl_ngo_master`.`ngo_name`, `tbl_ngo_master`.`ngo_reg_no`, `tbl_ngo_master`.`ngo_details`, `tbl_ngo_master`.`ngo_address`, `tbl_ngo_master`.`city_id`,`tbl_ngo_master`.`area_id`,`tbl_ngo_master`.`ngo_mobile_no`,`tbl_ngo_master`.`ngo_email`,`tbl_ngo_master`.`ngo_password`,`tbl_ngo_master`.`ngo_found_year`,`tbl_ngo_master`.`ngo_image`, `tbl_sector`.`sector_name`, `tbl_area`.`area_name`, `tbl_city`.`city_name` FROM `tbl_ngo_master` INNER JOIN `tbl_sector` ON (`tbl_ngo_master`.`sector_id` = `tbl_sector`.`sector_id`) INNER JOIN `tbl_area` ON (`tbl_ngo_master`.`area_id` = `tbl_area`.`area_id`) INNER JOIN `tbl_city` ON (`tbl_ngo_master`.`city_id` = `tbl_city`.`city_id`) WHERE `tbl_ngo_master`.`ngo_id`='$ngoid' ORDER BY `tbl_ngo_master`.`ngo_id` ASC;";
      $r=mysqli_query($conn,$q);
      $row=mysqli_fetch_array($r);
    ?>
    <main class="app-content">
      <div class="row user">
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media"><img src="../../admin/docs/ngo-uploads/<?php echo $row['ngo_image']; ?>" heigth="90px" width="150px">
                  <div class="content">
                    <br><br><h1><?php echo $row['ngo_name']; ?></h1>
                    <p class="text-muted" style="font-size:18px;"><small>Found Year : <?php echo $row['ngo_found_year']; ?></small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p><b>Details : </b><?php echo $row['ngo_details']; ?></p>
                  <p><b>Registration No. : </b><?php echo $row['ngo_reg_no']; ?></p>
                  <p><b>Address : </b><?php echo $row['ngo_address']; ?></p>                  
                  <p><b>Sector : </b><?php echo $row['sector_name']; ?></p>
                  <p><b>City : </b><?php echo $row['city_name']; ?></p>
                  <p><b>Area : </b><?php echo $row['area_name']; ?></p>
                  <p><b>Contact No. : </b><?php echo $row['ngo_mobile_no']; ?></p>
                  <p><b>E-mail : </b><?php echo $row['ngo_email']; ?></p>

                </div>
                <ul class="post-utility">
                  <li class="likes"><a href="ngo-edit.php"><i class="fa fa-fw fa-lg far fa-edit"></i>Update</a></li>
                </ul>
              </div>
            </div>
            
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