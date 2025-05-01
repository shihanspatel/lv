<?php
include_once("guest_header.php"); 
?>
<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Register Form</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter email" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Re-enter password" name="confirm_password">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $insert="insert into users (u_name,u_email,u_password) values ('$username','$email','$password')";
    $con->query($insert);
    ?>
    <script>
        window.location.href="login.php";
    </script>
    <?php
}