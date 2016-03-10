<h1>Login</h1>


<?php //show errors
    if ($loginModel->error != "") {
        echo "<div class=\"alert alert-danger\">" . $loginModel->error . "</div>";
    }


?>

<form method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>

    <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Login">

</form>