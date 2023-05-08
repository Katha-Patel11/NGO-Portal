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
if (isset($_POST['submit3'])) {
    $itemid = $_POST['item_id'];
    $qty = $_POST['qty'];
    $userid = $_POST['user_name'];
    $sql = "insert into tbl_cart (item_id,qty,user_id) values('$itemid','$qty','$userid')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='cart-table.php';</script>";
    } else {
        echo "Problem" . mysqli_error($conn);
    }
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Cart Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Cart Form</a></li>
        </ul>
    </div>
    <div class="col-md-6" style="text-align:left;">
        <div class="tile">
            <h3 class="tile-title">Cart Details</h3>
            <div class="tile-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Select Item</label>
                        <div class="col-md-8">
                            <select class="form-control col-md-15" name="item_id">
                                <?php
                                echo '<option>--------------------------select item--------------------------</option>';
                                $q = mysqli_query($conn, "select * from tbl_item");
                                while ($row = mysqli_fetch_array($q)) {
                                    //echo "<option value=".$row['sector_id'].">". $row['sector_name']." </option>";
                                    echo "<option value='{$row['item_id']}'> {$row['item_name']} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Qty</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="1" name="qty" required readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">User Name</label>
                        <div class="col-md-8">
                            <select class="form-control col-md-15" name="user_name">
                                <?php
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

                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <input type="submit" value="Submit" name="submit3"
                                    class="btn btn-primary">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset"
                                    value="Cancel" class="btn btn-secondary" href="#">
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