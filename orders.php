<?php
session_start();
include "header.php";
include 'connection.php';
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
<div class="breadcrumb-area" style="background-image:url('assets/img/order.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Your Order</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Your Order</span></li>
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
                                                    $iq = "SELECT * FROM `tbl_order_master`";
                                                    $res = mysqli_query($conn, $iq);
                                                    $numi = mysqli_num_rows($res);
                                                    if ($numi > 0) {

                                                    ?>
                                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                                            <div>
                                                                <p class="mb-1" style="font-size:30px;">Your Orders</p>
                                                                <p class="mb-0">You have <?php echo $numi; ?> Order</p>
                                                            </div>
                                                        </div>
                                                        <table class="table">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order ID</th>
                                                                <th>Order Date</th>
                                                                <th>Order Details</th>
                                                            </tr>
                                                            <?php
                                                            $i = 0;
                                                            while ($row = mysqli_fetch_array($res)) {
                                                                $i++;
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $i ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo "#" . $row['order_id'] . $i . date('ydm', strtotime($row['order_date'])) . $_SESSION['user_id']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo date('d-m-y', strtotime($row['order_date'])); ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="order-details.php?order_id=<?php echo $row['order_id']; ?>" style="color: black;"><i class="fas fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "<h3>You Have No records yet!!</h3>";
                                                        }
                                                        ?>
                                                        </table>
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