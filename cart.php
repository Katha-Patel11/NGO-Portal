<?php
session_start();
include "header.php";
include 'connection.php';
if (isset($_POST['order_now'])) {
    $userid = $_SESSION['user_id'];
    $order_date = date('Y-m-d');
    $iq = "SELECT * FROM `tbl_cart` INNER JOIN `tbl_item` ON (`tbl_cart`.`item_id` = `tbl_item`.`item_id`) WHERE `tbl_cart`.`user_id`='$userid' ORDER BY `tbl_item`.`item_id` ASC;";
    $res = mysqli_query($conn, $iq);
    $numi = mysqli_num_rows($res);
    if ($numi > 0) {
        $order = mysqli_query($conn, "INSERT INTO `tbl_order_master`(`user_id`, `order_date`) VALUES ('{$userid}','{$order_date}')");
        $order_id = mysqli_insert_id($conn);
        while ($row = mysqli_fetch_array($res)) {
            $item_id = $row['item_id'];
            $qty = 1;
            $price = $row['item_price'];
            $order_details = mysqli_query($conn, "INSERT INTO `tbl_order_details`(`order_id`, `item_id`, `qty`, `price`) VALUES ('{$order_id}','{$item_id}','{$qty}','{$price}')");
        }
        $delete = mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE `user_id`= {$userid}");
        echo "<script>alert('Order Place successfully');window.location='orders.php';</script>";
    } else {
        echo "<script>alert('Order Fail');window.location='cart.php';</script>";
    }
}
?>

<head>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
                font-family: var(--body-font);
            }
        }
    </style>
</head>
<div class="breadcrumb-area" style="background-image:url('assets/img/cart.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Your Cart</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Your Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['idid'])) {
    $userid = $_SESSION['user_id'];
    $idid = $_GET['idid'];
    $dq = "delete  from tbl_cart where item_id='$idid' and user_id='$userid'";
    $dres = mysqli_query($conn, $dq);
    if ($dres) {
        echo "<script>alert('Item Removed from cart');</script>";
    }
}
?>
<div class="page-content our-attoryney padding-bottom-120 padding-top-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-item">
                    <section class="h-50 " style="background-color: #fff;">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body p-4">
                                           <div class="row">
                                                <div class="col-lg-12">

                                                    <?php
                                                    $userid = $_SESSION['user_id'];
                                                    $iq = "SELECT * FROM `tbl_cart` INNER JOIN `tbl_item` ON (`tbl_cart`.`item_id` = `tbl_item`.`item_id`) WHERE `tbl_cart`.`user_id`='$userid' ORDER BY `tbl_item`.`item_id` ASC;";
                                                    $res = mysqli_query($conn, $iq);
                                                    $numi = mysqli_num_rows($res);
                                                    if ($numi > 0) {

                                                    ?>
                                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                                            <div>
                                                                <p class="mb-1" style="font-size:30px;">Shopping cart</p>
                                                                <p class="mb-0">You have <?php echo $numi; ?> items in your cart</p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        while ($row = mysqli_fetch_array($res)) {
                                                        ?>
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex flex-row align-items-center">
                                                                            <div>
                                                                                <img src="admin/docs/item-uploads/<?php echo $row['item_image']; ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <h3 class="widget-title" style="font-family: Arial, Helvetica, sans-serif;">&nbsp;<?php echo $row['item_name']; ?></h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-row align-items-center">
                                                                            <div style="width: 50px;">
                                                                                <h3 class="widget-title" style="font-family: Arial, Helvetica, sans-serif;">1</h3>
                                                                            </div>
                                                                            <div style="width: 80px;">
                                                                                <h3 class="widget-title" style="font-family: Arial, Helvetica, sans-serif;"><?php echo "₹" . $row['item_price']; ?></h3>
                                                                            </div>
                                                                            <a href="?idid=<?php echo $row['item_id']; ?>" style="color: black;"><i class="fas fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 200px;">
                                                                <h3 class="widget-title" style="font-family: Arial, Helvetica, sans-serif;">Total Amount : </h3>
                                                            </div>
                                                            <?php
                                                            $userid = $_SESSION['user_id'];
                                                            $stq = "SELECT * FROM `tbl_cart` INNER JOIN `tbl_item` ON (`tbl_cart`.`item_id` = `tbl_item`.`item_id`) WHERE `tbl_cart`.`user_id`='$userid' ORDER BY `tbl_item`.`item_id` ASC;";
                                                            $stres = mysqli_query($conn, $stq);
                                                            $stotal = 0;
                                                            while ($strow = mysqli_fetch_array($stres)) {
                                                                $i_price = $strow['item_price'];
                                                                $stotal = $stotal + $i_price;
                                                            }
                                                            ?>
                                                            <div style="width: 100px;">
                                                                <h3 class="widget-title" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $stotal; ?></h3>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if (isset($_SESSION['user_id'])) {
                                                        ?>
                                                            <form method="post">
                                                                <div class="btn-wrapper mt-5">
                                                                    <button type="submit" name="order_now" class="boxed-btn reverse-color">Order Now</button>
                                                                </div>
                                                            </form>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<p class='mb-1' style='font-size:30px;'>Your Cart is Empty</p>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget widget_search">
                    </div>
                    <div class="widget widget_recent_posts style-01">
                        <h4 class="widget-title style-01">Recent Post</h4>
                        <?php
                        $q = "select * from tbl_item order by item_id desc limit 3";
                        $res = mysqli_query($conn, $q);
                        while ($brow = mysqli_fetch_array($res)) {
                        ?>
                            <ul class="recent_post_item">
                                <li class="single-recent-post-item">
                                    <div class="thumb">
                                        <img src="admin/docs/item-uploads/<?php echo $brow['item_image']; ?>" alt="recent post">
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="item-details.php?iid=<?php echo $brow['item_id']; ?>">
                                                <?php echo $brow['item_name']; ?>
                                            </a></h4>
                                        <span class="time">&#8377;
                                            <?php echo $brow['item_price']; ?>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include "footer.php";
?>