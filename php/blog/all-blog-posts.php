<?php
// Show recent blog posts on homepage.
$sql = "SELECT * FROM blogPosts ORDER BY articleId";
$whatToDoWithData = "blog-posts";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);

?>

<div id="all-blog-posts" class="jumbotron">
    <h1 class="display-4">All Blog Posts</h1>
    <p class="lead">Why not have a look at my blog? This is my most recent update</p>
    <hr class="my-4">
    <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
        <div class="row">
            <div class="col-md-3">
                <a href="?articleId=<?php echo $data[$i]['articleId']; ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $data[1]['img'];?>" alt="<?php echo $data[1]['title'];?>">
                </a>
            </div>
            <div class="col-md-9">
                <h3><?php echo $data[$i]['title'];?></h3>
                <p><?php echo $data[$i]['description'];?></p>
                <a class="btn btn-primary" href="?articleId=<?php echo $data[$i]['articleId']; ?>">Read Full Post</a>
            </div>
        </div>
        <?php
        }
        ?>
</div>

