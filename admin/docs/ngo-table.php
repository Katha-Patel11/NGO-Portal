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
          <h1><i class="fa fa-th-list"></i> Basic Tables</h1>
          <p>Basic bootstrap tables</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Tables</li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">NGO Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                    <th>NGO ID</th>
                    <th>NGO Name</th>
                    <th>NGO Registration No.</th>
                    <th>NGO Details</th>
                    <th>NGO Address</th>
                    <th>Sector ID</th>
                    <th>Area ID</th>
                    <th>City ID</th>
                    <th>NGO Mobile No.</th>
                    <th>NGO Email</th>
                    <th>NGO Password</th>
                    <th>NGO Found Year</th>
                    <th>NGO Image</th>
                    <th>Is Valid</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'connection.php';
                  if(isset($_GET['did']))
                  {
                    $id = $_GET['did'];
                    $did = mysqli_query($conn,"delete from tbl_ngo_master where ngo_id ='{$id}'");
                    if($did)
                    {
                      echo "<script>alert('Record Deleted');</script>";
                    }
                    else
                    {
                      echo "<script>alert('Record Not Deleted');</script>";
                    }
                  }
                  if(isset($_GET['vid']))
                  {
                    $id = $_GET['vid'];
                    $vid = mysqli_query($conn,"update tbl_ngo_master set is_valid='1' where ngo_id='$id'");
                    if($vid)
                    {
                      echo "<script>alert('NGO Registered');</script>";
                    }
                    else
                    {
                      echo "<script>alert('NGO Not Registered');</script>";
                    }
                  }
                  $q='select * from tbl_ngo_master';
                  $r=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$row['ngo_id']."</td>";
                    echo "<td>".$row['ngo_name']."</td>";
                    echo "<td>".$row['ngo_reg_no']."</td>";
                    echo "<td>".$row['ngo_details']."</td>";
                    echo "<td>".$row['ngo_address']."</td>";
                    echo "<td>".$row['sector_id']."</td>";
                    echo "<td>".$row['area_id']."</td>";
                    echo "<td>".$row['city_id']."</td>";
                    echo "<td>".$row['ngo_mobile_no']."</td>";
                    echo "<td>".$row['ngo_email']."</td>";
                    echo "<td>".$row['ngo_password']."</td>";
                    echo "<td>".$row['ngo_found_year']."</td>";
                    echo "<td>".$row['ngo_image']."</td>";
                    echo "<td>".$row['is_valid']."</td>";
                    echo "<td><a href='ngo-edit.php?nid={$row['ngo_id']}'>Edit</a> | <a href='?did={$row['ngo_id']}'>Delete</a> ";
                    if($row['is_valid']==0)
                    {
                      echo "| <a href='?vid={$row['ngo_id']}'>Valid</a>";
                    }
                    echo "</td>";
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