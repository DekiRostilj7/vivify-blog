<html>
    <body>
        <?php 
            include('db.php');
            include('header.php');

            if (isset($_GET['post_id'])) {

            $sql = "SELECT * FROM posts WHERE posts.Id = {$_GET['post_id']}";
            
            $statement = $connection->prepare($sql);
    
            $statement->execute();
    
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $singlePost = $statement->fetch(); 

            }

        ?>



                
        <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['Id']) ?>">
                    <?php echo($singlePost['Title']) ?>
                </a></h2>
                <p><?php echo $singlePost['Created_at']; ?> by <?php echo $singlePost['Author'];?></p>
                <p> <?php echo $singlePost['Body']; ?> </p>
                
                
        </div>
            <?php include('comments.php'); ?>

        <?php include('sidebar.php'); ?>

        <?php include('footer.php'); ?>
        
    </body>
</html>