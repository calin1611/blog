<?php

$limit = 2;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

?>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>title</th>
<th>body</th>
</tr>
</thead>
<tbody>
<?php
for ($i=0; $i < count($pageWithArticles); $i++) {

?>
          	<tr>
            <td><? echo $pageWithArticles["title"]; ?></td>
            <td><? echo $pageWithArticles["body"]; ?></td>
            </tr>
<?php
};
?>
</tbody>
</table>
