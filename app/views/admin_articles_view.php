<h1>Articles</h1>

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
            <label for="form-title">Body</label>
            <textarea class="form-control" id="form-body" name="body" cols="20" rows="5"></textarea>
          </div>

          <div class="modal-footer">
            <input class="btn btn-default" type="submit" value="Save">
            <input class="btn btn-danger" type="button" value="RESET">
          </div>
          <!-- <div><button id="resetForm">Reset Form</button></div> -->
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div> <!--End Modal -->

<!-- Js scripts insertion -->
<?php
  $jsScripts = array("<script src='" . BASE_URL . JS ."app.js'></script>");
  $jsScriptsLength = count($jsScripts)
?>
