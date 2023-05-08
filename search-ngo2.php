<?php
session_start();
include 'header.php';
include 'connection.php';
if (isset($_POST['search'])) 
{
    $city_id = $_POST['city_id'];
    $area_id = $_POST['area_id'];
    $sector_id = $_POST['sector_id'];
    $ngo_name = $_POST['ngo_name'];
    $ngoq = "SELECT `tbl_ngo_master`.`ngo_id`, `tbl_ngo_master`.`ngo_name`, `tbl_ngo_master`.`ngo_reg_no`, `tbl_ngo_master`.`ngo_details`, `tbl_ngo_master`.`ngo_address`, `tbl_ngo_master`.`city_id`,`tbl_ngo_master`.`area_id`,`tbl_ngo_master`.`ngo_mobile_no`,`tbl_ngo_master`.`ngo_email`,`tbl_ngo_master`.`ngo_password`,`tbl_ngo_master`.`ngo_found_year`,`tbl_ngo_master`.`ngo_image`, `tbl_sector`.`sector_name` FROM `tbl_ngo_master` INNER JOIN `tbl_sector` ON (`tbl_ngo_master`.`sector_id` = `tbl_sector`.`sector_id`)";
    if (isset($_POST['city_id']) && $_POST['city_id'] != '' || isset($_POST['area_id']) || $_POST['area_id'] != '' || isset($_POST['sector_id']) || $_POST['sector_id'] != '' || isset($_POST['ngo_name']) || $_POST['ngo_name'] != '') 
    {
        $ngoq .= " WHERE ";
    }
    if (isset($_POST['city_id']) && $_POST['city_id'] != '') 
    {
        $ngoq .= " `tbl_ngo_master`.`city_id`='$city_id' ";
        if (isset($_POST['area_id']) && $_POST['area_id'] != '') 
        {
            $ngoq .= " AND ";
        }
    }
    if (isset($_POST['area_id']) && $_POST['area_id'] != '') 
    {
        $ngoq .= "`tbl_ngo_master`.`area_id`='$area_id' ";
        if (isset($_POST['sector_id']) && $_POST['sector_id'] != '')
        {
            $ngoq .= " AND ";
        }
    }
    if (isset($_POST['sector_id']) && $_POST['sector_id'] != '') 
    {
        $ngoq .= "`tbl_ngo_master`.`sector_id`='$sector_id' ";
        if (isset($_POST['ngo_name']) && $_POST['ngo_name'] != '') 
        {
            $ngoq .= " AND ";
        }
    }

    if (isset($_POST['ngo_name']) && $_POST['ngo_name'] != '') 
    {
        $ngoq .= "`tbl_ngo_master`.`ngo_name` LIKE '%$ngo_name%' ";
    }
    $ngoq .= " ORDER BY `tbl_ngo_master`.`ngo_id` ASC;";
    $res = mysqli_query($conn, $ngoq);
}
else 
{
    $ngoq = "SELECT `tbl_ngo_master`.`ngo_id`, `tbl_ngo_master`.`ngo_name`, `tbl_ngo_master`.`ngo_reg_no`, `tbl_ngo_master`.`ngo_details`, `tbl_ngo_master`.`ngo_address`, `tbl_ngo_master`.`city_id`,`tbl_ngo_master`.`area_id`,`tbl_ngo_master`.`ngo_mobile_no`,`tbl_ngo_master`.`ngo_email`,`tbl_ngo_master`.`ngo_password`,`tbl_ngo_master`.`ngo_found_year`,`tbl_ngo_master`.`ngo_image`, `tbl_sector`.`sector_name` FROM `tbl_ngo_master` INNER JOIN `tbl_sector` ON (`tbl_ngo_master`.`sector_id` = `tbl_sector`.`sector_id`) ORDER BY `tbl_ngo_master`.`ngo_id` ASC;";
    $res = mysqli_query($conn, $ngoq);
}
?>
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
    <script type="text/javascript">
    
  function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();  // XMLHttpRequest object is used to exchange data with a server behind the scenes. 
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		return xmlhttp;
	}
    // Below Function Will Fetch Data From the URL and Also Will Return Response
    function getsubcat(strURL)
    {         
    var req = getXMLHTTP(); // fuction to get xmlhttp object
        if (req)
        {
            req.onreadystatechange = 
            function(){
            if (req.readyState == 4) 
            { //data is retrieved from server
                if (req.status == 200) 
                    { // which reprents ok status                    
                    document.getElementById('subdiv').innerHTML=req.responseText;
                }
                    else
                        { 
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
<!-- Banner  -->
<div class="breadcrumb-area" style="background-image:url(assets/img/breadcrumb/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="icon">
                        <img src="assets/img/icon/01.png" alt="">
                    </div>
                    <h2 class="page-title">Search NGOs</h2>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li><span style="color:#fcb11a;">Search NGOs</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form -->
<div class="contact-inner-area padding-bottom-120 padding-top-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 offset-lx-1">
            <div class="row">
                <div class="col-lg-10 col-sm-11 col-11">
                    <div class="section-title padding-top-25 margin-bottom-55">
                        <h2 class="title">Search For <span>NGO</span></h2>
                    </div>
                </div>
            </div>
            <!-- Form to Create Account -->
            <div class="contact-form style-01">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="control-label col-md-2"><b>City</b></label>
                        <div class="col-md-7">
                            <select class="form-control" name="city_id" onchange="getsubcat('ajax-get-city.php?city='+this.value)">
                                <?php 
                                    $q = mysqli_query($conn,"select * from tbl_city");
                                    echo "<option>------------Select city------------</option>";
                                    while($data = mysqli_fetch_row($q))
                                    {
                                    echo "<option value='$data[0]'>$data[1]</option>"; 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="subdiv"></div>
                    <div class="form-group row">
                        <label class="control-label col-md-2"><b>Sector</b></label>
                        <div class="col-md-7">
                            <select class="form-control" name="sector_id">
                                <option>------------Select sector------------</option>
                                <?php
                                $sq = mysqli_query($conn, "select *from tbl_sector");
                                while ($srow = mysqli_fetch_array($sq)) {
                                    echo "<option value= '{$srow['sector_id']}'>{$srow['sector_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2"><b>NGO Name</b></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" placeholder="Enter full name" name="ngo_name">
                        </div>
                    </div>
                    <div class="btn-wrapper">
                        <input class="boxed-btn reverse-color" type="submit" name="search" value="Search">
                    </div>
                </form>
            </div>
        </div>
        <section class="attend-events-area padding-top-40 padding-bottom-90">
            <div class="container">
                <div class="tile-body">
                    <div class="row">
                        <!-- NGO Block -->
                        <?php
                        
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <div class="col-lg-6">
                                <div class="events-single-item bg-image margin-bottom-30" style="background-image: url(assets/img/events/bg.png);">
                                    <div class="thumb">
                                        <div class="bg-image" style="background-image: url(admin/docs/ngo-uploads/<?php echo $row['ngo_image']; ?>)">
                                        </div>
                                    </div>
                                    <div class="content-wrapper">
                                        <div class="content">
                                            <a class="title" href="ngo-details.php?ngoid=<?php echo $row['ngo_id']; ?>"><?php echo $row['ngo_name']; ?></a>
                                            <ul class="info-items-03">
                                                <li><a href="#"><i class="far fa-envelope"></i><?php echo $row['sector_name']; ?></a></li>
                                                <li><a href="#"><i class="fas fa-map-marker-alt"></i> <?php echo $row['ngo_address']; ?></a></li>
                                            </ul>
                                            <div class="events-btn-wrapper">
                                                <a class="book-btn" href="ngo-details.php?ngoid=<?php echo $row['ngo_id']; ?>">Details</a>
                                                <a href="donation.php" class="free-btn flaticon-heart">Donate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- NGO Block End -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
<?php
include "footer.php";
?>