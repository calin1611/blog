<h1>Articles Page</h1>

<div>

  <div id="articleArea" class=".col-md-6"></div> <!-- Where articles appear -->
  <!-- Where pagination appears -->
  <div id="pagination" class="pagination">
  	<!-- Just tell the system we start with page 1 (id=1) -->
  	<!-- See the .js file, we trigger a click when page is loaded -->
  	<div><a href="#" id="1"></a></div>
  </div>

  <!-- <nav>
    <ul class="pagination">
      <li>
        <a href="#" aria-label="First">
          First
        </a>
      </li>
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
      <li>
        <a href="#">
          Last
        </a>
      </li>
    </ul>
  </nav> -->



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
