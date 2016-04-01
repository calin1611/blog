<!DOCTYPE html>
<html>

  <?php include VIEWS . "header_view.php"; ?>

  <body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/blog/">MyBlog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">
            <li <?php if ($title == 'Articles') {echo "class='active'";} ?> ><a href="http://localhost/blog/">Home <span class="sr-only">(current)</span></a></li>
            <li <?php if ($title == 'Contact') {echo "class='active'";} ?> ><a href="http://localhost/blog/contact">Contact</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <?php if (isset($_SESSION['logged'])) {?>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Hello, <?php echo $_SESSION['logged']; ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                if ($_SESSION['logged']) {
                  if ((isset($_SESSION['admin'])) && ($_SESSION['admin'] == true)) {
                    echo '<li ';
                    if ($title == 'Articles - AdminZone') {echo "class='active'";}
                    echo '><a href="http://localhost/blog/admin/articles">Articles</a></li>';

                    echo '<li ';
                    if ($title == 'Users - AdminZone') {echo "class='active'";}
                    echo '><a href="http://localhost/blog/admin/users">Users</a></li>';
                  }
                  echo "<li><a href='http://localhost/blog/post'>Post an article</a></li>";
                  echo "<li role='separator' class='divider'></li>";
                  echo "<li><a href='http://localhost/blog/login/logout'>Log out</a></li>";
                }
                ?>
              </ul>
            </div>
            <?php } else { ?>
              <a href='http://localhost/blog/login'><button type='button' class='btn btn-info'>Log in / Sign up</button></a>
            <?php  } ?>

          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">

      <?php
        include $pageContent;

        // var_dump($_SERVER);
        // echo session_id();
      ?>

    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo BASE_URL; ?>public/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/pagination.js"></script>

    <?php
      $mystring = $_SERVER['PATH_INFO'];
      $findme   = 'admin';
      $pos = strpos($mystring, $findme);
      if ($pos != false) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/app.js"></script>
    <?php } ?>

    <?php if ($title == 'Signup') { ?>
      <script src="<?php echo BASE_URL; ?>public/js/signup.js"></script>
    <?php } ?>
  </body>
</html>
