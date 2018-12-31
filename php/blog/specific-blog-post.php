<?php
$sql = "SELECT * FROM blogPosts WHERE articleId=".getURLParameters("articleId");

$whatToDoWithData = "blog-posts";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);



?>

<div id="post" class="jumbotron">
    <h1 class="display-4"><?php  echo $data[1]['title'];?></h1>
    <p class="lead"><?php  echo $data[1]['date'];?></p>
    <hr class="my-4">
    <div class="row">
        <div class="col-md-3">
            <img class="img-fluid" src="<?php echo $data[1]['img']; ?>" alt="<?php  echo $data[1]['title'];?>">
        </div>

        <div class="col-md-9">

            <?php echo $data[1]['article']; ?> <br>
        </div>
    </div>
</div>

