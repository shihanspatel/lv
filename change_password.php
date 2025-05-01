<?php 
include_once('guest_header.php');
$email=$_SESSION['email'];
$select="select * from users where u_email='$email'";
$result=$con->query($select);
$row=$result->fetch_assoc();
$u_id=$row['u_id'];
?>
<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Change Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username">Old Password:</label>
                    <input type="text" class="form-control" id="old_passoword" name="old_passoword" placeholder="Enter Old Password" >
                </div>
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
    $old_passoword=$_POST['old_passoword'];
    $new_passoword=$_POST['new_passoword'];
    $confirm_passoword=$_POST['confirm_passoword'];
    if(password_verify($old_passoword,$row['u_password']))
    {
        if($new_passoword==$confirm_passoword)
        {
            $new_passoword=password_hash($new_passoword,PASSWORD_DEFAULT);
            $update="update users set u_password='$new_passoword' where u_id=$u_id";
            $con->query($update);
            ?>
            <script>
                window.location.href="profile.php";
            </script>
            <?php 
        }
        else{echo "both password doesn't match";}
    }
    else{echo  "password is not match with old password";}
}
?>