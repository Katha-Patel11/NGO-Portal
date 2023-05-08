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
          <h1><i class="fa fa-th-list"></i> Event Tables</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="event-table.php">Event Tables</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Event Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Event Time</th>
                    <th>Event Address</th>
                    <th>NGO ID</th>
                    <th>Event Details</th>
                    <th>Event Price</th>
                    <th>Event Date</th>
                    <th>Event Image</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'connection.php';
                  if(isset($_GET['did']))
                  {
                    $id = $_GET['did'];
                    $did = mysqli_query($conn,"delete from tbl_event where event_id ='{$id}'");
                    if($did)
                    {
                      echo "<script>alert('Record Deleted');</script>";
                    }
                    else
                    {
                      echo "<script>alert('Record Not Deleted');</script>";
                    }
                  }
                  $q='select * from tbl_event';
                  $r=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$row['event_id']."</td>";
                    echo "<td>".$row['event_name']."</td>";
                    echo "<td>".$row['event_time']."</td>";
                    echo "<td>".$row['event_address']."</td>";
                    echo "<td>".$row['ngo_id']."</td>";
                    echo "<td>".$row['event_details']."</td>";
                    echo "<td>".$row['event_price']."</td>";
                    echo "<td>".$row['event_date']."</td>";
                    echo "<td>".$row['event_image']."</td>";
                    echo "<td><a href='event-edit.php?eid={$row['event_id']}'>Edit</a> | <a href='?did={$row['event_id']}'>Delete</a> </td>";
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