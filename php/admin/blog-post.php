<?php
    adminAddBlogPost($conn);
deleteFromDB($conn,"blogPosts", "deleteBlogPost", "articleId");
    $sql = "SELECT * FROM blogPosts ORDER BY articleId";
    $whatToDoWithData = "blog-posts";
    $data = getDataFromDB($sql,$conn,$whatToDoWithData);

?>

<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Add Blog Post</h5>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="articleTitle" placeholder="Title">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="date" name="articleDate" placeholder="Date">
                <textarea name="articleDescription" class="form-control" placeholder="Article Description" rows="5"></textarea>

                <textarea name="article" class="form-control" placeholder="Article" rows="10"></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>



<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Delete Blog Post</h5>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <select name="deleteBlogPost">
                    <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
                    <option value="<?php echo $data[$i]["articleId"]?>"><?php echo $data[$i]["title"]?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

