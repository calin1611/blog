<h1><?php echo $articleTitle; ?></h1>
<p>
  <?php echo $articleBody; ?>
</p>

<p>
  Published on:
  <?php echo $articleCreationDate; ?>
  
  By <?php echo $articleAuthor; ?>
</p>

<h3>Comments:</h3>
  <?php
  // var_dump($comments);
    foreach ($comments as $key => $value) {
      echo "<div class='comment-wrapper'>";

      echo"<h5>".$value["user"]." says: </h5>";
      echo"<h4>".$value["title"]."</h4>";
      echo "<p>". $value["body"] . "</p>";
      echo "<p>Date: " . $value["creation_date"] . "</p>";

      echo "</div>";
    }
  ?>

  <div class="comment-form">
    <form action="http://localhost/blog/article/postComment?id=<?php echo $_GET['id']; ?>" method="post">
      <input type="text" class="form-control" name="name" placeholder="Your name..."/>
      <input type="text" class="form-control" name="title" placeholder="Title" />
      <textarea class="form-control" name="body" rows="8" cols="40" placeholder="Your comment"></textarea>
      <input type="submit" class="btn btn-primary" name="submit" value="Post comment">
    </form>
  </div>
