<?php
// Show recent blog posts on homepage.
$sql = "SELECT * FROM tourDates ORDER BY 'date'";
$whatToDoWithData = "tour-dates";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>
<div id="all-tour-dates" class="jumbotron">
    <h1 class="display-4">Tour Dates</h1>
    <p class="lead">I am back to spread some Christmas joy with my "All I Want for Christmas Is You" tour.</p>
    <hr class="my-4">
    <div class="row">
        <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
            <div class="hoverEffect col-md-3 col-sm-6 mb-4">
                <a href="?tourId=<?php echo $data[$i]['tourId']; ?>">
                    <img class="img-fluid image" src="<?php echo $data[$i]['img'];?>" alt="<?php echo $data[$i]['location'];?>">
                    <div class="middle">
                        <div class="text"><?php echo $data[$i]['location'] ?></div>
                    </div>
                </a>
            </div>

            <?php
            if($i % 4 === 0) echo "</div><div class='row'>";
        }
        ?>

    </div>
</div>

