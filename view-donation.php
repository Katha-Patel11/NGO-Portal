<?php
session_start();
include "header.php";
include 'connection.php';
?>
<div class="breadcrumb-area" style="background-image:url(assets/img/volD.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Your Donations</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Your Donations</span></li>
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
                    <div class="section-title ">
                        <h2 class="title" style="font-size:40px;">Your <span>Donations</span></h2>
                    </div>
                    <div class="col-lg-10">
                        <div class="blog-classic-item-01 margin-bottom-60">
                            <?php
                            $uid = $_SESSION['user_id'];
                            $num_per_page = 3;
                            if (isset($_GET["page"])) {
                                $page = $_GET["page"];
                            } else {
                                $page = 1;
                            }
                            $start_from = ($page - 1) * $num_per_page;
                            $q = "SELECT `tbl_donation`.`donation_id`, `tbl_donation`.`ngo_id`, `tbl_donation`.`user_id`, `tbl_donation`.`donation_amount`, `tbl_ngo_master`.`ngo_name`,`tbl_ngo_master`.`ngo_image`,`tbl_ngo_master`.`ngo_reg_no`,`tbl_ngo_master`.`ngo_email` FROM `tbl_ngo_master` INNER JOIN `tbl_donation` ON (`tbl_ngo_master`.`ngo_id` = `tbl_donation`.`ngo_id`) WHERE `tbl_donation`.`user_id`='$uid' ORDER BY `tbl_donation`.`ngo_id` ASC limit $start_from,$num_per_page;";
                            $dres = mysqli_query($conn, $q);
                            $total_records = mysqli_num_rows($dres);
                            $total_pages = ceil($total_records / $num_per_page);
                            $j = 1;
                            while ($drow = mysqli_fetch_array($dres)) {
                            ?>
                                <div class="content-wrapper">
                                    <div class="news-date">
                                        <h5 class="title">
                                            <?php echo "$j"; ?>
                                        </h5>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="events-single-item bg-image margin-bottom-30 " style="background-image: url(assets/img/events/bg.png);">
                                            <div class="thumb">
                                                <div class="bg-image" style="background-image: url(admin/docs/ngo-uploads/<?php echo $drow['ngo_image']; ?>);">
                                                </div>
                                            </div>
                                            <div class="content-wrapper">
                                                <div class="content">
                                                    <h4 style="font-size:20px;font-weight: normal;font-family:var(--body-font);">
                                                        <b>NGO Name:</b>
                                                        <?php echo $drow['ngo_name']; ?>
                                                    </h4>
                                                    <h4 style="font-size:20px;font-weight: normal;font-family:var(--body-font);">
                                                        <b>NGO Reg. No:</b>
                                                        <?php echo $drow['ngo_reg_no']; ?>
                                                    </h4>
                                                    <h4 style="font-size:20px;font-weight: normal;font-family:var(--body-font);">
                                                        <b>NGO E-mail:</b>
                                                        <?php echo $drow['ngo_email']; ?>
                                                    </h4>
                                                    <h4 style="font-size:20px;font-weight: normal;font-family:var(--body-font);">
                                                        <b>Amount Donated:</b>
                                                        <?php echo $drow['donation_amount']; ?>
                                                    </h4>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $j++;
                            }
                            ?>
                        </div>
                        <div class="blog-pagination desktop-center">
                            <ul>
                                <?php
                                $pngoq = "SELECT `tbl_donation`.`donation_id`, `tbl_donation`.`ngo_id`, `tbl_donation`.`user_id`, `tbl_donation`.`donation_amount`, `tbl_ngo_master`.`ngo_name`,`tbl_ngo_master`.`ngo_image`,`tbl_ngo_master`.`ngo_reg_no`,`tbl_ngo_master`.`ngo_email` FROM `tbl_ngo_master` INNER JOIN `tbl_donation` ON (`tbl_ngo_master`.`ngo_id` = `tbl_donation`.`ngo_id`) WHERE `tbl_donation`.`user_id`='$uid' ORDER BY `tbl_donation`.`ngo_id` ASC";
                                $pres = mysqli_query($conn, $pngoq);
                                $ptotal_records = mysqli_num_rows($pres);
                                $ptotal_pages = ceil($ptotal_records / $num_per_page);
                                for ($i = 1; $i <= $ptotal_pages; $i++) {
                                ?>
                                    <li>
                                        <?php echo "<a class='page-numbers' href='view-donation.php?page=" . $i . "'>" . $i . "</a>"; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget widget_event style-01">
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
            </div>
        </div>
    </div>
</div>
<!-- NGO Block End -->
<?php
include "footer.php";
?>