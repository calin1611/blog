<?php
    session_start();
    var_dump($_POST);
//    $loginCredentials = array("username" => "admin", "password" => "123");
//    $error = "";
//
//    if (!empty($_POST["username"]) && (!empty($_POST["password"]))) {
//        $username = $_POST["username"];
//        $password = $_POST["password"];
//        if (($username == $loginCredentials["username"]) && ($password == $loginCredentials["password"])) {
//            $_SESSION["logged"] = "admin";
//        } else {
//            $error .= "Wrong username or password.<br>";
//        }
//    } else {
//        $error .= "Please fill the login form.<br>";
//    }
    echo "<br>user: " . $username;
    echo "<br>pass: " . $password;
    echo "<br>";
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../public/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <h1>Login</h1>
<!--    <div class="alert alert-danger">-->
        <?php
            if ($error != "") {
                echo "<div class=\"alert alert-danger\">" . $error . "</div>";
            }
        ?>
<!--    </div>-->
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
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>