<?php

    function  tourDates($row){
        $tourArr['tourId'] = $row["tourId"];
        $tourArr['location'] = $row["location"];
        $tourArr['description'] = $row["description"];
        $tourArr['date'] = $row["date"];
        $tourArr['price'] = $row["price"];
        $tourArr['img'] = $row["img"];
        $tourArr['ticketQuantity'] = $row["ticketQuantity"];

        return $tourArr;
    };
    function  admins($row){
        $adminArr['adminId'] = $row["adminId"];
        $adminArr['username'] = $row["username"];
        return $adminArr;
    };

    function comments($row){
        $displayCommentsArr['commentName'] = $row['commentName'];
        $displayCommentsArr['comment'] = $row['comment'];
        $displayCommentsArr['votes'] = $row['votes'];
        return $displayCommentsArr;
    };

    function blogPosts($row){
        $recentBlogPostsArr['img'] = $row['img'];
        $recentBlogPostsArr['date'] = $row['date'];
        $recentBlogPostsArr['description'] = $row['description'];
        $recentBlogPostsArr['article'] = $row['article'];
        $recentBlogPostsArr['title'] = $row['title'];
        $recentBlogPostsArr['articleId'] = $row['articleId'];
        return $recentBlogPostsArr;
    };

    function products($row){
        $recentStoreArr['name'] = $row['name'];
        $recentStoreArr['productId'] = $row['productId'];
        $recentStoreArr['img'] = $row['img'];
        $recentStoreArr['price'] = $row['price'];
        $recentStoreArr['description'] = $row['description'];

        return $recentStoreArr;
    };



    function getDataFromDB($sql, $conn, $whatToDoWithData)
    {

        $data = $conn->query($sql)->fetchAll();
        $arrOfData[][] = NULL;

        foreach ($data as $row) {
            switch ($whatToDoWithData) {
                case "tour-dates":
                    $tempArr = tourDates($row);
                    array_push($arrOfData, $tempArr);
                    break;
                case "blog-posts":
                    $tempArr= blogPosts($row);
                    array_push($arrOfData, $tempArr);
                    break;
                case "products":
                    $tempArr= products($row);
                    array_push($arrOfData, $tempArr);
                    break;
                case "comments":
                    $tempArr=  comments($row);
                    array_push($arrOfData, $tempArr);
                    break;
                case "admins":
                    $tempArr=  admins($row);
                    array_push($arrOfData, $tempArr);
                    break;
            }
        }
        return $arrOfData;
    };

    function getURLParameters($name){
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
        else{
            return NULL;
        }
    };
    function logoutAdmin(){
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: index.php?admin");
        exit;
    }

    function preventFormDuplication($thingToUnset, $urlId){
        $_SESSION[$thingToUnset] = $_POST;
        unset($_POST);
        header("Location: index.php?".$urlId."=".getURLParameters($urlId));
        exit;
    }

    function addComment($conn){
        if(isset($_POST["commentName"]) AND isset($_POST["comment"])){
            $commentName = $_POST["commentName"];
            setcookie("Comment", $commentName, time() + (86400 * 30)); // 86400 = 1 day
            $comment = $_POST["comment"];
            $articleId = getURLParameters("articleId");

            $sql = $conn->prepare("INSERT INTO comments (commentId, commentName, comment, articleId) VALUES (NULL, ?, ?, ?);");
            $sql->bindParam(1, $commentName);
            $sql->bindParam(2, $comment);
            $sql->bindParam(3, $articleId);
            $sql->execute();

            preventFormDuplication("comment", "articleId");
        }
    };
function addFanMail($conn){
    if(isset($_POST["name"]) AND isset($_POST["email"])AND isset($_POST["letter"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["letter"];

        $sql = $conn->prepare("INSERT INTO fanMail (email, 'name', message) VALUES (?, ?, ?);");
        $sql->bindParam(1, $name);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $message);
        $sql->execute();
    }
};

function addVote($conn){
    if(isset($_REQUEST['vote'])) {
        $vote = $_REQUEST['vote'];

        $sql = $conn->prepare("UPDATE comments SET votes =?");
        $sql->bindParam(1, $vote);
        $sql->execute();
    }
};
function deleteFromDB($conn,$table, $name, $urlId){
        if(isset($_POST[$name])){
            $idToDelete = $_POST[$name];
            $sql = "DELETE FROM `".$table."` WHERE `".$urlId."` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idToDelete);
            $stmt->execute();

            preventFormDuplication($name, "admin");
        }
    };


function adminAddBlogPost($conn){
    if(isset($_POST["articleTitle"])){
        $articleTitle = $_POST["articleTitle"];
        $articleDate = $_POST["articleDate"];
        $articleDescription = $_POST["articleDescription"];
        $article = $_POST["article"];
        $articleImg = imgUpload("php/blog/blog_img");

        $sql = "INSERT INTO `blogPosts` (`articleId`, `title`, `article`, `img`, `description`, `date`) VALUES (NULL, ?, ?,?,?,?); ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $articleTitle);
        $stmt->bindParam(2, $article);
        $stmt->bindParam(3, $articleImg);
        $stmt->bindParam(4, $articleDescription);
        $stmt->bindParam(5, $articleDate);

        $stmt->execute();
        preventFormDuplication("articleTitle", "admin");
    }
};
function adminChangePass($conn){
    if(isset($_POST["newAdminPassword"])){
        $adminNewPassword = $_POST["newAdminPassword"];
        $adminId = $_POST["editAdmin"];
        $adminHashedNewPass = password_hash($adminNewPassword, PASSWORD_BCRYPT);

        $sql = "UPDATE admin SET password = ? WHERE adminId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $adminHashedNewPass);
        $stmt->bindParam(2, $adminId);

        $stmt->execute();
        //preventFormDuplication("newAdminPassword", "admin");
    }
};



// ADD MORE CHECKS!!1
function adminAddNewAdmin($conn){
    if(isset($_POST["adminUsername"]) AND isset($_POST["adminPassword"])){
        $adminUsername = $_POST["adminUsername"];
        $adminPassword = $_POST["adminPassword"];
        $hashedAdminPassword = password_hash($adminPassword, PASSWORD_BCRYPT);
        $sql ="INSERT INTO `admin` (`adminId`, `username`, `password`) VALUES (NULL, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $adminUsername);
        $stmt->bindParam(2, $hashedAdminPassword);
        $stmt->execute();

        preventFormDuplication("adminUsername", "admin");
    }
};

function adminAddProduct($conn){
    if(isset($_POST["productName"])){
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productDescription = $_POST["productDescription"];
        $productImg = imgUpload("php/store/store_img");

        $sql = "INSERT INTO `store` (`productId`, `name`, `price`, `img`, `description`) VALUES (NULL, ?, ?,?,?); ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $productName);
        $stmt->bindParam(2, $productPrice);
        $stmt->bindParam(3, $productImg);
        $stmt->bindParam(4, $productDescription);

        $stmt->execute();
        //preventFormDuplication("productName", "admin");
    }
};
function adminAddTourDate($conn){
    if(isset($_POST["tourLocation"])){
        $tourLocation = $_POST["tourLocation"];
        $tourDescription = $_POST["tourDescription"];
        $tourDate = $_POST["tourDate"];
        $tourPrice = $_POST["tourPrice"];
        $tourTicketQuantity = $_POST["tourTicketQuantity"];
        $tourImg = imgUpload("php/tour/tour_img");

        $sql = "INSERT INTO `tourDates` (`tourId`, `location`, `description`, `date`, `price`, `img`, `ticketQuantity`) VALUES (NULL, ?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $tourLocation);
        $stmt->bindParam(2, $tourDescription);
        $stmt->bindParam(3, $tourDate);
        $stmt->bindParam(4, $tourPrice);
        $stmt->bindParam(5, $tourImg);
        $stmt->bindParam(6, $tourTicketQuantity);
        $stmt->execute();

        preventFormDuplication("tourLocation", "admin");
    }
};
    function signIn($conn){
        if(isset($_POST['username']) AND isset($_POST['password'])){
            $formUsername = $_POST['username'];
            $formPassword = $_POST['password'];

            // getting username from DB
            $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
            $stmt->bindParam(1, $formUsername);
            $stmt->execute();
            $row = $stmt->fetch();

            // Checking to see if password matches DB.
            if(password_verify($formPassword,$row["password"])) {
                session_start();
                $_SESSION["adminId"] = $row["adminId"];
                header("Location: index.php?admin");
            }
        }
        //preventFormDuplication("username", "admin");
    };

    function imgUpload($path){
        $target_dir = $path."/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return $target_file;
    };
?>