<?php 
    include('db.php');

    $sql = "SELECT * FROM posts";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
    

?>


<html>
    <body>
        <?php 
        foreach($posts as $post ) { ?>
            <div class="blog-post">
                <a href="single-post.php?title='Sample blog post'"><h2 class="blog-post-title">
                    <?php echo $post['Title']; ?>
                </h2></a>       
                <p> <?php echo $post['Body']; ?>
            </div><!-- /.blog-post -->
        <?php } ?>

    </body>
</html>