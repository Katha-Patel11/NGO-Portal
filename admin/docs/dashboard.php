<?php
session_start();
include "header.php";
include "connection.php";
?>
<!-- Sidebar menu-->
<?php
include 'aside.php';
$adminid = $_SESSION['admin_id'];
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Admin Panel</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <?php
    $q = "select * from tbl_admin where admin_id='$adminid'";
    $qr = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($qr)) 
    {
  ?>
  <center>
    <h1>
      <p><span class="wave">👋</span>Welcome! <?php echo $row['admin_name']; ?>
    </h1>
    </p>
    </h1>
  </center>
  <?php 
    } 
  ?>
  <?php
    if (isset($_SESSION['admin_id'])) 
    {
  ?>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class=" icon fa fa-file-text fa-3x"></i>
        <div class="info">
          <h4><a href="blog-table.php">Blogs</a></h4>
          <?php
          $bq = "select * from tbl_blog";
          $bres = mysqli_query($conn, $bq);
          $bnum = mysqli_num_rows($bres);
          ?>
          <p><b><?php echo $bnum; ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
        <div class="info">
          <h4><a href="user-table.php">Users</a></h4>
          <?php
          $eq = "select * from tbl_user";
          $eres = mysqli_query($conn, $eq);
          $enum = mysqli_num_rows($eres);
          ?>
          <p><b><?php echo $enum; ?></b></p>
        </div>
      </div>
      </div><div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fas fa-handshake fa-3x"></i>
        <div class="info">
          <h4><a href="ngo-table.php">NGOs</a></h4>
          <?php
          $eq = "select * from tbl_ngo_master";
          $eres = mysqli_query($conn, $eq);
          $enum = mysqli_num_rows($eres);
          ?>
          <p><b><?php echo $enum; ?></b></p>
        </div>
      </div></div><div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-comments-o fa-3x"></i>
        <div class="info">
          <h4><a href="feedback-table.php">Feedback</a></h4>
          <?php
          $eq = "select * from tbl_feedback";
          $eres = mysqli_query($conn, $eq);
          $enum = mysqli_num_rows($eres);
          ?>
          <p><b><?php echo $enum; ?></b></p>
        </div>
      </div>
    </div>
    
  </div>
  <?php
    }
  ?>
</main>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/chart.js"></script>
<script type="text/javascript">
  var data = {
    labels: ["January", "February", "March", "April", "May"],
    datasets: [{
        label: "My First dataset",
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "rgba(220,220,220,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "My Second dataset",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var pdata = [{
      value: 300,
      color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "Complete"
    },
    {
      value: 50,
      color: "#F7464A",
      highlight: "#FF5A5E",
      label: "In-Progress"
    }
  ]

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<?php
include "script.php";
?>
</body>

</html>