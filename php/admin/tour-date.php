<?php
adminAddTourDate($conn);
deleteFromDB($conn,"tourDates", "deleteTourDates", "tourId");

// Show recent blog posts on homepage.
$sql = "SELECT * FROM tourDates ORDER BY 'date'";
$whatToDoWithData = "tour-dates";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);
?>

<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Add Tour Date</h5>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="tourLocation" placeholder="Location">
                <input type="text" name="tourPrice" placeholder="Price">
                <input type="text" name="tourTicketQuantity" placeholder="Ticket Quantity">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="date" name="tourDate" placeholder="Date">
                <textarea name="tourDescription" class="form-control" placeholder="Description" rows="10"></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Delete Tour Date</h5>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <select name="deleteTourDate">
                    <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
                        <option value="<?php echo $data[$i]["tourId"]?>"><?php echo $data[$i]["location"]?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
