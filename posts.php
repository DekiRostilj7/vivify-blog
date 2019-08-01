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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>

    <body>
        <main role="main" class="container"> 
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
        </main>
    </body>
</html>