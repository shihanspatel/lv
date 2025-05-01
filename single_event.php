
<?php 
include_once('guest_header.php');
$e_id=$_REQUEST['e_id'];
$select="select * from events where e_id=$e_id";
$result=$con->query($select);
$row=$result->fetch_assoc();
?>
<div id="fullimage" onmousemove="showzoomoutbutton()" onmouseleave="hidezoomoutbutton()">
    <img src="" id="full_image">
    <button id="zoomout" onclick="back()">-</button>
</div>
<div class="container-fluid" id="main">
<h4 class="card-title"><?= $row['e_name']; ?></h4>
<h6 class="card-title"><?= $row['e_time']; ?></h6><hr><br><br>
<p><?= $row['e_detail']; ?></p>
<div class="row">
    <div class="col">
    <div class="image-container" onmousemove="showbutton()" onmouseleave="hidebutton()">
    <img src="<?= $row['e_img1']; ?>">
    <button id="zoomin" onclick="fullimage('<?= $row['e_img1']; ?>')">+</button>
</div>
    </div>
    <div class="col">
    <div class="image-container" onmousemove="showbutton2()" onmouseleave="hidebutton2()">
    <img src="<?= $row['e_img2']; ?>">
    <button id="zoomin2" onclick="fullimage('<?= $row['e_img2']; ?>')">+</button>
</div>
    </div>
    <div class="col">
    <div class="image-container" onmousemove="showbutton3()" onmouseleave="hidebutton3()">
    <img src="<?= $row['e_img3']; ?>">
    <button id="zoomin3" onclick="fullimage('<?= $row['e_img3']; ?>')">+</button>
</div>
    </div>
</div>
</div>
