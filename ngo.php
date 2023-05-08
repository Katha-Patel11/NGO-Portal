<?php
session_start();
include "header.php";
include 'connection.php';
?>
<div class="breadcrumb-area" style="background-image:url('assets/img/ngos.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">NGOs</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li><span style="color:#fcb11a;">NGOs List </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="attend-events-area padding-top-115 padding-bottom-90">
    <div class="container">
        <div class="tile-body">
            <div class="row">
                <!-- NGO Block -->
                <?php
                $num_per_page = 10;
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $start_from = ($page - 1) * $num_per_page;
                $ngoq = "SELECT * FROM `tbl_ngo_master` INNER JOIN `tbl_sector` ON (`tbl_ngo_master`.`sector_id` = `tbl_sector`.`sector_id`) WHERE `tbl_ngo_master`.`is_valid`='1' ORDER BY `tbl_ngo_master`.`ngo_id` limit $start_from,$num_per_page ;";
                $res = mysqli_query($conn, $ngoq);
                $total_records = mysqli_num_rows($res);
                $total_pages = ceil($total_records / $num_per_page);
                while ($row = mysqli_fetch_array($res)) {
                    if ($row['is_valid'] == '1') {
                        ?>
                        <div class="col-lg-6">
                            <div class="events-single-item bg-image margin-bottom-30"
                                style="background-image: url(assets/img/events/bg.png);">
                                <div class="thumb">
                                    <div class="bg-image"
                                        style="background-image: url(admin/docs/ngo-uploads/<?php echo $row['ngo_image']; ?>);height:280px;">
                                    </div>
                                </div>
                                <div class="content-wrapper">
                                    <div class="content">
                                        <a class="title" href="ngo-details.php?ngoid=<?php echo $row['ngo_id']; ?>"><?php echo $row['ngo_name']; ?></a>
                                        <ul class="info-items-03">
                                            <li><a href="#"><i class="fa fa-check"></i>
                                                    <?php echo $row['sector_name']; ?>
                                                </a></li>
                                            <li><a href="#"><i class="fas fa-map-marker-alt"></i>
                                                    <?php echo $row['ngo_address']; ?>
                                                </a></li>
                                        </ul>
                                        <div class="events-btn-wrapper">
                                            <a class="book-btn"
                                                href="ngo-details.php?ngoid=<?php echo $row['ngo_id']; ?>">Details</a>
                                            <a href="donation.php" class="free-btn flaticon-heart">Donate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <div class="blog-pagination desktop-center">
                    <ul>
                        <?php
                        $pngoq = "SELECT * FROM `tbl_ngo_master` INNER JOIN `tbl_sector` ON (`tbl_ngo_master`.`sector_id` = `tbl_sector`.`sector_id`) WHERE `tbl_ngo_master`.`is_valid`='1' ORDER BY `tbl_ngo_master`.`ngo_id`  ASC;";
                        $pres = mysqli_query($conn, $pngoq);
                        $ptotal_records = mysqli_num_rows($pres);
                        $ptotal_pages = ceil($ptotal_records / $num_per_page);
                        for ($i = 1; $i <= $ptotal_pages; $i++) { 
                            ?>
                            <li>
                                <?php echo "<a class='page-numbers' href='ngo.php?page=".$i."'>".$i."</a>"; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- NGO Block End -->
                </div>
            </div>
        </div>
</section>
<?php
include "footer.php";
?>