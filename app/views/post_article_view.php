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

  <h4 id='loading' >Loading...</h4>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:10%">
      <span class="sr-only">70% Complete</span>
    </div>
  </div>

  <div id="image_preview"><img id="previewing" src="" /></div>

  <input type="submit" name="submit" value="Post" class="btn btn-primary">
</form>


<!-- Js scripts insertion -->
<?php
  $jsScripts = array("<script src='" . BASE_URL . JS ."upload.js'></script>");
  $jsScriptsLength = count($jsScripts)
?>
