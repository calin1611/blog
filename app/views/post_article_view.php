<h1>Post article</h1>

<div id="status"></div>

<form id="postForm" action="http://localhost/blog/post/postArticle" method="post" enctype="multipart/form-data">
  <label for="title">Title</label>
  <input type="text" id="title" name="title" class="form-control">

  <label for="title">Article</label>
  <textarea id="body" name="body" class="form-control" rows="8"></textarea>


  <div id="selectImage">
    <label>Select Your Image</label><br/>
    <input type="file" name="file" id="file" required >
    <!-- <input type="submit" value="Upload" class="submit" disabled /> -->
    <!-- <label id="file-validation">Please upload only .gif .jpg .png files</label> -->
  </div>

  <div class="progress hidden">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>

  <div id="image_preview"><img id="previewing" src="" /></div>

  <input type="submit" name="submit" value="Post article" class="btn btn-primary col-md-6 col-md-offset-3" id='submit'>
</form>


<!-- Js scripts insertion -->
<?php
  $jsScripts = array("<script src='" . BASE_URL . JS ."upload.js'></script>");
  $jsScriptsLength = count($jsScripts)
?>
