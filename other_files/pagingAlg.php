<?php
    //source for paginating
    $list = array();
    for ($i=1; $i<=39; $i++) {
        $list[$i] = $i;
    }

//    needed for validation purposes
    $listLength = count($list, COUNT_RECURSIVE);

//    the result hoes here
    $pages = array();

//    How many items should be on one page
    $itemsPerPage = 16;

    //building the pages
    function buildPages($list, $itemsPerPage) {
        global $pages;
        global $listLength;


        $x = 1;                 //counter for page items
        $pageNumber = 0;        //the number of the page
        $pageItem = 0;          //the number of the item on a page
        $counter = 0;           //global counter. Checks if the correct total number of items is processed


        foreach ($list as $value) {
            if ($counter < $listLength) {

                if ($x % $itemsPerPage != 0) {
                    $pages[$pageNumber][$pageItem] = $value;

                    $counter++;
                    $x++;
                    $pageItem++;

                } else {
                    $pages[$pageNumber][$pageItem] = $value;

                    $counter++;
                    $x = 1;
                    $pageNumber++;
                    $pageItem = 0;
                }
            }
        }

    }



    function showAllPages($pages) {
//        global $pages;
        global $listLength;
        global $itemsPerPage;
        $counter = 0;

        for ($i = 0; $i<count($pages); $i++) {
            echo "Page " . $i . " <br>";
            for ($j = 0; $j<$itemsPerPage; $j++) {

                if ($counter < $listLength) {
                    echo "Item " . $j . ": " . $pages[$i][$j] . "<br>";
                    $counter++;
                }
            }
            echo "<hr>";
        }
    }

    function showPage($source, $pageNumber) {
        for ($i = 0; $i < count($source[$pageNumber]); $i++) {
            echo "item " . $i . ": " . $source[$pageNumber][$i] . "<br>";
        }
    }

    buildPages($list, $itemsPerPage );
    echo "pagina mea <br>";
    showPage($pages, 2);
    showAllPages($pages);


    echo "<pre>";
    echo count($pages);
    echo "<br>";
    echo "list:<br>";
    var_dump($list);
    echo "pages:<br>";
    var_dump($pages);
    echo "CountRecursive:<br>";
    echo count($list, COUNT_RECURSIVE);

?>

<ul>
    <li></li>
</ul>
