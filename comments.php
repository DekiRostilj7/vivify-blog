<?php


        $sqlComments =
        "SELECT * FROM comments WHERE comments.Post_id = {$_GET['post_id']}";
        "SELECT * FROM comments JOIN users ON comments.Post_id = posts.Id WHERE comments.Post_id = {$_GET['post_id']}";

        $statement = $connection->prepare($sqlComments);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $comments = $statement->fetchAll();

?>
<body>
        
        <?php

foreach ($comments as $comment) {
        ?>
            
        <div class = "comment-div">
            <ul id="hide">
                <li  class="single-comment">
                <div>Posted by: <?php echo $comment['Author'] ?></div>
                <div> comment: <?php echo $comment['Text'] ?> </div>
                </li>
<?php } ?>

       
</body>