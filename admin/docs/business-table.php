<?php 
  session_start();
   include "header.php";
?>
    <!-- Sidebar menu-->
    <?php
      include 'aside.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Business Tables</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="business-table.php">Business Tables</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Business Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Business CIN No.</th>
                  <th>User ID</th>
                  <th>Business Name</th>
                  <th>Businesss Details</th>
                  <th>Business Mobile No.</th>
                  <th>Business Address</th>
                  <th>Business Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'connection.php';
                  if(isset($_GET['did']))
                  {
                    $id = $_GET['did'];
                    $did = mysqli_query($conn,"delete from tbl_business_profile where busi_cin_no ='{$id}'");
                    if($did)
                    {
                      echo "<script>alert('Record Deleted');</script>";
                    }
                    else
                    {
                      echo "<script>alert('Record Not Deleted');</script>";
                    }
                  }
                  $q='select * from tbl_business_profile';
                  $r=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$row['busi_cin_no']."</td>";
                    echo "<td>".$row['user_id']."</td>";
                    echo "<td>".$row['busi_name']."</td>";
                    echo "<td>".$row['busi_details']."</td>";
                    echo "<td>".$row['busi_mobile_no']."</td>";
                    echo "<td>".$row['busi_address']."</td>";
                    echo "<td>".$row['busi_email']."</td>";
                    echo "<td><a href='business-edit.php?aid={$row['busi_cin_no']}'>Edit</a> | <a href='?did={$row['busi_cin_no']}'>Delete</a> </td>";
                    echo "</tr>";
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