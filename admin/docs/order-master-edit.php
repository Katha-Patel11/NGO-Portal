<?php
session_start();
include "header.php";
?>
<!-- Sidebar menu-->
<?php
include 'aside.php';
include 'connection.php';
$id = $_GET['oid'];
$sql = "select * from tbl_order_master where order_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$oid = $row['order_id'];
?>
<?php
if ($_POST) {
    $id = $_POST['user_id'];
    $oid = $_POST['order_id'];
    $date = date('Y-m-d');
    $sql = "update tbl_order_master set user_id='$id',order_date='$date' where order_id='$oid'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='order-master-table.php';</script>";
    } else {
        echo "<script>alert('Data not updated');</script>";
    }
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Form Samples</h1>
            <p>Sample forms</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        </ul>
    </div>
    <div class="col-md-6" style="text-align:left;">
        <div class="tile">
            <h3 class="tile-title">Order Master Update Form </h3>
            <div class="tile-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Order ID</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Enter full name" name="order_id" value="<?php echo $id ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">User Name</label>
                        <div class="col-md-8">
                            <select class="form-control col-md-15" name="user_id">
                                <?php
                                echo '<option>--------------------------select user--------------------------</option>';
                                $q = mysqli_query($conn, "select * from tbl_user");
                                while ($row = mysqli_fetch_array($q)) {
                                    //echo "<option value=".$row['sector_id'].">". $row['sector_name']." </option>";
                                    echo "<option value='{$row['user_id']}'> {$row['user_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!--<div class="form-group row" >
                  <label class="control-label col-md-3">Gender</label>
                  <div class="col-md-9">
                    <div class="form-check" >
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="Male">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="Female">Female
                      </label>
                    </div>
                  </div>
                </div>-->
                    <!--<div class="form-group row">
                  <label class="control-label col-md-3">Identity Proof</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file">
                  </div>
                </div>-->
            </div>
            <div class="tile-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-3">
                        <input type="submit" value="Update" name="submit"
                            class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel"
                            class="btn btn-secondary" href="#">
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