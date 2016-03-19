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
            <!-- <li><a href="#">Link</a></li>
            <button type="button" class="btn btn-default navbar-btn">Sign in</button> -->
            <?php
            if ($_SESSION['logged']) {
              if ($_SESSION['logged'] == "admin") {
                echo '<li ';
                if ($title == 'Admin') {echo "class='active'";}
                echo '><a href="http://localhost/blog/admin">Admin Page</a></li>';
              }
              echo "<a href='http://localhost/blog/login/logout'><button type='button' class='btn btn-danger'>Log out</button></a>";
            } else {
              echo "<a href='http://localhost/blog/login'><button type='button' class='btn btn-info'>Log in</button></a>";
            }
            ?>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">

      <?php
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
