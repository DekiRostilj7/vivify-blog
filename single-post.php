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

            if (isset($_GET['postDeleteId'])) {
                $id = $_GET['postDeleteId'];

                $sqlDelCommments = "DELETE FROM comments WHERE Post_id = $id";
                $statementDelComm = $connection->prepare($sqlDelCommments);
                $statementDelComm->execute();
                
                $sqlDel = "DELETE FROM posts WHERE Id = $id;";
                $statementDelete = $connection->prepare($sqlDel);
                $statementDelete->execute();
            
                header("Location:index.php");
            
            }
        ?>


     <main role="main" class="container">       
                
        <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['Id']) ?>">
                    <?php echo($singlePost['Title']) ?>
                </a></h2>
                <p><?php echo $singlePost['Created_at']; ?> by <?php echo $singlePost['Author'];?></p>
                <p> <?php echo $singlePost['Body']; ?> </p>
                
                <form action="single-post.php?postDeleteId=<?php echo $singlePost['Id'] ?>" method="post" onsubmit="return confirm('Do you really want to delete this post?')">
                    <input type="submit" name="Delete" class='btn btn-primary' value='Delete this post'>
                </form>
        </div>
        
        <form class="addComment" action="create-comment.php" method="POST">
            <label name="dodajKomentar" type="text">Add comment</label><br>
            <input onchange="checkAuthor()" class="alert alert-danger" required type="text" name="author" placeholder="Author"><br>
            <input type="hidden" name="postId" value="<?php echo $singlePost['Id']; ?>" >
            
            <textarea onchange="checkText()" class="alert alert-danger" required name="komentar" cols="30" rows="10" placeholder="Enter your comment here"></textarea>

            <button class="btn btn-default" type="submit">Submit</button>
        </form>

        <div>
            <?php include('comments.php'); ?>
        </div>
        
        <?php include('sidebar.php'); ?>

        <?php include('footer.php'); ?>
        </main>
        
    </body>
    <script>

                  

        function checkAuthor(){
            var autor=document.getElementsByName("author");
            
            if(autor.innerHTML === ""){
            autor.classList.add('alert-danger')

            } else {
                autor.classList.remove('alert-danger')
                };
        }
        
        function checkText(){
            var text=document.getElementsByName("komentar");
            if(text.innerHTML === ""){
            text.classList.add('alert-danger');
            } else {
                text.classList.remove('alert-danger')
                };
        }
    </script>
</html>