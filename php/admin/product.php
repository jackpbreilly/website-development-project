<?php
adminAddProduct($conn);
deleteFromDB($conn,"store", "deleteProduct", "productId");

$sql = "SELECT * FROM store ORDER BY productId";
$whatToDoWithData = "products";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);

?>

<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Add Product</h5>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="productName" placeholder="name">
                <input type="text" name="productPrice" placeholder="Price">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <textarea name="productDescription" class="form-control" placeholder="Description" rows="10"></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Delete Product</h5>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <select name="deleteProduct">
                    <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
                        <option value="<?php echo $data[$i]["productId"]?>"><?php echo $data[$i]["name"]?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


