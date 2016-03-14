<h1>Articles Page</h1>

<div>
    Articles List:
    <div id="target-content" >loading...</div>
    <?php

        var_dump($_GET);
        if (empty($_GET["page"])) {
          $_GET["page"] = 1;
        }

        $pageWithArticles = returnPage($this->pages,$_GET["page"]);
        for ($i=0; $i<count($pageWithArticles); $i++) {

    ?>



    <div>
        <div><strong><?php echo $pageWithArticles[$i]["title"]; ?> </strong></div>
        <div> <?php echo $pageWithArticles[$i]["body"]; ?> </div>
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

                <?php
                    foreach ($this->pages as $key => $value) {
                        $pageNo = $key + 1;
                        echo '<li><a href="?page='.$pageNo.'">' . $pageNo . "</a></li>";
                    }
                ?>


                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<!-- My Pagination -->


    <?php
      $total_pages = count($this->pages);
      var_dump($total_pages);
    ?>
    <div align="center">
      <ul class='pagination text-center' id="pagination">
        <?php
          if(!empty($total_pages)) {
            for($i=1; $i<=$total_pages; $i++) {
              if($i == 1) { ?>

                <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

              <?php } else { ?>

                <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>

                <?php }
              }
            }
          ?>
      </ul>
    </div>


</div>
