<?php
session_start();
include "header.php";
include "connection.php";
?>
<div class="breadcrumb-area" style="background-image:url('assets/img/eevent1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Events</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li><span style="color:#fcb11a;">Events </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="attend-events-area padding-top-115 padding-bottom-90">
    <div class="container">
        <div class="row">
            <?php
            $num_per_page = 3;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $start_from = ($page - 1) * $num_per_page;
            $eq = "SELECT * FROM `tbl_ngo_master` INNER JOIN `tbl_event` ON (`tbl_ngo_master`.`ngo_id` = `tbl_event`.`ngo_id`) ORDER BY `tbl_event`.`event_id` ASC limit $start_from,$num_per_page;";
            $res = mysqli_query($conn, $eq);
            $total_records = mysqli_num_rows($res);
            $total_pages = ceil($total_records / $num_per_page);
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <!-- Block -->
                <div class="col-lg-6 col-xl-4 col-md-6">
                    <div class="contribute-single-item">
                        <div class="thumb">
                            <img src="admin/docs/event-uploads/<?php echo $row['event_image']; ?>" height="200px" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <?php echo $row['event_name']; ?>
                            </h3>
                            <ul class="info-items-03">
                                <li><a href="#"><i class="far fa-calendar-alt"></i>
                                        <?php echo $row['event_date']; ?>
                                    </a></li>
                                <li><a href="#"><i class="far fa-heart"></i>By:
                                        <?php echo $row['ngo_name']; ?>
                                    </a></li>
                            </ul><br>
                            <div class="btn-wrapper">
                                <a href="events-details.php?eid=<?php echo $row['event_id']; ?>" class="boxed-btn">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Block End-->
            <?php
            }
            ?>
            <div class="blog-pagination desktop-center">
                <ul>
                    <?php
                    $pngoq = "SELECT * FROM `tbl_ngo_master` INNER JOIN `tbl_event` ON (`tbl_ngo_master`.`ngo_id` = `tbl_event`.`ngo_id`) ORDER BY `tbl_event`.`event_id` ASC";
                    $pres = mysqli_query($conn, $pngoq);
                    $ptotal_records = mysqli_num_rows($pres);
                    $ptotal_pages = ceil($ptotal_records / $num_per_page);
                    for ($i = 1; $i <= $ptotal_pages; $i++) {
                    ?>
                        <li>
                            <?php echo "<a class='page-numbers' href='events.php?page=" . $i . "'>" . $i . "</a>"; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>