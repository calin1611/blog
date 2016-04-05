<h1>Articles Page</h1>

<div>

  <div id="articleArea" class=".col-md-6"></div> <!-- Where articles appear -->
  <!-- Where pagination appears -->
  <div id="pagination" class="pagination">
  	<!-- Just tell the system we start with page 1 (id=1) -->
  	<!-- See the .js file, we trigger a click when page is loaded -->
  	<div><a href="#" id="1"></a></div>
  </div>

</div>

<!-- Js scripts insertion -->
<?php
  $jsScripts = array("<script src='" . BASE_URL . JS ."pagination.js'></script>");
  $jsScriptsLength = count($jsScripts)
?>
