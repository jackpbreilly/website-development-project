<?php addFanMail($conn);?>

<div id="fan-mail" class="jumbotron">
    <h1 class="display-4">Mail Mariah</h1>
    <p class="lead">Send a letter! I'll try to reply as quick as I can</p>
    <hr class="my-4">

    <div class="row">
        <div class="col-md-6 col-sm-9">
            <form method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="name" class="form-control" name="name" placeholder="Your Full Name" required>
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Your Email Address" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Your Letter</label>
                    <textarea class="form-control" name="letter" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn">Post Comment</button>

            </form>
        </div>
        <div class="col-md-6 ">
            <div id="fan-mail" class="jumbotron">
                <h1 class="display-4">Social Media</h1>
                <p class="lead">Why not check out my social media? I post on these most often.</p>
                <hr class="my-4">
                <div class="row">
                    <div class="col-md-1 col-sm-1"><a href="facebook.com"><i class="social fab fa-facebook-square"></i></a></div>
                    <div class="col-md-1 col-sm-1"><a href="twitter.com"><i class="social fab fa-twitter-square"></i></a></div>
                    <div class="col-md-1 col-sm-1"><a href="youtube.com"><i class="social fab fa-youtube"></i></a></div>
                    <div class="col-md-1 col-sm-1"><a href="instagram.com"><i class="social fab fa-instagram"></i></a></div>
                    <div class="col-md-1 col-sm-1"><a href="instagram.com"><i class="social fab fa-snapchat"></i></a></div>
                </div>
                <hr class="my-4">
                <p>&copy; Mariah Carey 2018</p>
                <a href="#" class="btn btn-lg btn-primary" onclick="loadTOC()" data-toggle="modal" data-target="#largeModalTC">Terms and Conditions</a>
                <a href="#" class="btn btn-lg btn-primary"  data-toggle="modal" id="ppbtn"data-target="#largeModalPP"">Privacy Policy</a>

            </div>
            </div>

    </div>
</div>
<?php
include("php/modals/modalTC.php");
include("php/modals/modalPP.php");
?>
<script src="js/toc.js"></script>
<script src="js/privacyPolicy.js"></script>

