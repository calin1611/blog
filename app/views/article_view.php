<h1><?php echo $articleTitle; ?></h1>

<!-- If the article has an image, show it -->
<?php if ($articleImageName != "") { ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <img class="article-image " src="<?php echo BASE_URL . UPLOADS . $articleImageName; ?>" alt="Article Image" />

  </div>
  <!-- class col-md-6 col-md-offset-3 -->
</div>
<?php } ?>

<p>
  <?php echo $articleBody; ?>
</p>

<p>
  Published on:
  <?php echo $articleCreationDate; ?>

  by <b><?php echo $articleAuthor; ?></b>
</p>

<h3>Comments:</h3>
  <?php
  // var_dump($comments);
    foreach ($comments as $key => $value) {
      echo '<div class="comment-wrapper">';

      echo"<h5>". htmlspecialchars($value["user"], ENT_QUOTES, 'UTF-8') . " says: </h5>";
      echo"<h4>". htmlspecialchars($value["title"], ENT_QUOTES, 'UTF-8') . "</h4>";
      echo "<p>". htmlspecialchars($value["body"], ENT_QUOTES, 'UTF-8') . "</p>";
      echo "<p>Date: " . $value["creation_date"] . "</p>";

      echo "</div>";
    }
  ?>

  <div class="comment-form">
    <form action="http://localhost/blog/article/postComment?id=<?php echo $articleId; ?>" method="post">
      <input type="text" class="form-control" name="name" placeholder="Your name..."/>
      <input type="text" class="form-control" name="title" placeholder="Title" />
      <textarea class="form-control" name="body" rows="8" cols="40" placeholder="Your comment"></textarea>
      <input type="submit" class="btn btn-primary" name="submit" value="Post comment">
    </form>
  </div>
