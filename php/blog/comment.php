<?php
$sql = "SELECT * FROM comments WHERE articleId=".getURLParameters("articleId");
$whatToDoWithData = "comments";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
addComment($conn);
?>

<div id="post-comment" class="jumbotron silver-bg">
    <p class="display-4">Share your opinion!</p>
    <p class="lead">Post a comment.</p>
    <hr class="my-4">
    <form method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="name" class="form-control" name="commentName" placeholder="Your Full Name" <?php if(isset($_COOKIE["Comment"]))echo 'value="'.$_COOKIE["Comment"].'"'?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Your Comment</label>
            <textarea class="form-control" name="comment" rows="10"></textarea>
        </div>
        <button onclick = "setCookie("Comment", <?php echo $_POST["commentName"];?>, 365)" type="submit" class="btn">Post Comment</button>

    </form>
</div>


<?php for ($i = 1; $i < count($data); $i++){ ?>
    <div id="comment" class="jumbotron <?php if($i %2==0){echo "silver-bg";}?>">
        <p class="lead"><?php echo $data[$i]["commentName"]; ?></p>
        <hr class="">
        <p class="lead"><?php echo $data[$i]["comment"] ?> </p>
    </div>
<?php } ?>



<script>

</script>
