<?php
include 'connection.php';
session_start();
include "header.php";
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
                    $eid = $_GET['eid'];
                    $q = "SELECT `tbl_event`.`event_id`,`tbl_event`.`event_time`,`tbl_event`.`event_address`,`tbl_event`.`event_price`, `tbl_event`.`event_name`, `tbl_event`.`event_details`, `tbl_event`.`event_date`, `tbl_event`.`event_image`, `tbl_ngo_master`.`ngo_name` FROM `tbl_ngo_master` INNER JOIN `tbl_event` ON (`tbl_ngo_master`.`ngo_id` = `tbl_event`.`ngo_id`) WHERE `tbl_event`.`event_id`='$eid'  ORDER BY `tbl_event`.`event_id` ASC;";
                    $res = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <h2 class="page-title"><?php echo $row['event_name']; ?></h2>
                        <ul class="page-list">
                            <li><a href="index.php">Home</a></li>
                            <li><span style="color:#fcb11a;"><?php echo $row['event_name']; ?></span></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content our-attoryney padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="events-details-item">
                    <div class="thumb margin-bottom-20">
                        <img src="admin/docs/event-uploads/<?php echo $row['event_image']; ?>" width="700px" height="450px" alt="blog">
                        <div class="post-time">
                            <?php
                            $date = $row['event_date'];
                            $d = date('d', strtotime($date));
                            $m = date('F', strtotime($date));
                            ?>
                            <h5 class="title"><?php echo $d; ?></h5>
                            <span><?php echo $m; ?></span>
                        </div>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#"><?php echo $row['event_name']; ?></a></h4>
                        <ul class="post-meta">
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo $row['event_address']; ?></a></li>
                            <li><a href="#"><i class="far fa-clock"></i><?php echo $row['event_time']; ?></a></li>
                        </ul>
                        <p><?php echo $row['event_details']; ?></p>
                        <!--<ul>
                            <li><a href="#"><i class="fas fa-check"></i>If you want to change the world</a></li>
                            <li><a href="#"><i class="fas fa-check"></i>Keep the same cleaner for every visit</a></li>
                            <li><a href="#"><i class="fas fa-check"></i>One-off, weekly or fortnightly visits</a></li>
                        </ul>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget widget_event style-01">
                    <h3 class="widget-title style-02">Event Details</h3>
                    <ul>
                        <li><a href="#">Price :<span><?php echo $row['event_price']; ?></span></a></li>
                        <li><a href="#">Date : <span><?php echo $row['event_date']; ?></span></a></li>
                        <li><a href="#">Time : <span><?php echo $row['event_time']; ?></span></a></li>
                        <li><a href="#">Organizer : <span><?php echo $row['ngo_name']; ?></span></a></li>
                    </ul>
                </div>
                <div class="widget widget_map style-01">
                    <h4 class="widget-title style-01">Recent Event</h4>
                    <?php
                        $bq = "select * from tbl_event order by event_date desc limit 3";
                        $bres = mysqli_query($conn, $bq);
                        while ($brow = mysqli_fetch_array($bres)) {
                    ?>
                        <ul class="recent_post_item">
                            <li class="single-recent-post-item">
                                <div class="thumb">
                                    <img src="admin/docs/event-uploads/<?php echo $brow['event_image']; ?>" alt="recent post">
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#"><?php echo $brow['event_name']; ?></a></h4>
                                    <span class="time"><i class="far fa-calendar-alt"></i><?php echo $brow['event_date']; ?></span>
                                </div>
                            </li>
                        </ul>
                    <?php
                        }
                    ?>
                </div>
            <?php
                    }
            ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include "footer.php";
?>