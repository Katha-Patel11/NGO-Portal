<?php 
    session_start();
    include "header.php";
    include 'connection.php';
?>
<div class="header-area header-bg" style="background-image:url(assets/img/header-slider/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-inner"> 
                    <div class="icon">
                        <img src="assets/img/icon/01.png">
                    </div>
                    <span>Donate, Fundraise & Volunteer</span>
                    <h1 class="title">Share, Earn & Smile</h1>
                    <p>They Dream We Realize</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom-area m-top bg-image padding-bottom-50 padding-top-100" style="background-image: url(assets/img/bg/02.png);">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-12">
                <div class="help-and-support-left">
                    <div class="section-title margin-bottom-35">
                        <span>Home</span>
                        <h2 class="title">Who We <span>Are</span></h2>
                        <p><strong>Bring Forth, Gujarat's most comprehensive source of NGO information, welcomes you to explore the NGOs all over the Gujarat. Our online NGO information repository highlights the activities of Gujarat's civil society and serves as the foundation of the Guajarat's philanthropic ecosystem. By making information available in the public domain, Bring Forth improves the discovery, visibility, and credibility of Non-Governmental Organizations (NGOs).</strong></p><br>
                        <p><strong>Bring Forth is a portal that provides this industry with research, content, data, and digital communication. Bring Forth is developing research-based content that directly assists individuals and organisations in growing. Our mission is to provide useful news and descriptive information that everyone working in this field needs to know. So, we're into it, assisting individuals and organisations in their overall development through digital communication. And, yes, in content development, which is crucial for reaching the greatest number of people.</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 offset-xl-1">
                <div class="help-and-support-right bg-image" style="background-image: url(assets/img/support/bg.png);">
                    <div class="support-img">
                        <div class="thumb">
                            <img src="assets/img/support/01.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-latest-area padding-bottom-90 padding-top-90">
    <div class="volunteer-area m-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-5 col-xl-4">
                    <div class="volunteer-single-item no-border margin-bottom-30 bg-image" style="background-image: url(assets/img/volunteer/bg.png);">
                        <div class="icon">
                        <i class="far fa-handshake"></i>
                        </div>
                        <div class="content">
                            <h1 class="title">
                            <?php
                                $sql = "SELECT * from tbl_ngo_master";
                                if ($result = mysqli_query($conn, $sql)) 
                                {
                                    $rowcount = mysqli_num_rows( $result );
                                    echo($rowcount);
                                }
                                ?>
                                </h1>
                            <a class="title">NGO's Enrolled</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-4">
                    <div class="volunteer-single-item no-border style-01 margin-bottom-30 bg-image" style="background-image: url(assets/img/volunteer/bg.png);">
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="content">
                            <h1 class="title">
                            <?php
                                $sql = "SELECT * from tbl_volunteer";
                                if ($result = mysqli_query($conn, $sql)) 
                                {
                                    $rowcount = mysqli_num_rows( $result );
                                    echo($rowcount);
                                }
                                ?>
                                </h1>
                            <a class="title">Registered Volunteer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-4">
                    <div class="volunteer-single-item no-border style-02 margin-bottom-30 bg-image" style="background-image: url(assets/img/volunteer/bg.png);">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="content">
                            <h1 class="title">
                            <?php
                                if(isset($_SESSION['views']))
                                    $_SESSION['views'] = $_SESSION['views']+1;
                                else
                                    $_SESSION['views']=1;
                                echo $_SESSION['views'];
                                ?>
                                <?php
                                    /*session_start();
                                    $views = $_SESSION['views']; 
                                        
                                    unset($_SESSION['views']); 
                                    session_destroy();*/
                                ?>
                                </h1>
                            <a class="title">Visitors/Monthly</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="work-towards-area bg-image padding-bottom-115 padding-top-120" style="background-image: url(assets/img/bg/04.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="left-content">
                    <div class="inner-section-title padding-top-160 bg-image" style="background-image: url(assets/img/charity/01.png);">
                    <h2 class="title">You Have The Power To Bring Happiness</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog-area bg-image padding-top-40 padding-bottom-40" style="background-image: url(assets/img/bg/03.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5"></div>
                <div class="section-title margin-bottom-35">
                    <h2 class="title">We help individuals and organizations to grow.</span></h2>
                </div>
        </div>
    </div>
</section>
<?php 
    include "footer.php";
?>