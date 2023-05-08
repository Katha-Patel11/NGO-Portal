<?php
    session_start();
    include "header.php";
    include 'connection.php';
?>
<div class="breadcrumb-area" style="background-image:url('assets/img/breadcrumb/01.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Blog Details</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog-details.php">Blog Details </a></li>
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
                <div class="blog-details-item">
                    <?php
                        $bid=$_GET['bid'];
                        $ngoq="SELECT `tbl_blog`.`blog_id`, `tbl_blog`.`blog_title`, `tbl_blog`.`blog_details`, `tbl_blog`.`blog_image`, `tbl_blog`.`blog_date`, `tbl_ngo_master`.`ngo_name` FROM`tbl_ngo_master` INNER JOIN `tbl_blog` ON (`tbl_ngo_master`.`ngo_id` = `tbl_blog`.`ngo_id`) WHERE `tbl_blog`.`blog_id`='$bid' ORDER BY `tbl_blog`.`blog_id` ASC;";
                        $res=mysqli_query($conn,$ngoq);
                        while($row=mysqli_fetch_array($res))
                        {   
                    ?>
                    <div class="thumb margin-bottom-20">
                        <img src="admin/docs/blog-uploads/<?php echo $row['blog_image']; ?>" height="350px" width="750px" alt="blog">
                    </div>
                    <div class="content-wrapper">
                    <div class="news-date">
                                <?php
                                    $date=$row['blog_date'];
                                    $d=date('d',strtotime($date));
                                    $m=date('F',strtotime($date));
                                ?>
                                    <h5 class="title"><?php echo $d; ?></h5>
                                    <span><?php echo $m; ?></span>
                            </div>
                        <div class="content">
                            <ul class="post-meta">
                                <li>By <span><a href="ngo-details.php?ngoid=<?php echo $row['ngo_name']; ?>"><?php echo $row['ngo_name']; ?></span></a></li>
                            </ul>
                            <h4 class="title"><a href="blog-details.php?blogid=<?php echo $row['blog_id']; ?>"><?php echo $row['blog_title']; ?></a></h4>
                        </div>
                    </div>
                    <p><?php echo $row['blog_details']; ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget widget_recent_posts style-01">
                        <h4 class="widget-title style-01">Recent Post</h4>
                        <?php
                            $bq="select * from tbl_blog order by blog_id desc limit 3";
                            $bres=mysqli_query($conn,$bq);
                            while($brow=mysqli_fetch_array($bres))
                            {
                        ?>
                        <ul class="recent_post_item">
                            <li class="single-recent-post-item">
                                <div class="thumb">
                                    <img src="admin/docs/blog-uploads/<?php echo $brow['blog_image']; ?>" alt="recent post">
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#"><?php echo $brow['blog_title']; ?></a></h4>
                                    <span class="time"><i class="far fa-calendar-alt"></i><?php echo $brow['blog_date']; ?></span>
                                </div>
                            </li>
                        </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
                <?php
                    }
                ?>
        </div>
        </div>
    </div>
</div>
<?php 
    include "footer.php";
?>