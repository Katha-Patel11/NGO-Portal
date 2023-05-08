<?php
session_start();
include "header.php";
include "connection.php";
?>
<?php
if (isset($_POST['fsubmit'])) {
    $details = $_POST['feedback_details'];
    $user_id = $_SESSION['user_id'];
    $date = date("Y-m-d");
    $q = "insert into tbl_feedback(feedback_details,user_id,feedback_date) values('$details','$user_id','$date')";
    $res = mysqli_query($conn, $q);
    if ($res) {
        echo "<script>window.location='thankyou-page-feedback.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div class="contact-feedback-area padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/feedback1.jpg');">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
                        <div class="section-title padding-top-25 margin-bottom-55">
                            <h2 class="title"><span>Feedback</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="contact-form style-01">
                    <form class="contact-page-form style-01" novalidate="novalidate" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b> Enter Name : </b></label>
                                    <input type="text" name="name" placeholder="Your Name" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label><b> Enter E-mail : </b></label>
                                    <input type="email" name="email" placeholder="Your E-mail" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label><b> Give Feedback : </b></label>
                                    <input type="text" name="feedback_details" placeholder="Your Feedback" class="form-control" required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-wrapper">
                                    <input class="boxed-btn reverse-color" type="submit" name="fsubmit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>



<!--<div class="breadcrumb-area" style="background-image:url(assets/img/breadcrumb/01.jpg);">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-inner">
<div class="icon">
<img src="assets/img/icon/01.png" alt="">
</div>
<h2 class="page-title">Donation</h2>
<ul class="page-list">
<li><a href="index.php">Home</a></li>
<li><a href="#">Donation</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>

<div class="our-latest-area padding-bottom-130 padding-top-120">
<div class="container">
<div class="row">

 
<div class="col-lg-6 col-xl-4 col-md-6">
    <div class="contribute-single-item">
        <div class="thumb">
            <img src="assets/img/contribute/01.jpg" alt="">
        </div>
        <div class="content">
            <div class="progress-content">
                <div class="progress-item">
                    <div class="single-progressbar">
                        <div class="html"></div>
                    </div>
                </div>
                <div class="goal">
                    <h4 class="raised">Raised : $900</h4>
                    <h4 class="raised">Goal : $900</h4>
                </div>
            </div>
            <h3 class="title">
            Save the children from corona dieses earthquake
            </h3>
            <p>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their. </p>
            <div class="btn-wrapper">
                <a href="#" class="boxed-btn">Read More</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-xl-4 col-md-6">
<div class="contribute-single-item">
<div class="thumb">
<img src="assets/img/contribute/02.jpg" alt="">
</div>
<div class="content">
<div class="progress-content">
<div class="progress-item">
<div class="single-progressbar">
<div class="html"></div>
</div>
</div>
<div class="goal">
<h4 class="raised">Raised : $900</h4>
<h4 class="raised">Goal : $900</h4>
</div>
</div>
<h3 class="title">
Save animal from damage jungle by earthquake
</h3>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their. </p>
<div class="btn-wrapper">
<a href="#" class="boxed-btn">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-xl-4 col-md-6">
<div class="contribute-single-item">
<div class="thumb">
<img src="assets/img/contribute/03.jpg" alt="">
</div>
<div class="content">
<div class="progress-content">
<div class="progress-item">
 <div class="single-progressbar">
<div class="html"></div>
</div>
</div>
<div class="goal">
<h4 class="raised">Raised : $900</h4>
<h4 class="raised">Goal : $900</h4>
</div>
</div>
<h3 class="title">
Save animal from damage jungle by earthquake
</h3>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their. </p>
<div class="btn-wrapper">
<a href="#" class="boxed-btn">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-xl-4 col-md-6">
<div class="contribute-single-item">
<div class="thumb">
<img src="assets/img/contribute/01.jpg" alt="">
</div>
<div class="content">
<div class="progress-content">
<div class="progress-item">
<div class="single-progressbar">
<div class="html"></div>
</div>
</div>
<div class="goal">
<h4 class="raised">Raised : $900</h4>
<h4 class="raised">Goal : $900</h4>
</div>
</div>
<h3 class="title">
Save the children from corona dieses earthquake
</h3>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their. </p>
<div class="btn-wrapper">
<a href="#" class="boxed-btn">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-xl-4 col-md-6">
<div class="contribute-single-item">
<div class="thumb">
<img src="assets/img/contribute/02.jpg" alt="">
</div>
<div class="content">
<div class="progress-content">
<div class="progress-item">
<div class="single-progressbar">
<div class="html"></div>
</div>
</div>
<div class="goal">
<h4 class="raised">Raised : $900</h4>
<h4 class="raised">Goal : $900</h4>
</div>
</div>
<h3 class="title">
Save animal from damage jungle by earthquake
</h3>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their. </p>
<div class="btn-wrapper">
<a href="#" class="boxed-btn">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-xl-4 col-md-6">
 <div class="contribute-single-item">
<div class="thumb">
<img src="assets/img/contribute/03.jpg" alt="">
</div>
<div class="content">
<div class="progress-content">
<div class="progress-item">
<div class="single-progressbar">
<div class="html"></div>
</div>
</div>
<div class="goal">
<h4 class="raised">Raised : $900</h4>
<h4 class="raised">Goal : $900</h4>
</div>
</div>
<h3 class="title">
Save animal from damage jungle by earthquake
</h3>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their. </p>
<div class="btn-wrapper">
<a href="#" class="boxed-btn">Read More</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="volunteer-area padding-bottom-120">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-6 col-xl-4">
<div class="volunteer-single-item margin-bottom-30 bg-image" style="background-image: url(assets/img/volunteer/bg.png);">
<div class="icon">
<i class="flaticon-man"></i>
</div>
<div class="content">
<h4 class="title">
<a href="#">Be a Volunteer</a>
</h4>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children.</p>
</div>
</div>
</div>
<div class="col-md-6 col-lg-6 col-xl-4">
<div class="volunteer-single-item style-01 margin-bottom-30 bg-image" style="background-image: url(assets/img/volunteer/bg.png);">
<div class="icon">
<i class="flaticon-gift"></i>
</div>
<div class="content">
<h4 class="title">
<a href="#">Start Donating</a>
</h4>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children.</p>
</div>
</div>
</div>
<div class="col-md-6 col-lg-6 col-xl-4">
<div class="volunteer-single-item style-02 margin-bottom-30 bg-image" style="background-image: url(assets/img/volunteer/bg.png);">
<div class="icon">
<i class="flaticon-woman"></i>
</div>
<div class="content">
<h4 class="title">
<a href="#">Join our community</a>
</h4>
<p>We are a non-profit organisation in USA that works towards supporting underprivileged children.</p>
</div>
</div>
</div>
</div>
</div>
</div>

<section class="testimonial-area bg-image padding-bottom-120 padding-top-105" style="background-image: url(assets/img/bg/03.jpg);">
 <div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-12 p-0">
<div class="section-title white desktop-center margin-bottom-50">
<h3 class="title">What <span>peoples</span> say about us
</h3>
</div>
</div>
</div>
<div class="row no-gutters justify-content-center">
<div class="col-lg-7">
<div class="testimonial-carousel-area bg-blue">
<div class="testimonial-carousel">
<div class="single-testimonial-item">
<div class="thumb bg-image" style="background-image: url(assets/img/testimonial/01.png);">
<div class="icon">
<i class="fas fa-quote-right"></i>
</div>
</div>
</div>
<div class="single-testimonial-item">
<div class="thumb bg-image" style="background-image: url(assets/img/testimonial/02.png);">
<div class="icon">
<i class="fas fa-quote-right"></i>
</div>
</div>
</div>
<div class="single-testimonial-item">
<div class="thumb bg-image" style="background-image: url(assets/img/testimonial/03.png);">
<div class="icon">
<i class="fas fa-quote-right"></i>
</div>
</div>
</div>
<div class="single-testimonial-item">
<div class="thumb bg-image" style="background-image: url(assets/img/testimonial/01.png);">
<div class="icon">
<i class="fas fa-quote-right"></i>
</div>
</div>
</div>
</div>
</div>
<div class="content-carousel">
<div class="single-testimonial-item">
<div class="content">
<div class="author-details">
<div class="author-meta">
<h4 class="title">Andre Fuad</h4>
</div>
</div>
<p class="description">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</p>
</div>
</div>
<div class="single-testimonial-item">
<div class="content">
<div class="author-details">
<div class="author-meta">
<h4 class="title">Andre Robin</h4>
</div>
</div>
<p class="description">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</p>
</div>
</div>
<div class="single-testimonial-item">
<div class="content">
<div class="author-details">
 <div class="author-meta">
<h4 class="title">Andre Fahad</h4>
</div>
</div>
<p class="description">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</p>
</div>
</div>
<div class="single-testimonial-item">
<div class="content">
<div class="author-details">
<div class="author-meta">
<h4 class="title">Andre Robin</h4>
</div>
</div>
<p class="description">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="volunteer-area m-top-02 bg-image padding-bottom-90 padding-top-120" style="background-image: url(assets/img/bg/03.png);">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="volunteer-title-content margin-bottom-50">
<div class="section-title desktop-left">
<span>Our Volunteer</span>
<h3 class="title"><span>Volunteers</span> who always support us
</h3>
</div>
<div class="section-paragraph">
<P>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</P>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-sm-6">
<div class="team-single-item">
<div class="thumb">
<img src="assets/img/team/01.jpg" alt="">
<div class="content">
<h4 class="title">Maria Anahonda
</h4>
<div class="social-link">
<ul>
<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="team-single-item">
<div class="thumb">
<img src="assets/img/team/02.jpg" alt="">
<div class="content style-01">
<h4 class="title">Maria Anahonda
</h4>
<div class="social-link">
<ul>
<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="team-single-item">
<div class="thumb">
<img src="assets/img/team/03.jpg" alt="">
<div class="content style-02">
<h4 class="title">Maria Anahonda
</h4>
<div class="social-link">
<ul>
<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="team-single-item">
<div class="thumb">
<img src="assets/img/team/04.jpg" alt="">
<div class="content style-03">
<h4 class="title">Maria Anahonda
</h4>
<div class="social-link">
<ul>
<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>-->