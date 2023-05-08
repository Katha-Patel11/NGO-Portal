<?php
include 'connection.php';
$city = $_GET["city"];

$q = mysqli_query($conn, "select * from tbl_area where city_id ='{$city}'");
?>
<label for="address"><b>Area</b></label>
<select class="form-control" style="height:50px; width:530px;" name="area_id">
    <option value="">------------Select area------------</option>
    <?php
    while ($data = mysqli_fetch_row($q)) {

        echo "<option value='{$data[0]}'>$data[1]</option>";
    }
    ?>
</select>