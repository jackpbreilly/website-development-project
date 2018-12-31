    <?php
    // Show recent blog posts on homepage.
    $sql = "SELECT * FROM blogPosts ORDER BY articleId DESC LIMIT 1";
    $whatToDoWithData = "blog-posts";
    $data = getDataFromDB($sql,$conn,$whatToDoWithData);

?>

<div id="recent-blog-posts" class="jumbotron">
    <h1 class="display-4">Recent Blog Post</h1>
    <p class="lead">Why not have a look at my blog? This is my most recent update.</p>
    <hr class="my-4">
    <div class="row">
        <div class="col-md-3">
            <a href="?articleId=<?php echo $data[1]['articleId']; ?>">
                <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $data[1]['img'];?>" alt="<?php echo $data[1]['title'];?>">
            </a>
        </div>
        <div class="col-md-9">
            <h3><?php echo $data[1]['title'];?></h3>
            <p><?php echo $data[1]['description'];?></p>
            <a class="btn btn-primary" href="?articleId=<?php echo $data[1]['articleId']; ?>">Read Full Post</a>
        </div>
    </div>
    <p class="lead">
        <a href="?allBlogPosts">
            <button class="btn btn-secondary float-right">All Blog Posts</button>
        </a>
    </p>
</div>










