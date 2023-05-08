<?php
session_start();
include "header.php";
include 'connection.php';
$ngoid = $_SESSION['ngo_id'];
?>
<!-- Sidebar menu-->
<?php
include 'aside.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Orders</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">View</li>
      <li class="breadcrumb-item active"><a href="#">Orders</a></li>
    </ul>
  </div>
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Order Table</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>User Email</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $ngoid = $_SESSION['ngo_id'];
          $q = "SELECT `tbl_user`.`user_email`,`tbl_item`.`item_name`,`tbl_item`.`item_price`,`tbl_order_master`.`order_date`,`tbl_order_details`.`qty` FROM `tbl_order_details` INNER JOIN `tbl_order_master` ON (`tbl_order_details`.`order_id` = `tbl_order_master`.`order_id`) INNER JOIN `tbl_item` ON (`tbl_order_details`.`item_id` = `tbl_item`.`item_id`) INNER JOIN `tbl_ngo_master` ON (`tbl_item`.`ngo_id` = `tbl_ngo_master`.`ngo_id`) INNER JOIN `tbl_user` ON (`tbl_order_master`.`user_id` = `tbl_user`.`user_id`) WHERE `tbl_ngo_master`.`ngo_id`='$ngoid' ORDER BY `tbl_order_details`.`order_details_id` ASC;";
          $r = mysqli_query($conn, $q);
          $i = 1;
          while ($row = mysqli_fetch_array($r)) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['user_email'] . "</td>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['item_price'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['order_date'] . "</td>";
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