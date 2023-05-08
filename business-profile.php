<?php 
session_start();
include "header.php";
include 'connection.php';
if(isset($_POST['submit']))
{
    $no=$_POST['busi_cin_no'];
    $bname=$_POST['busi_name'];
    $bdetail=mysqli_real_escape_string($conn,$_POST['busi_details']);
    $mo_no=$_POST['busi_mobile_no'];
    $address=$_POST['busi_address'];
    $email=$_POST['busi_email'];
    $userid=$_SESSION['user_id'];
    $sql="insert into tbl_business_profile (busi_cin_no,busi_name,busi_details,busi_mobile_no,busi_address,busi_email,user_id) values('$no','$bname','$bdetail','$mo_no','$address','$email','$userid')";
    if(mysqli_query($conn,$sql))
    {
        echo "<script> alert('Register Successfully'); </script>";
    }
    else
    {
        echo "<script> alert('Register unsuccessfully'); </script>";
    }    
}
?>
<div class="contact-profile-area padding-bottom-100 padding-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6"><br>
            <ul><h4 class="title"><b>Why You Need a Business Profile </h4></b>
                <li>It creates an opportunity for collaborations. Your profile acts like a dossier that highlights the philosophy and roadmap of your business.</li>
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/bprofile.jpg');">
                </div>
                <br>
                <ul style="list-style-type:disc"><h4 class="title"><b>What is collaboration?</h4></b>
                    <li>Collaboration is when two or more members of a team work together to brainstorm ideas, solve problems, complete projects, and achieve common goals.</li>
                </ul>
                <br>
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/bprofile2.jpg');">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
                <div class="section-title padding-top-25 margin-bottom-55">
                    <span>Making A Difference In The Life Of Others.</span>
                    <h2 class="title">Business Profile <span>Registration</span></h2>
                </div>
            </div>
        </div>
        <div class="contact-form style-01">
            <form method="post" class="contact-page-form style-01">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business CIN No</b></label>
                            <input class="form-control" type="text" placeholder="Enter business cin no" name="busi_cin_no" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Name</b></label>
                                <input class="form-control" type="text" placeholder="Enter business name" name="busi_name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Details</b></label>
                            <textarea name="busi_details" cols="1" rows="4" placeholder="Enter business details" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Mobile Number</b></label>
                            <input type="text" name="busi_mobile_no" placeholder="Mobile No." class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b> Business Address</b></label>
                            <textarea name="busi_address" cols="1" rows="4" placeholder="Enter your Address" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Email</b></label>
                                <input class="form-control" type="email" placeholder="Enter email address" name="busi_email" required>
                        </div>
                    </div>      
                    <div class="col-md-12">
                        <div class="btn-wrapper">
                            <input class="boxed-btn reverse-color" type="submit" name="submit" value="Submit" required>
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