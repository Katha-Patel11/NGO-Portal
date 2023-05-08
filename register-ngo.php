<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Bring Forth - Admin Panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        function getXMLHTTP() { //fuction to return the xml http object
            var xmlhttp = false;
            try {
                xmlhttp = new XMLHttpRequest(); // XMLHttpRequest object is used to exchange data with a server behind the scenes. 
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    try {
                        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e1) {
                        xmlhttp = false;
                    }
                }
            }

            return xmlhttp;
        }


        // Below Function Will Fetch Data From the URL and Also Will Return Response
        function getsubcat(strURL) {
            var req = getXMLHTTP(); // fuction to get xmlhttp object
            if (req) {
                req.onreadystatechange =
                    function() {
                        if (req.readyState == 4) { //data is retrieved from server
                            if (req.status == 200) { // which reprents ok status                    
                                document.getElementById('subdiv').innerHTML = req.responseText;
                            } else {
                                alert("There was a problem while using XMLHTTP:\n");
                            }
                        }
                    }
                req.open("GET", strURL, true); //open url using get method
                req.send(null);
            }
        }
    </script>
</head>
<?php
session_start();
include 'header.php';
include 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['ngo_name'];
    $reg_no = $_POST['ngo_reg_no'];
    $details = mysqli_real_escape_string($conn, $_POST['ngo_details']);
    $address = mysqli_real_escape_string($conn, $_POST['ngo_address']);
    $sid = $_POST['sector_id'];
    $cid = $_POST['city_id'];
    $aid = $_POST['area_id'];
    $mo_no = $_POST['ngo_mobile_no'];
    $email = $_POST['ngo_email'];
    $pass = $_POST['ngo_password'];
    $con_pass = $_POST['con_ngo_password'];
    $found_year = $_POST['ngo_found_year'];
    $image = $_FILES['ngo_image']['name'];
    $path = $_FILES['ngo_image']['tmp_name'];
    if ($user_con_pass == $user_password) {
        $sql = "insert into tbl_ngo_master (ngo_name,ngo_reg_no,ngo_details,ngo_address,sector_id,area_id,city_id,ngo_mobile_no,ngo_email,ngo_password,ngo_found_year,ngo_image) values('$name','$reg_no','$details','$address','$sid','$aid','$cid','$mo_no','$email','$pass','$found_year','$image')";
        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($path, "admin/docs/ngo-uploads/" . $image);
            echo "<script>window.location='about.php';</script>";
        } else {
            echo "Problem" . mysqli_error($conn);
        }
    } else {
        echo "<script> alert('Password and confirm Password Do not match'); </script>";
    }
}
?>
<!-- Form -->
<div class="contact-register-area padding-bottom-100 padding-top-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6"><br><br><br><br>
                <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/register1.jpg');">
                </div>
                <br><br><br><br><br><br>
                <ul><h4 class="title"><b>Why is NGO Registration required?</h4></b><br><br>
                    <li>It provides credibility to the organisation, and those making donations are more likely to associate with registered NGOs; registration provides a sense of legitimacy.</li>
                    <li>NGO registration increases publicity for the organisation and may assist a local NGO in expanding its scope or region of activity.</li>
                    <li>It broadens the reach of introducing both monetary and manual resources. More volunteers will step forward, which will benefit the NGO.</li>    
                    <li>Registering the organisation as an NGO in India under the Companies Act, 2013 entitles the company's directors to a number of privileges. NGOs in India are free from numerous taxes, which allows the firm to save money and invest it in new projects.</li>
                </ul>
                <br>
                <div class="content-area-wrapper bg-image" style="background-image: url(assets/img/register2.jpg); ">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-lx-1">
                <div class="row">
                    <div class="col-lg-col-sm-11 col-11">
                        <div class="section-title padding-top-25 margin-bottom-55">
                            <span>Fill The Form</span>
                            <h2 class="title">Register Your <span> NGO</span></h2>
                        </div>
                    </div>
                </div>
            <!-- Form to Create Account -->
            <div class="contact-form style-01">
                <form class="contact-page-form style-01" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name"><b>NGO Name</b></label>
                                <input type="text" name="ngo_name" placeholder="Enter Name Of NGO" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>NGO Registeration No</b></label>
                                <input type="text" name="ngo_reg_no" placeholder="Enter Registration-No Of NGO" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name"><b>Details of Your NGO</b></label>
                                <textarea class="form-control" placeholder="Enter Details Of NGO" rows="5" cols="40" name="ngo_details" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address"><b>Address</b></label>
                                <textarea class="form-control" name="ngo_address" id="msg" cols="1" rows="4" placeholder=" Enter Address Of NGO" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address"><b>Sector</b></label>
                                <select class="form-control" style="height:50px; width:530px;" name="sector_id" required>
                                    <option>------------------------Select sector------------------------</option>
                                    <?php
                                    $sq = mysqli_query($conn, "select *from tbl_sector");
                                    while ($row = mysqli_fetch_array($sq)) {
                                        echo "<option value= '{$row['sector_id']}'>{$row['sector_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="control-label "><b>City</b></label>
                            <select class="form-control" style="height:50px; width:530px;" name="city_id" onchange="getsubcat('ajax-get-city.php?city='+this.value)">
                                <?php
                                $q = mysqli_query($conn, "select * from tbl_city");
                                echo "<option value=''>------------Select City------------</option>";
                                while ($data = mysqli_fetch_row($q)) {
                                    echo "<option value='$data[0]'>$data[1]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        </div>
                        <div class="form-group col-md-12" id="subdiv">
                            <label for="address"><b>Area</b></label>
                            <select class="form-control" style="height:50px; width:530px;" name="area_id">
                                <option value="">------------Select City First------------</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Mobile Number</b></label>
                                <input type="number" name="ngo_mobile_no" placeholder="Enter Mobile No." class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Email Address</b></label>
                                <input type="email" name="ngo_email" placeholder="Enter E-mail" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Password</b></label>
                                <input type="password" name="ngo_password" placeholder="Enter Password" class="form-control" required="" pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Confirm Password</b></label>
                                <input type="password" name="con_ngo_password" placeholder="Confirm Password" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Found Year</b></label>
                                <input type="year" name="ngo_found_year" placeholder="Enter Found Year Of NGO" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname"><b>Image</b></label>
                                <input type="file" class="form-control" placeholder="Choose file" name="ngo_image" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-wrapper">
                                <input class="boxed-btn reverse-color" type="submit" name="submit" value="Register">
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