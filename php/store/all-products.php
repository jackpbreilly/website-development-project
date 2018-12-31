<?php
// Show recent blog posts on homepage.
$sql = "SELECT * FROM store ORDER BY productId";
$whatToDoWithData = "products";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>

<div id="all-products" class="jumbotron">
    <h1 class="display-4">Store</h1>
    <p class="lead">Want a T-Shirt with my face on it? Don't want a T-Shirt with face on it? Try a mug!</p>
    <hr class="my-4">
    <div class="row">
        <?php for ($i = 1; $i < count($data); $i++){ ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="?productId=<?php echo $data[$i]['productId']; ?>"><img class="card-img-top" src="<?php echo $data[$i]['img'];?>" alt="<?php echo $data[$i]['name'];?>"></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="?productId=<?php echo $data[$i]['productId']; ?>"><?php echo $data[$i]['name']; ?></a>
                        </h4>
                        <p class="card-text"><?php echo $data[$i]['description']; ?></p>
                    </div>
                    <div class="card-footer">
                        <h5>Price: £<?php echo $data[$i]["price"] ?></h5>
                    </div>
                </div>
            </div>

            <?php
            if($i % 4 === 0) echo "</div><div class='row'>";
        }
        ?>

    </div>
</div>

