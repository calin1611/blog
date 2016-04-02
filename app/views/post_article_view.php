<h1>Post article</h1>
<?php
  if (isset($_GET['success']) && ($_GET['success'] == "true")) {
    echo '<div class="alert alert-success" role="alert"><b>Success!</b> The article has been submitted. It will be visible after it is approved by an administrator</div>';
  } elseif (isset($_GET['success']) && ($_GET['success'] == "false")) {
    echo '<div class="alert alert-danger" role="alert"><b>Oh snap!</b> Please fill the 2 fields.</div>';
  }
?>

<form class="" action="http://localhost/blog/post/postArticle" method="post" enctype="multipart/form-data">
  <label for="title">Title</label>
  <input type="text" name="title" class="form-control">

  <label for="title">Article</label>
  <textarea name="body" class="form-control" rows="8"></textarea>

  <h4 id='loading' >Loading...</h4>
  <div id="image_preview"><img id="previewing" src="" /></div>

  <div id="selectImage">
    <label>Select Your Image</label><br/>
    <input type="file" name="file" id="file" required />
    <!-- <input type="submit" value="Upload" class="submit" disabled /> -->
    <!-- <label id="file-validation">Please upload only .gif .jpg .png files</label> -->
  </div>

  <input type="submit" name="submit" value="Post" class="btn btn-primary">
</form>

<script src="public/js/upload.js"></script>
