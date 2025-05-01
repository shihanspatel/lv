<?php
include_once("guest_header.php");
$email=$_REQUEST['email'];
?>
<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Change Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username">New Password:</label>
                    <input type="text" class="form-control" id="new_passoword" name="new_passoword" placeholder="Enter New Password" >
                </div>
                <div class="form-group">
                    <label for="username">Confirm Password:</label>
                    <input type="text" class="form-control" id="confirm_passoword" name="confirm_passoword" placeholder="Enter Confirm Password" >
                </div>
                <button type="submit" class="btn btn-primary" name="change_passowrd">Change Password</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['change_passowrd']))
{
    $new_passoword=$_POST['new_passoword'];
    $confirm_passoword=$_POST['confirm_passoword'];
        if($new_passoword==$confirm_passoword)
        {
            $new_passoword=password_hash($new_passoword,PASSWORD_DEFAULT);
            $update="update users set u_password='$new_passoword' where u_email='$email'";
            $con->query($update);
        }
        else{echo "both password doesn't match";}
    }
?>