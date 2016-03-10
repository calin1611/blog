<h1>Comments</h1>

<div>
    Comments List:
    <?php
        for ($i=0; $i<count($comments); $i++) {

    ?>

    <div>
        <div> <?php echo $comments[$i]["email"]; ?> </div>
        <div> <?php echo $comments[$i]["body"]; ?> </div>
    </div>

    <?php
        }
    ?>
</div>