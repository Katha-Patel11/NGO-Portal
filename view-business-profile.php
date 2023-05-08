<?php
session_start();
include "header.php";
include "connection.php";
?>
<div class="breadcrumb-area" style="background-image:url('assets/img/busprofile.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Business Profile</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Business Profile<span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_GET['did']))
    {
      $id = $_GET['did'];
      $did = mysqli_query($conn,"delete from tbl_business_profile where busi_cin_no ='{$id}'");
      if($did)
      {
        echo "<script>alert('Record Deleted');window.location='view-business-profile.php';</script>";
      }
      else
      {
        echo "<script>alert('Record Not Deleted');</script>";
      }
    }
?>
<div class="page-content our-attoryney padding-top-60 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    $userid = $_SESSION['user_id'];
                    $q = "select * from tbl_business_profile where user_id='$userid'";
                    $busires = mysqli_query($conn, $q);
                    $i = 1;
                    $num = mysqli_num_rows($busires);
                    if ($num > 0) 
                    {
                ?><br>
                        <div class="section-title ">
                            <h2 class="title" style="font-size:40px;">My <span>Business Profiles</span></h2>
                        </div>
                        <?php
                            }
                        while ($busirow = mysqli_fetch_array($busires)) 
                        {
                    ?>
                    <div class="blog-classic-item-01">
                        <div class="content-wrapper">
                            <div class="news-date">
                                <h5 class="title">
                                    <?php echo "$i"; ?>
                                </h5>
                            </div>
                        <div class="widget widget_event style-01 contribute-double-item">
                            <h3 class="widget-title style-02" style="text-decoration: ;font-family: Arial, Helvetica, sans-serif;"><b><?php echo $busirow['busi_name']; ?></b></h3>
                            <ul style = "color:#000000b3;">
                                <li>CIN No. : <span><?php echo $busirow['busi_cin_no']; ?></span></li>
                                <li>Details : <span><?php echo $busirow['busi_details']; ?></span></li>
                                <li>Contact No. : <span><?php echo $busirow['busi_mobile_no']; ?></span></li>
                                <li>Address : <span><?php echo $busirow['busi_address']; ?></span></li>
                                <li>E-mail : <span><?php echo $busirow['busi_email']; ?></span></li>
                                <li>Action : <span><a href="update-business-profile.php?cin=<?php echo $busirow['busi_cin_no']; ?>">Update</a>  |  <a href='?did=<?php echo $busirow['busi_cin_no']; ?>'>Delete</a></span></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>