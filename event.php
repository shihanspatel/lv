<?php
include_once("guest_header.php");
$select="select * from events";
$result=$con->query($select);
?>
<div class="container-fluid pt-3 ">
    <div class="row">
      <?php 
        while($row=$result->fetch_assoc())
        {
      ?>
        <div class="col pb-5">
        <div class="card" style="width:400px">
    <img class="card-img-top" src="<?= $row['e_image']; ?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?= $row['e_name']; ?></h4>
      <hr><br><br>
      <a href="single_event.php?e_id=<?= $row['e_id']; ?>" class="btn btn-dark">View Details</a>
    </div>
  </div>
</div>
<?php 
        }
?>

        </div>
    </div>
