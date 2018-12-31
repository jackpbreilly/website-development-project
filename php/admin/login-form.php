<?php
    signIn($conn)
?>
<div id="login" class="text-center my-4">
    <form class="form-signin" action="" method="post" >
        <label class="sr-only">Email address</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label class="sr-only">Password</label>
        <input type="password" id="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <button class="btn btn-lg btn-primary" id="showPassword">Show Password</button>

    </div>

</div>

<script src="js/password-show.js">
</script>
