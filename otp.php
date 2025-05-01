<?php
include_once("guest_header.php");
$email=$_REQUEST['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');
?>
<div class="container-fluid w-50 ">
    <div class="row d-flex align-center">
        <div class="col">
            <h2>OTP</h2>
            <form method="post">
                <div class="form-group">
                    <label for="otp">OTP:</label>
                    <input type="number" class="form-control" id="otp" name="otp">
                </div>
                <button type="submit" class="btn btn-primary" name="match_otp">Match OTP</button>
                <button type="submit" class="btn btn-primary" name="re-send_otp">Re-Send OTP</button>
            </form>
        </div>
    </div>
</div>
<?php 

if(isset($_POST['match_otp']))
{
    $otp=$_POST['otp'];
    $select="select * from otp where u_email='$email'";
    $result=$con->query($select);
    $row=$result->fetch_assoc();
    date_default_timezone_set('Asia/Kolkata');
    $current_time = date('Y-m-d H:i:s');
    $otp_expire_time=date('Y-m-d H:i:s',strtotime($row['otp_create_time'])+60);
    if($otp_expire_time>=$current_time)
    {
        if($otp==$row['otp'])
        {
            ?>
            <script>
                window.location.href="new_password.php?email=<?= $email ?>";
            </script>
            <?php
        }
        else{echo "not match";}
    }
    else{echo "otp is expire Resend Otp";}
}
if(isset($_POST['re-send_otp']))
{
    $delete="delete from otp where u_email='$email'";
    $con->query($delete);
    $otp=rand(1000,9999);
    $insert="insert into otp values ('$email',$otp,CURRENT_TIMESTAMP)";
    $con->query($insert);
    $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'sender_id@rku.ac.in'; // SMTP username
            $mail->Password = '********'; // SMTP password
            $mail->SMTPSecure = 'ssl'; 
            $mail->Port = 465; 
            $mail->setFrom('sender_id@rku.ac.in', 'sender name'); // Sender's email address and name
            $mail->addAddress($email,$username); // Recipient's email address and name
            $mail->isHTML(true);
            $mail->Subject = 'Forgot Password';
            $mail->Body    = $otp;
            $mail->send();
        }
        catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
}
?>