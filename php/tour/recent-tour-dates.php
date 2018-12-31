<?php
$sql = "SELECT * FROM tourDates ORDER BY 'date' ASC LIMIT 4";
$whatToDoWithData = "tour-dates";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>

<div id="close-to-date-tour" class="jumbotron silver-bg">
    <h1 class="display-4">Tour Dates</h1>
    <p class="lead">I am back to spread some Christmas joy with my "All I Want for Christmas Is You" tour.</p>
    <hr class="my-4">
    <div class="row">
        <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
            <div id="tour<?php echo $data[$i]['tourId'];?>" class="hoverEffect col-md-3 col-sm-6 mb-4 el">
                <a href="?tourId=<?php echo $data[$i]['tourId']; ?>">
                    <img class="img-fluid image" src="<?php echo $data[$i]['img'];?>" alt="<?php echo $data[$i]['location'];?>">
                        <div class="middle">
                            <div id="tour<?php echo $data[$i]['tourId'];?>text" class="text"><?php echo $data[$i]['location']?></div>
                        </div>
                </a>
            </div>
        <?php } ?>

    </div>
    <a href="?allTourDates"><button  class="btn btn-secondary float-right">All Tour Dates</button>
    </a>
</div>

<script type="text/javascript" src="js/DOM-tour-dates.js"></script>

