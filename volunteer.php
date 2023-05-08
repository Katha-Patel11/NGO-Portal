<?php
session_start();
include "header.php";
include 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['volunteer_name'];
    $email = $_POST['volunteer_email'];
    $address = mysqli_real_escape_string($conn, $_POST['volunteer_address']);
    $mo_no = $_POST['volunteer_mobile_no'];
    $dob = $_POST['volunteer_dob'];
    $gender = $_POST['volunteer_gender'];
    $sql = "INSERT INTO `tbl_volunteer`(`volunteer_name`, `volunteer_email`, `volunteer_password`, `volunteer_mobile_no`,`volunteer_address`, `volunteer_dob`, `volunteer_gender`) VALUES('$name','$email','$mo_no','$address','$dob','$gender')";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Register Successfully'); </script>";
    } else {
        echo "<script> alert('Password and confirm Password Do not match'); </script>";
    }
}
?>
<div class="contact-vol-area padding-bottom-100 padding-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <br><br>
                <h4 class="title"><b>
                Sometimes the right words can perform magic, 
                helping us reach new horizons and inspiring us to do good for others.</h4></b><br><br><br>
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/vol.jpg');">
                </div> <br><br><br><br><br>
                <center><pre><h4 class="title"><b>Expect the best through volunteering. 
                A Complete Change Of Heart</h4></b></pre></center>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-10 col-sm-11 col-11">
                    <div class="section-title padding-top-25 margin-bottom-55">
                        <span>Making A Difference In The Life Of Others.</span>
                        <h2 class="title">Volunteer <span>Registration</span></h2>
                    </div>
                </div>
            </div>
            <div class="contact-form style-01">
                <form method="post" class="contact-page-form style-01" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Volunteer Name</b></label>
                                <input class="form-control" type="text" placeholder="Enter Volunteer name" name="volunteer_name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Eamil</b></label>
                                <input class="form-control" type="email" placeholder="Enter email address" name="volunteer_email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Mobile Number</b></label>
                                <input type="text" name="volunteer_mobile_no" placeholder="Mobile No." class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Address</b></label>
                                <textarea name="volunteer_address" cols="1" rows="4" placeholder="Enter your Address" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Date Of Birth</b></label>
                                <input class="form-control" type="date" placeholder="Enter your dob" name="volunteer_dob" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3"><b>Gender</b></label>
                                <input class="form-check-input" type="radio" name="volunteer_gender" value="Male">Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="volunteer_gender" value="Female">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="volunteer_gender" value="Female">Other
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