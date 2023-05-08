<?php 
  session_start();
   include "header.php";
   include 'connection.php';
?>
    <!-- Sidebar menu-->
    <?php
      include 'aside.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Business Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active"><a href="#">Business Profile</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Business Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Business CIN No.</th>
                  <th>Business Name</th>
                  <th>Businesss Details</th>
                  <th>Business Mobile No.</th>
                  <th>Business Address</th>
                  <th>Business Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $q='select * from tbl_business_profile';
                  $r=mysqli_query($conn,$q);
                  $i=1;
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['busi_cin_no']."</td>";
                    echo "<td>".$row['busi_name']."</td>";
                    echo "<td>".$row['busi_details']."</td>";
                    echo "<td>".$row['busi_mobile_no']."</td>";
                    echo "<td>".$row['busi_address']."</td>";
                    echo "<td>".$row['busi_email']."</td>";
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