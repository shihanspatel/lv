<?php 
include_once('guest_header.php');
?>
<div class="container mt-3">
  <h2>Contact Us</h2><hr><br><br>
  <form method="post">
  <div class="mb-3 mt-3">
      <label for="full_name">Full Name:</label>
      <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Subject" name="subject">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Phone" name="phone">
    </div>
  </div>
    <div class="mb-3">
    <label for="message">Message:</label>
    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Enter Message"></textarea>
    </div>   
    <button type="submit" class="contact-btn" name="send">Send your Message</button>
    <button type="submit" class="contact-btn">Reset</button>
  </form>
</div>
<?php
if(isset($_POST['send']))
{
  $name=$_POST['full_name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $phone=$_POST['phone'];
  $message=$_POST['message'];
  $insert="insert into contact (c_name,c_email,c_subject,c_phone,c_message) values ('$name','$email','$subject','$phone','$message')";
  $con->query($insert);
} 
?>

