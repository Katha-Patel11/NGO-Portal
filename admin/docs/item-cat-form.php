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
      if(isset($_POST['submit3']))
      {
          $name=$_POST['cat_name'];
          $sql="insert into tbl_item_category (item_category_name) values('$name')";
          if(mysqli_query($conn,$sql))
          {
            echo "<script>window.location='item-cat-table.php';</script>";
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
          <h1><i class="fa fa-edit"></i>Item Category Form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Item Category Form</a></li>
        </ul>
      </div>
        <div class="col-md-6" style="text-align:left;">
          <div class="tile">
            <h3 class="tile-title">Item Category Details</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-3">Item Category Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter Item Category name" name="cat_name" required>
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input type="submit" value="Submit" name="submit3" class="btn btn-primary" >&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" class="btn btn-secondary" href="#">
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