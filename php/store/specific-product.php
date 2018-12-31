<?php
// Show recent blog posts on homepage.
$sql = "SELECT * FROM store WHERE productId=".getURLParameters("productId");
$whatToDoWithData = "products";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>
<div id="product" class="jumbotron">
    <div id="product" class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $data[1]['img'];?>" alt="<?php echo $data[1]['name'];?>">
            </div>
            <div class="col-md-9">
                <p class="display-4"><?php echo $data[1]["name"]; ?></p>
                <hr class="my-4">
                <p class="lead"> £<?php echo $data[1]["price"]; ?></p>
                <p class="lead"><?php echo $data[1]["description"]; ?></p>

            </div>
        </div>

    </div>
</div>
