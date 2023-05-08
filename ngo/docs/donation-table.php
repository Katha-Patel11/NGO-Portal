<?php 
  session_start();
   include "header.php";
   include 'connection.php';
   $ngoid=$_SESSION['ngo_id'];
?>
    <!-- Sidebar menu-->
    <?php
      include 'aside.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>  Donations</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active"><a href="#">Donations</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Donation Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>User Email</th>
                    <th>Donation Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $q="SELECT `tbl_donation`.`donation_id`, `tbl_donation`.`donation_amount`, `tbl_donation`.`ngo_id`, `tbl_user`.`user_id`,`tbl_user`.`user_email` FROM `tbl_donation` INNER JOIN `tbl_user` ON (`tbl_donation`.`user_id` = `tbl_user`.`user_id`) WHERE `tbl_donation`.`ngo_id`='$ngoid' ORDER BY `tbl_donation`.`donation_id` ASC;";
                  $r=mysqli_query($conn,$q);
                  $i=1;
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['user_email']."</td>";
                    echo "<td>".$row['donation_amount']."</td>";
                    echo "</tr>";
                    $i++;
                  }
                ?>
              </tbody>
            </table>
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