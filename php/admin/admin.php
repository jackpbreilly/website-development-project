<?php
adminAddNewAdmin($conn);
deleteFromDB($conn,"admin" ,"deleteAdmin", "adminId");
adminChangePass($conn);

// Show recent blog posts on homepage.
$sql = "SELECT * FROM admin ORDER BY adminId";
$whatToDoWithData = "admins";
$data = getDataFromDB($sql,$conn,$whatToDoWithData);

?>

<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Add New Admin</h5>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <input type="text" name="adminUsername" placeholder="Username">
                <input type="password" name="adminPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="card my-4">
    <h5 class="card-header">Delete Admin</h5>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <select name="deleteAdmin">
                    <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
                        <option value="<?php echo $data[$i]["adminId"]?>"><?php echo $data[$i]["username"]?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Edit Admin Password</h5>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <select name="editAdmin">
                    <?php for ($i = 1; $i < count($data); $i++){ ?> <!-- Display all close to date tour dates -->
                        <option value="<?php echo $data[$i]["adminId"]?>"><?php echo $data[$i]["username"]?></option>
                    <?php } ?>
                </select>
                <input type="password" name="newAdminPassword" placeholder="Password">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>



