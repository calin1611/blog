<h1>Articles</h1>

<table class="table table-hover" id="articlesTbl">
</table>

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

  <div>
    <input class="btn btn-default" type="submit" value="Save">
    <input class="btn btn-danger" type="button" value="RESET">
  </div>
  <!-- <div><button id="resetForm">Reset Form</button></div> -->
</form>
