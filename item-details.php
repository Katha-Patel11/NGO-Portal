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
                    <h2 class="page-title">Item Details</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Item Details</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content our-attoryney padding-bottom-120 padding-top-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-item">
                    <?php
                        $iid=$_GET['iid'];
                        $q = "SELECT * FROM`tbl_ngo_master`INNER JOIN `tbl_item` ON (`tbl_ngo_master`.`ngo_id` = `tbl_item`.`ngo_id`) WHERE `tbl_item`.`item_id`='$iid'ORDER BY `tbl_item`.`item_id` ASC;";
                        $res=mysqli_query($conn,$q);
                        while($row=mysqli_fetch_array($res))
                        {   
                    ?><div class="content-wrapper">
                    <div class="content">
                        <ul class="post-meta">
                            <li>By <span><a href="ngo-details.php?ngoid=<?php echo $row['ngo_name']; ?>"><?php echo $row['ngo_name']; ?></span></a></li>
                        </ul>
                        <h4 class="title"><a href="item-details.php?iid=<?php echo $row['item_id']; ?>"><?php echo $row['item_name']; ?></a></h4>
                        <img src="admin/docs/item-uploads/<?php echo $row['item_image']; ?>" height="350px" width="700px" alt="blog">
                    </div>
                </div>
                <p><?php echo $row['item_details']; ?></b></p>
                <a href="item-details.php?iid=<?php echo $row['item_id']; ?>">&#8377; <?php echo $row['item_price']; ?></a>
                <form method="post" action="cart-process.php?iid=<?php echo $row['item_id']; ?>">
                    <div class="btn-wrapper">
                        <input class="boxed-btn reverse-color" type="submit" name="Buy" value="Buy">
                    </div>
                </form>
            </div>
        </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget widget_search">
                        <form action="https://bytesed.com/tf/fundorex/blog.html" class="search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Write your keyword...">
                            </div>
                            <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_recent_posts style-01">
                        <h4 class="widget-title style-01">Recent Post</h4>
                        <?php
                            $q="select * from tbl_item order by item_id desc limit 3";
                            $res=mysqli_query($conn,$q);
                            while($brow=mysqli_fetch_array($res))
                            {
                        ?>
                        <ul class="recent_post_item">
                            <li class="single-recent-post-item">
                                <div class="thumb">
                                    <img src="admin/docs/item-uploads/<?php echo $brow['item_image']; ?>" alt="recent post">
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="item-details.php?iid=<?php echo $brow['item_id']; ?>"><?php echo $brow['item_name']; ?></a></h4>
                                    <span class="time">&#8377; <?php echo $brow['item_price']; ?></span>
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