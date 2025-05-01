<?php 
include_once('guest_header.php');
//contact.php
$select="select * from about";
$result=$con->query($select);
$row=$result->fetch_assoc();
?>
<div class="container-fluid p-3 ">
<div class="row p-3 ">
<div class="col-4 border border-danger">
            ABOUT RKU <br><hr ><br>
            <br>
        <nav class="navbar about_nav">
        
  <div class="container-fluid d-flex justify-content-center text-center">
    <ul class="navbar-nav m-1 w-100" id="about_nav" style="background-color:darkblue">
      <li class="nav-item bg-danger ">
        <a class="nav-link" href="#">About RKU</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Vision & Mission</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">President's Message</a>
      </li>
    </ul>
  </div>
</nav>
        </div>
    <div class="col-8">
        <h4>ABOUT RK UNIVERSITY</h4>
        <hr><br><br>
        <p>
            <?= $row['p1']; ?><br><br>
            <?= $row['p2']; ?><br><br>
            <?= $row['p3']; ?><br><br>
            <?= $row['p4']; ?>
        </p>
    </div>
</div>   
</div>