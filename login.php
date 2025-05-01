<?php
include_once("guest_header.php");
?>
<div class="container-fluid w-50 ">
    <div class="row d-flex align-center">
        <div class="col">
            <h2>Login Form</h2>
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
                <div class="form-group form-check">
                        <a href="forget_password.php">Forget Password</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $select="select * from users where u_email='$email'";
        $result=$con->query($select);
        if($result->num_rows>=1)
        {
            $row=$result->fetch_assoc();
            if(password_verify($password,$row['u_password']))
            {
                // session_start();
                $_SESSION['username']=$row['u_name'];
                $_SESSION['email']=$row['u_email'];
                ?>
                    <script>
                        window.location.href="index.php";
                    </script>
                <?php
            }
            else{echo "incorrect password";}
        }
        else{echo "mail id is not registerd";}
    }
?>