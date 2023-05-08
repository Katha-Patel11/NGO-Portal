<?php 
    session_start();
    include "header.php";
    include "connection.php";
?>
<div class="breadcrumb-area">
    <div class="">
        <div class="row">
            <div class="col-lg-12" style="background-color:white">
                <div class="breadcrumb-inner">
                    <div class="icon">
                    <i class="fa fa-check" style="font-size:60px;color:orange"></i>
                    </div>
                    <h2 class="page-title" font-family= "Times,Serif" style="color:black">Thank you!</h2>
                    <ul class="page-list">
                        <li><a href="index.html" style="color:orange; font-size:20px"><b>For your donation</b ></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include "footer.php";
?>