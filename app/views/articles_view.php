<h1>Articles Page</h1>

<div>
  Articles List:

  <div id="articleArea"><?php $this->getHtml(); ?></div>

<?php
  foreach ($this->allArticles as $key => $value) {
?>

  <div>
    <div><strong><?php echo $value["title"]; ?> </strong></div>
    <div> <?php echo $value["body"]; ?> </div>
    <br/>
  </div>

  <?php
    }
  ?>

<!-- My Pagination -->
  <div>
    <nav>
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>

        <li><a href="index.php?p=1" id="1">nr 1</a></li>
        <li><a href="#">nr 2</a></li>

        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
<!-- My Pagination -->




</div>
