<h1 class="col-md-12 text-center">Welcome, <?php echo $_SESSION['logged']; ?>!</h1>
<h2 class="col-md-12 ">Your articles</h2>


<table class="table table-hover" id="articlesTbl">
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Article</h4>
      </div>
      <div class="modal-body">
        <form id="articleForm" onsubmit="return false;">
          <div>
            <input type="hidden" name="id">
          </div>


          <div>
            <label for="form-title">Title</label>
            <input class="form-control" id="form-title" type="text" name="title">
          </div>


          <div>
            <label for="form-title">Article</label>
            <textarea class="form-control" id="form-body" name="body" cols="20" rows="5"></textarea>
          </div>


          <div>
            <label for="form-title">Current Image</label>
            <div ><img class="img-modal" id="img-current" src="" /></div>

          </div>


          <div id="selectImage">
            <label>Select Your Image</label><br/>
            <input type="file" name="file" id="file" >
          </div>

          <div>
            <label>New Image</label><br/>
            <div id="image_preview"><img id="previewing" src="" /></div>
          </div>


          <div class="modal-footer">
            <input class="btn btn-default" type="submit" value="Save">
            <input class="btn btn-danger" type="button" value="RESET">
          </div>
        </form>
      </div>

    </div>
  </div>
</div> <!--End Modal -->

<!-- Js scripts insertion -->
<?php
  $jsScripts = array(
    "<script src='" . BASE_URL . JS ."my_articles.js'></script>");

  $jsScriptsLength = count($jsScripts)
?>
