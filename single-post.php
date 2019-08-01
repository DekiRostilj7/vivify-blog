<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../../../favicon.ico">

<title>Vivify Blog</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<!-- Custom styles for this template -->
<link href="styles/blog.css" rel="stylesheet">
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


     <main role="main" class="container">       
                
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
        </main>
    </body>
</html>