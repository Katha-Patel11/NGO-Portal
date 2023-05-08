<?php 
    session_start();
    include "header.php";
    include "connection.php";
   ?>
<div class="breadcrumb-area" style="background-image:url('assets/img/blog.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Latest Blog</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Latest Blog </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content our-attoryney padding-top-60 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-classic-item-01 margin-bottom-60">
                    <?php
                    $num_per_page = 3;
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    }
                    $start_from = ($page - 1) * $num_per_page;
                    $q = "SELECT `tbl_blog`.`blog_id`, `tbl_blog`.`blog_title`, `tbl_blog`.`blog_details`, `tbl_blog`.`blog_date`, `tbl_blog`.`blog_image`, `tbl_ngo_master`.`ngo_name` FROM `tbl_ngo_master` INNER JOIN `tbl_blog` ON (`tbl_ngo_master`.`ngo_id` = `tbl_blog`.`ngo_id`) ORDER BY `tbl_blog`.`blog_id` ASC limit $start_from,$num_per_page;";
                    $res = mysqli_query($conn, $q);
                    $total_records = mysqli_num_rows($res);
                    $total_pages = ceil($total_records / $num_per_page);
                    while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <!--<div class="thumbnail">
                            <img src="admin/docs/blog-uploads/<?php //echo $row['blog_image']; ?>" height="350px"
                                width="750px" alt="blog">
                        </div>-->
                        <div class="content-wrapper">
                            <div class="news-date">
                                <?php
                                $date = $row['blog_date'];
                                $d = date('d', strtotime($date));
                                $m = date('M', strtotime($date));
                                ?>
                                <h5 class="title">
                                    <?php echo $d; ?>
                                </h5>
                                <span>
                                    <?php echo $m; ?>
                                </span>
                            </div>
                            <div class="content">
                                <ul class="post-meta">
                                    <li><a href="#">By <span>
                                                <?php echo $row['ngo_name']; ?>
                                            </span></a></li>
                                    <?php //<li><a href="#">Comments<span>(03)</span></a></li> ?>
                                </ul>
                                <h4 class="title"><a href="blog-details.php?bid=<?php echo $row['blog_id']; ?>"><?php echo $row['blog_title']; ?></a></h4>
                            </div>
                        </div>
                        <div class="blog-bottom">
                            <p>
                                <?php echo substr($row['blog_details'], 0, 250) . " ..."; ?>
                            </p>
                            <div class="btn-wrapper">
                                <a href="blog-details.php?bid=<?php echo $row['blog_id']; ?>"
                                    class="boxed-btn reverse-color">Read More</a>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
                    ?>
                </div>
                <div class="blog-pagination desktop-center">
                    <ul>
                        <?php
                        $pngoq = "SELECT `tbl_blog`.`blog_id`, `tbl_blog`.`blog_title`, `tbl_blog`.`blog_details`, `tbl_blog`.`blog_date`, `tbl_blog`.`blog_image`, `tbl_ngo_master`.`ngo_name` FROM `tbl_ngo_master` INNER JOIN `tbl_blog` ON (`tbl_ngo_master`.`ngo_id` = `tbl_blog`.`ngo_id`) ORDER BY `tbl_blog`.`blog_id` ASC";
                        $pres = mysqli_query($conn, $pngoq);
                        $ptotal_records = mysqli_num_rows($pres);
                        $ptotal_pages = ceil($ptotal_records / $num_per_page);
                        for ($i = 1; $i <= $ptotal_pages; $i++) {
                            ?>
                            <li>
                                <?php echo "<a class='page-numbers' href='blog.php?page=" . $i . "'>" . $i . "</a>"; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget widget_recent_posts style-01">
                        <h4 class="widget-title style-01">Recent Blogs</h4>
                        <?php
                        $bq = "select * from tbl_blog order by blog_id desc limit 3";
                        $bres = mysqli_query($conn, $bq);
                        while ($brow = mysqli_fetch_array($bres)) {
                            ?>
                            <ul class="recent_post_item">
                                <li class="single-recent-post-item">
                                    <div class="thumb">
                                        <img src="admin/docs/blog-uploads/<?php echo $brow['blog_image']; ?>"
                                            alt="recent post">
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="#">
                                                <?php echo $brow['blog_title']; ?>
                                            </a></h4>
                                        <span class="time"><i class="far fa-calendar-alt"></i>
                                            <?php echo $brow['blog_date']; ?>
                                        </span>
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
<?php 
    include "footer.php";
?>