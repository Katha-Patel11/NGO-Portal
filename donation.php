<?php 
    session_start();
    include "header.php";
    include "connection.php";
    if(!isset($_SESSION['user_id']))
    {
        echo "<script>window.location='login.php';alert('You will have to Log In to Donate.')</script>";
    }
?>
<?php
    if(isset($_POST['submit']))
    {
        $amt=$_POST['donation_amount'];
        $ngoid=$_POST['ngo_id'];
        $user_id=$_SESSION['user_id'];
        $q="insert into tbl_donation(donation_amount,user_id,ngo_id) values('$amt','$user_id','$ngoid')";
        $res=mysqli_query($conn,$q);
        if($res)
        {
            echo "<script>window.location='thankyou-page-donation.php';</script>";
        }
    }
?>
<div class="contact-donation-area padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/donation.jpg');">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
                        <div class="section-title padding-top-25 margin-bottom-55">
                            <h2 class="title"><span>Donate</span></h2>
                        </div>
                    </div>
                </div>
                <div class="contact-form style-01">
                    <form  class="contact-page-form style-01" novalidate="novalidate" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b> Amount to Donate : </b></label> 
                                    <input type="number" name="donation_amount" placeholder="Amount" class="form-control" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b> NGO : </b></label> 
                                    <select class="form-control" style="height:50px;" name="ngo_id">
                                            <?php
                                            $nq=mysqli_query($conn,"select * from tbl_ngo_master");
                                            while($row=mysqli_fetch_array($nq))
                                            {
                                                //echo "<option value=".$row['sector_id'].">". $row['sector_name']." </option>";
                                                echo "<option value='{$row['ngo_id']}'> {$row['ngo_name']} </option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-wrapper">
                                    <input class="boxed-btn reverse-color" type="submit" name="submit" value="Donate">
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
