<?php
include 'header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'connection.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $sql = "select * from tbl_user where user_email='$email'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
  if ($count > 0) {
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    //Load Composer's autoloader
    
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'leviackreman847@gmail.com';                     //SMTP username
      $mail->Password   = 'ayiwadjwtsgcnkrc';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('leviackreman847@gmail.com', 'PhpMailer');
      $mail->addAddress($email, $email);     //Add a recipient




      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Forget Password';
      $mail->Body    = "Hi!! Your Password is {$row['user_password']} ";
      $mail->AltBody = "Hi!! Your Password is {$row['user_password']} ";

      $mail->send();
      echo "<script>alert('Your password has been sent on the given email')</script>";
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    echo "<script>alert('Given email is not registered.')</script>";
  }
}
?>
<div class="contact-changepass-area padding-bottom-100 padding-top-100">
  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6">
        <div class="content-area-wrapper bg-image" style="background-image: url('assets/img/forgetpass.jpg');">
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 offset-lx-1">
        <div class="row">
          <div class="col-lg-10 col-sm-11 col-11">
            <div class="section-title padding-top-25 margin-bottom-55">
              <h2 class="title">Forgot <span>Password</span></h2>
            </div>
          </div>
        </div>
        <div class="contact-form style-01">
          <form method="post" class="contact-page-form style-01" novalidate="novalidate">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password"><b>Enter your E-Mail</b></label>
                  <input type="email" name="email" placeholder="Enter email" class="form-control" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="btn-wrapper">
                  <input class="boxed-btn reverse-color" type="submit" name="submit" value="Reset">
                </div>
              </div>
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