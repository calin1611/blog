<h1>Articles Page</h1>


<?php
var_dump($_POST);
?>
<div>

  <div class="row">
    <div class="col-lg-6">
      <div class="input-group">
        <form method="POST" onsubmit="return false;">
          <input type="text" class="form-control" id="searchBox" name="search" placeholder="Search for...">
          <span class="input-group-btn">
            <input type="submit" class="btn btn-primary" id="searchButton" value="Search!">
          </span>
        </form>
      </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
  </div><!-- /.row -->



  <div id="articleArea"></div> <!-- Where articles appear -->
  <!-- Where pagination appears -->
  <div id="pagination">
  	<!-- Just tell the system we start with page 1 (id=1) -->
  	<!-- See the .js file, we trigger a click when page is loaded -->
  	<div><a href="#" id="1"></a></div>
  </div>




  <?php
  // foreach ($this->allArticles as $key => $value) {
  ?>

  <!-- <div>
  <div><strong><?php echo $value["title"]; ?> </strong></div>
  <div> <?php echo $value["body"]; ?> </div>
  <br/>
</div> -->

<?php
// }
?>

</div>
