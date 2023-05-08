<?php
session_start();
include "header.php";
include 'connection.php';
?>
<div class="breadcrumb-area" style="background-image:url(assets/img/breadcrumb/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <?php
                    $ngoid = $_GET['ngoid'];
                    $ngoq = "SELECT `tbl_ngo_master`.`ngo_id`, `tbl_ngo_master`.`ngo_name`, `tbl_ngo_master`.`ngo_reg_no`, `tbl_ngo_master`.`ngo_details`, `tbl_ngo_master`.`ngo_address`, `tbl_ngo_master`.`city_id`,`tbl_ngo_master`.`area_id`,`tbl_ngo_master`.`ngo_mobile_no`,`tbl_ngo_master`.`ngo_email`,`tbl_ngo_master`.`ngo_password`,`tbl_ngo_master`.`ngo_found_year`,`tbl_ngo_master`.`ngo_image`, `tbl_sector`.`sector_name` FROM `tbl_ngo_master` INNER JOIN `tbl_sector` ON (`tbl_ngo_master`.`sector_id` = `tbl_sector`.`sector_id`) WHERE `tbl_ngo_master`.`ngo_id`='$ngoid' ORDER BY `tbl_ngo_master`.`ngo_id` ASC;";
                    $res = mysqli_query($conn, $ngoq);
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <h2 class="page-title"><?php echo $row['ngo_name']; ?></h2>
                        <ul class="page-list">
                            <li><a href="about.php">Home</a></li>
                            <li><span style="color:#fcb11a;"><?php echo $row['ngo_name']; ?></span></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content our-attoryney padding-bottom-120 padding-top-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="events-details-item">
                    <div class="thumb margin-bottom-20">
                        <img src='admin/docs/ngo-uploads/<?php echo $row['ngo_image']; ?>'>
                    </div>
                    <!-- NGO Details Block -->
                    <div class="content">
                        <h4 class="title"><a href="ngo-details.php?ngoid=<?php echo $row['ngo_id']; ?>"><?php echo $row['ngo_name']; ?></a></h4>
                        <ul class="post-meta">
                            <li><i class="far fa-envelope"></i><?php echo $row['ngo_email']; ?></li><br><br>
                            <li><i class="fas fa-map-marker-alt"></i><?php echo $row['ngo_address']; ?></li><br><br>
                            <li><i class="fa fa-check"></i><?php echo $row['sector_name']; ?></li>
                        </ul>
                        <p><?php echo $row['ngo_details']; ?></p>
                        <form method="post" action="donation.php">
                            <div class="btn-wrapper">
                                <input class="boxed-btn reverse-color" type="submit" name="donate" value="Donate">
                            </div>
                        </form>
                    </div>
                    <!-- NGO Details Block End -->
                    <!-- Requirement Block -->
                    <div class="col-lg-8">
                        <?php
                        $ngoid = $_GET['ngoid'];
                        $q = "select * from tbl_requirement where ngo_id='$ngoid'";
                        $reqres = mysqli_query($conn, $q);
                        $i = 1;
                        $num = mysqli_num_rows($reqres);
                        if ($num > 0) {
                        ?><br>
                            <div class="section-title ">
                                <h2 class="title" style="font-size:40px;">Our <span>Requirements</span></h2>
                            </div>
                        <?php
                        }
                        while ($reqrow = mysqli_fetch_array($reqres)) {
                        ?>
                            <div class="blog-classic-item-01">
                                <div class="content-wrapper">
                                    <div class="news-date">
                                        <h5 class="title"><?php echo "$i"; ?></h5>
                                    </div>
                                    <div class="content col-lg-5">
                                        <ul class="post-meta">
                                            <li>Status <span style="color:#fcb11a;"><?php echo $reqrow['req_status']; ?></span></li>
                                            <?php //<li><a href="#">Comments<span>(03)</span></a></li> 
                                            ?>
                                        </ul>
                                        <h4 class="title"><?php echo $reqrow['req_title']; ?></h4>
                                    </div>
                                    <div class="blog-bottom col-lg-12">
                                        <ul class="post-meta">
                                            <li><span style="color:#fcb11a;">Details</span></li>
                                            <?php //<li><a href="#">Comments<span>(03)</span></a></li> 
                                            ?>
                                        </ul>
                                        <p><?php echo $reqrow['req_details']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <!-- Requirement Block End -->
                    <!-- Block -->
                    <section class="attend-events-area padding-top-50 padding-bottom-90">
                        <div class="container">
                            <?php
                            $ngoid = $_GET['ngoid'];
                            $iq = "select * from tbl_item where ngo_id='$ngoid'";
                            $ires = mysqli_query($conn, $iq);
                            $rnum = mysqli_num_rows($ires);
                            if ($rnum > 0) {
                            ?>
                                <div class="section-title ">
                                    <h2 class="title" style="font-size:40px;"><span>Shop</span></h2>
                                </div>
                                <div class="row">
                                <?php
                            }
                            while ($irow = mysqli_fetch_array($ires)) {
                                ?>
                                    <div class="col-lg-6">
                                        <div class="contribute-single-item">
                                            <div class="thumb">
                                                <img src="admin/docs/item-uploads/<?php echo $irow['item_image']; ?>" height="200px" alt="">
                                            </div>
                                            <div class="content">
                                                <h3 class="title">
                                                    <?php echo $irow['item_name'] ?>
                                                </h3>
                                                <ul class="info-items-03">
                                                    <li><a href="#">&#8377; <?php echo $irow['item_price']; ?></a></li>
                                                    <li><a href="#"><i class="fa fa-info"></i><?php echo substr($irow['item_details'], 0, 100) . "..."; ?></a></li>
                                                </ul><br>
                                                <div class="btn-wrapper">
                                                    <a href="item-details.php?iid=<?php echo $irow['item_id']; ?>" class="boxed-btn">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                                ?>
                                </div>
                        </div>
                    </section>
                    <!--Block End-->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget widget_event style-01">
                        <h3 class="widget-title style-02">NGO Details</h3>
                        <ul>
                            <li><a href="#">Registration No. :<span><?php echo $row['ngo_reg_no']; ?></span></a></li>
                            <li><a href="#">Found Year : <span><?php echo $row['ngo_found_year']; ?></span></a></li>
                            <li><a href="#">Contact No. : <span><?php echo $row['ngo_mobile_no']; ?></span></a></li>
                            <li><a href="#">Sector : <span><?php echo $row['sector_name']; ?></span></a></li>
                        </ul>
                    </div>
                    <div class="widget widget_map style-01">
                        <h4 class="widget-title style-01">Recent NGOs</h4>
                        <?php
                        $bq = "select * from tbl_ngo_master order by ngo_id desc limit 3";
                        $bres = mysqli_query($conn, $bq);
                        while ($brow = mysqli_fetch_array($bres)) {
                        ?>
                            <ul class="recent_post_item">
                                <li class="single-recent-post-item">
                                    <div class="thumb">
                                        <img src="admin/docs/ngo-uploads/<?php echo $brow['ngo_image']; ?>" alt="recent post">
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="ngo-details.php?ngoid=<?php echo $brow['ngo_id']; ?>"><?php echo $brow['ngo_name']; ?></a></h4>
                                        <span class="time"><i class="far fa-calendar-alt"></i><?php echo $brow['ngo_found_year']; ?></span>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
                    }
            ?>
            </div>
        </div>
    </div>
</div>
<!-- NGO Block End -->
<?php
include "footer.php";
?>