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
          <h1><i class="fa fa-th-list"></i> Requirement Tables</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="req-table.php">Requirement Tables</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Requirement Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Req ID</th>
                  <th>Req Title</th>
                  <th>Req Details</th>
                  <th>NGO ID</th>
                  <th>Req Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'connection.php';
                  if(isset($_GET['did']))
                  {
                    $id = $_GET['did'];
                    $did = mysqli_query($conn,"delete from tbl_requirement where req_id ='{$id}'");
                    if($did)
                    {
                      echo "<script>alert('Record Deleted');</script>";
                    }
                    else
                    {
                      echo "<script>alert('Record Not Deleted');</script>";
                    }
                  }
                  $q='select * from tbl_requirement';
                  $r=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$row['req_id']."</td>";
                    echo "<td>".$row['req_title']."</td>";
                    echo "<td>".$row['req_details']."</td>";
                    echo "<td>".$row['ngo_id']."</td>";
                    echo "<td>".$row['req_status']."</td>";
                    echo "<td><a href='?did={$row['req_id']}'>Delete</a> </td>";
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