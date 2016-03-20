<h1>Post article</h1>
<?php if (isset($_GET['success']) && ($_GET['success'] == "true")) {
  echo '<div class="alert alert-success" role="alert"><b>Success!</b> The article has been posted</div>';
} elseif (isset($_GET['success']) && ($_GET['success'] == "false")) {
  echo '<div class="alert alert-danger" role="alert"><b>Oh snap!</b> Please fill the 2 fields.</div>';
} ?>
<form class="" action="http://localhost/blog/post/postArticle" method="post">
  <label for="title">Title</label>
  <input type="text" name="title" class="form-control">
  <label for="title">Article</label>
  <textarea name="body" class="form-control" rows="8"></textarea>
  <input type="submit" name="submit" value="Post" class="btn btn-primary">
</form>
