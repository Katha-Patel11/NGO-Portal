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
          <h1><i class="fa fa-th-list"></i> Volunteers</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active"><a href="#">Volunteers</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Volunteer Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Volunteer Name</th>
                  <th>Volunteer Email</th>
                  <th>Volunteer Mobile No.</th>
                  <th>Volunteer Address</th>
                  <th>Volunteer DOB</th>
                  <th>Volunteer Gender</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $q='select * from tbl_volunteer';
                  $r=mysqli_query($conn,$q);
                  $i=1;
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['volunteer_name']."</td>";
                    echo "<td>".$row['volunteer_email']."</td>";
                    echo "<td>".$row['volunteer_mobile_no']."</td>";
                    echo "<td>".$row['volunteer_address']."</td>";
                    echo "<td>".$row['volunteer_dob']."</td>";
                    echo "<td>".$row['volunteer_gender']."</td>";
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