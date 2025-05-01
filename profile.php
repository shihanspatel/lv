<?php 
    include_once('guest_header.php');
    $email=$_SESSION['email'];
    $select="select * from users where u_email='$email'";
    $result=$con->query($select);
    $row=$result->fetch_assoc();
?>
<div class="container-fluid d-flex justify-content-center text-center">
    

<div class="card h-auto" style="width:400px">
            <img class="card-img-top" src="images/<?php 
    if(empty($row['u_profile']))
    {
      echo "profile.png";
    }
    else
    {
      echo $row['u_profile'];
    }
    ?>" alt="Card image" style="width:100%">
            <div class="card-body">
                <h4 class="card-title"><?= $row['u_name']; ?></h4>
                <h6 class="card-title"><?= $row['u_email']; ?></h6>
                <a href="edit_profile.php"  class="btn btn-dark">Edit Profile</a>
            </div>
        </div>
        </div>