<h2>Menu</h2>
<ul>
  <li><a href="http://localhost/blog">Home</a></li>
  <li><a href="http://localhost/blog/contact">Contact</a></li>

  <?php
    if ($_SESSION['logged']) {
      echo "<a href='http://localhost/blog/login/logout'><button type='button' class='btn btn-danger'>Log out</button></a>";
      if ($_SESSION['logged'] == "admin") {
        echo '<li><a href="http://localhost/blog/admin">Admin Page</a></li>';
      }
    } else {
      echo "<li><a href='http://localhost/blog/login'><button type='button' class='btn btn-info'>Log in</button></a></li>";
    }
  ?>

</ul>
