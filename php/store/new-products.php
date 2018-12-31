<?php
    // Show recent blog posts on homepage.
    $sql = "SELECT * FROM store ORDER BY productId DESC LIMIT 4";
    $whatToDoWithData = "products";
    $data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>

<div id="recent-added-products" class="jumbotron silver-bg">
    <h1 class="display-4">Store</h1>
    <p class="lead">Want a T-Shirt with my face on it? Don't want a T-Shirt with face on it? Try a mug!</p>
    <hr class="my-4">
    <div class="row">
        <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
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
        }
        ?>

    </div>
    <p class="lead">
        <a href="?allProducts">
        <button class="btn btn-secondary float-right">More Products</button>
        </a>
    </p>
</div>

