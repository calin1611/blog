<h1>Signup</h1>


<?php //show messages
    if ($this->message != "") {
      echo "<div class='alert alert-" . $this->message . "</div>";
    }
?>
<!-- <div class="alert "></div> -->

<form method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>

    <div class="form-group">
        <label for="password2">Retype password</label>
        <input type="password" name="password2" class="form-control" id="password2" placeholder="Retype password">
    </div>

    <input type="submit" name="signup" class="btn btn-lg btn-primary" id="signup" value="Signup">

</form>

<script src="<?php echo BASE_URL; ?>public/js/signup.js"></script>
