<?php
// Show recent blog posts on homepage.
$sql = "SELECT * FROM tourDates WHERE tourId=".getURLParameters("tourId");
$whatToDoWithData = "tour-dates";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>
<div id="date" class="jumbotron silver-bg">

      <div class="row">
        <div class="col-md-3">
            <img class="img-fluid" src="<?php echo $data[1]['img']; ?>" alt="<?php  echo $data[1]['location'];?>">
        </div>

        <div class="col-md-9">
            <h1 class="display-4"><?php  echo $data[1]['location'];?></h1>
            <p class="lead">"All I Want for Christmas Is You" tour.</p>
            <hr class="my-4">
            <p class="lead"><?php echo $data[1]['description']; ?> </p>
            <p class="lead">Date: <?php echo $data[1]['date']; ?></p>
            <p class="lead">Tickets Left: <?php echo $data[1]['ticketQuantity']; ?></p>
        </div>
    </div>
</div>