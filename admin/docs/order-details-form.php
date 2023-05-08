<?php 
  session_start();
   include "header.php";
?> 
<!-- Sidebar menu-->
<?php
  include 'aside.php';
?>
<?php
  include 'connection.php';
  if(isset($_POST['submit']))
  {
    $oid=$_POST['order_details_id'];
    $ooid=$_POST['order_id'];
    $iid=$_POST['item_id'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $sql="insert into tbl_order_details (order_id,item_id,qty,price) values('$ooid','$iid','$qty','$price')";
    if(mysqli_query($conn,$sql))
    {
      echo "<script>window.location='order-details-table.php';</script>";
    }
    else
    {
        echo "Problem".mysqli_error($conn);
    }
  }
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Order Deatils Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Order Deatils Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Order Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post">
              <div class="form-group row">
                  <label class="control-label col-md-3">Order Name</label>
                  <div class="col-md-8">
                    <select class="form-control col-md-15" name="order_id">
                      <option>-------------------Select Order Name-------------------</option>
                      <?php
                        $q=mysqli_query($conn,"select * from tbl_order_master");
                        while($row=mysqli_fetch_array($q))
                        {
                          echo "<option value='{$row['order_id']}'> {$row['order_id']} </option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Item Name</label>
                    <div class="col-md-8">
                      <select class="form-control col-md-15" name="item_id">
                        <option>-------------------Select Item Name-------------------</option>
                        <?php
                          $q=mysqli_query($conn,"select * from tbl_item");
                          while($row=mysqli_fetch_array($q))
                          {
                            //echo "<option value=".$row['sector_id'].">". $row['sector_name']." </option>";
                            echo "<option value='{$row['item_id']}'> {$row['item_name']} </option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Quantity</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value ="1" placeholder="Enter date" name="qty" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Price</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" placeholder="Enter Price" name="price" required>
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input type="submit" value="Submit" name="submit" class="btn btn-primary" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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