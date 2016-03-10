<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title; ?></title>
        <!--Bootstrap-->
            <link href="<?php echo BASE_URL; ?>public/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
            <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        <!--END.Bootstrap-->

        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.CSS; ?>style.css">
    </head>

    <body>

        <div class="container">
            <h2>Menu</h2>
            <ul>
                <li><a href="http://localhost/blog">Home</a></li>
                <li><a href="http://localhost/blog/contact">Contact</a></li>
                <li><a href="http://localhost/blog/login">Login</a></li>
            </ul>

            <?php
                // echo "Session "; var_dump($_SESSION);
                include $pageContent;
            ?>

        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo BASE_URL; ?>public/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/pagination.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/app.js"></script>
    </body>
</html>
