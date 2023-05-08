<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bring Forth</title>

    <link rel=icon href=favicon.ico sizes="50x50" type="image/png">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/slick.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!--<div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>-->
    <div class="body-overlay" id="body-overlay"></div>
    <div class="search-popup" id="search-popup">
        <form action="https://bytesed.com/tf/fundorex/index.php" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button class="close-btn border-none"><i class="fas fa-times"></i></button>
        </form>
    </div>
    <div class="header-style-01">
        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar-inner">
                            <div class="volunteer-right">
                                <ul class="info-items-02">
                                    <li><a href="#"><i class="flaticon-heart"></i>Want to work with us ?</a></li>
                                    <li class="volunteer"><a href="volunteer.php">Become a Volunteer</a></li>
                                </ul>
                            </div>
                            <div class="left-contnet">
                                <ul class="info-items">
                                    <li><a href="create-acc.php"><i class="fa fa-user"> Create An Account </i></a></li>
                                    <li><a href="register-ngo.php"><i class="fa fa-edit"> Register NGO </i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area navbar-expand-lg has-topbar nav-style-02">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="index.php" class="logo"><img src="assets/img/Portal-LOGOO.jpg" width="170px" height="45px" alt=""></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                    <li>
                        <a href="ngo.php">NGOs</a>
                    </li>
                    <li>
                        <a href="search-ngo.php">Search NGOs</a>
                    </li>
                    <li>
                        <a href="events.php">Events</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <!--<li>
                        <a href="contact.php">Contact</a>
                    </li>-->

                    <?php
                    if (isset($_SESSION['user_id'])) {

                    ?>
                        <li class="menu-item-has-children">
                            <a href="#">My Account</a>
                            <ul class="sub-menu">
                                <li><a href="feedback.php">Give Feedback</a></li>
                                <li><a href="view-donation.php">View Donation</a></li>
                                <li><a href="business-profile.php">Make Business Profile</a></li>
                                <li><a href="view-business-profile.php">View my Business Profile</a></li>
                                <li><a href="change-password.php">Change Password</a></li>
                                <li><a href="cart.php">Your Cart</a></li>
                                <li><a href="orders.php">Your Orders</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>

                    <?php
                    }
                    ?>
                    <!-- <a href="contact.php">Change Password</a>-->

                </ul>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li>
                        <a href="donation.php">
                            <div class="info-bar-item">
                                <div class="icon">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="content">
                                    <span class="title">Make your</span>
                                    <p class="details"> Donation</p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>