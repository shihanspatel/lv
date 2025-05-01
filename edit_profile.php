<?php 
include_once('guest_header.php');
$email=$_SESSION['email'];
$select="select * from users where u_email='$email'";
$result=$con->query($select);
$row=$result->fetch_assoc();
$u_id=$row['u_id'];
?>
<div class="container mt-3 w-50">
  <h2>Edit Profile</h2><hr><br><br>
  <form method="post" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" value="<?= $row['u_name']; ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= $row['u_email']; ?>">
    </div>
    <img src="images/<?php 
    if(empty($row['u_profile']))
    {
      echo "profile.png";
    }
    else
    {
      echo $row['u_profile'];
    }
    ?>
    " height="100px" width="100px">
    <div class="mb-3 mt-3">
      <label for="profile">Select your Profile Photo:</label>
      <input type="file" class="form-control" id="profile" name="profile">
    </div>
    <button type="submit" class="contact-btn" name="update">Update</button>
    <a class="contact-btn" href="change_password.php">Change Password</a>
  </form>
</div>
<?php 
if(isset($_POST['update']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $photo=$_FILES['profile']['name'];
  if(empty($photo))
  {
    $update="update users set u_name='$username',u_email='$email' where u_id=$u_id";
    $con->query($update);
  }
  else
  {
    $update="update users set u_name='$username',u_email='$email',u_profile='$photo' where u_id=$u_id";
    $con->query($update);
  } 
    ?>
    <script>
       window.location.href="profile.php";
    </script>
    <?php
}
?>