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
          <h1><i class="fa fa-th-list"></i> Blog Table</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Blog Table</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Blog Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Blog Title</th>
                  <th>Blog Details</th>
                  <th>Blog Date</th>
                  <th>Blog Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'connection.php';
                  $ngoid=$_SESSION['ngo_id'];
                  if(isset($_GET['did']))
                  {
                    $id = $_GET['did'];
                    $did = mysqli_query($conn,"delete from tbl_blog where blog_id ='{$id}'");
                    if($did)
                    {
                      echo "<script>alert('Record Deleted');</script>";
                    }
                    else
                    {
                      echo "<script>alert('Record Not Deleted');</script>";
                    }
                  }
                  $q="select * from tbl_blog where ngo_id='$ngoid'";
                  $r=mysqli_query($conn,$q);
                  $i=1;
                  while($row=mysqli_fetch_array($r))
                  {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['blog_title']."</td>";
                    echo "<td>".$row['blog_details']."</td>";
                    echo "<td>".$row['blog_date']."</td>";
                    echo "<td>".$row['blog_image']."</td>";
                    echo "<td><a href='?did={$row['blog_id']}'>Delete</a> </td>";
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