<?php 
    include('db.php');

    $sql = "SELECT * FROM posts ORDER BY Created_at desc";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
    

?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>
        <?php 
        foreach($posts as $post ) { ?>
            <div class="blog-post">
                <h2 class="blog-post-title" style="color:#b34848;"><a href="single-post.php?post_id=<?php echo($post['Id']) ?>">
                    <?php echo $post['Title']; ?>
                </a></h2>       
                <p><?php echo $post['Created_at']; ?> <?php echo $post['Author'];?></p>
                <p> <?php echo $post['Body']; ?> </p>
            </div><!-- /.blog-post -->
        <?php } ?>

    </body>
</html>