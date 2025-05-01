<?php
include_once("guest_header.php");
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
            <h2>Forget Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <button type="submit" class="btn btn-primary" name="send_otp">Send OTP</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['send_otp']))
{
    $email=$_POST['email'];
    $select="select * from users where u_email='$email'";
    $result=$con->query($select);
    if($result->num_rows>=1)
    {
        $row=$result->fetch_assoc();
        $username=$row['u_name'];
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
            ?>
            <script>
                window.location.href="otp.php?email=<?=$email?>";
            </script>
            <?php
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    }
    else{echo "this mail id is not register yet";}
}
?>