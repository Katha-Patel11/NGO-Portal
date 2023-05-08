<?php 
session_start();
include "header.php";
include 'connection.php';
$cin=$_GET['cin'];
$bq="select * from tbl_business_profile where busi_cin_no='$cin'";
$bres=mysqli_query($conn,$bq);
$brow=mysqli_fetch_array($bres);
$no=$brow['busi_cin_no'];
$bname=$brow['busi_name'];
$bdetail=$brow['busi_details'];
$mo_no=$brow['busi_mobile_no'];
$address=$brow['busi_address'];
$email=$brow['busi_email'];
if(isset($_POST['submit']))
{
    $no=$_POST['busi_cin_no'];
    $bname=$_POST['busi_name'];
    $bdetails=mysqli_real_escape_string($conn,$_POST['busi_details']);
    $mo_no=$_POST['busi_mobile_no'];
    $address=$_POST['busi_address'];
    $email=$_POST['busi_email'];
    $sql="update tbl_business_profile set busi_cin_no='$no',busi_name='$bname',busi_details='$bdetails',busi_mobile_no='$mo_no',busi_address='$address',busi_email='$email' where busi_cin_no='$no'";
    if(mysqli_query($conn,$sql))
    {
        echo "<script> alert('Updated Successfully');window.location='view-business-profile.php'; </script>";
    }
    else
    {
        echo "<script> alert('Error Updating');window.location='view-business-profile.php'; </script>";
    }    
}
?>
<div class="breadcrumb-area" style="background-image:url('assets/img/breadcrumb/01.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Business Profile</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Update Business Profile </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-inner-area padding-bottom-120 padding-top-50">
    <div class="container">
    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <div></div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 offset-lx-1">
        <div class="row">
            <div class="col-lg-10 col-sm-11 col-11">
                <div class="section-title padding-top-25 margin-bottom-55">
                    <h2 class="title"><span>Update<br></span> Business Profile </h2>
                </div>
            </div>
        </div>
        <div class="contact-form style-01">
            <form method="post" class="contact-page-form style-01">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business CIN No</b></label>
                            <input class="form-control" type="text" placeholder="Enter business cin no" name="busi_cin_no" value='<?php echo $no; ?>' required readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Name</b></label>
                                <input class="form-control" type="text" placeholder="Enter business name" name="busi_name" value='<?php echo $bname; ?>' required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Details</b></label>
                            <textarea name="busi_details" cols="1" rows="4" placeholder="Enter business details" required><?php echo $bdetail; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Mobile Number</b></label>
                            <input type="text" name="busi_mobile_no" placeholder="Mobile No." class="form-control" value='<?php echo $mo_no; ?>' required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b> Business Address</b></label>
                            <textarea name="busi_address" cols="1" rows="4" placeholder="Enter your Address" required><?php echo $address; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname"><b>Business Email</b></label>
                                <input class="form-control" type="email" placeholder="Enter email address" name="busi_email" value='<?php echo $email; ?>'  required>
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

<?php 
    include "footer.php";
?>