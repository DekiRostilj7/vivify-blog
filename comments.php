<?php

        include('db.php');


        $sqlComments =
        "SELECT * FROM comments WHERE comments.Post_id = {$_GET['post_id']}";
        "SELECT * FROM comments JOIN users ON comments.Post_id = posts.Id WHERE comments.Post_id = {$_GET['post_id']}";

        $statement = $connection->prepare($sqlComments);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $comments = $statement->fetchAll();

        if (isset($_GET['deleteId'])) {
                // Za brisanje
                
                $sqlComments = "DELETE FROM comments WHERE Id = {$_GET['deleteId']}";
                $statement = $connection->prepare($sqlComments);
                $statement->execute();  
                header("Location: single-post.php?post_id={$_GET['post_id']}");
        }

?>
<body>
        
        
            
        <div class = "comment-div">
            <ul id="hide">
        <?php

                foreach ($comments as $comment) {
        ?>


                <li  class="single-comment">
                        
                        <div>Posted by: <?php echo $comment['Author'] ?></div> 
                        
                        <div> comment: <?php echo $comment['Text'] ?> </div>
                        <a href="single-post.php?deleteId=<?php echo $comment['Id'] ?>&post_id=<?php echo $_GET['post_id'] ?>"><button class="btn btn-default delbtn">Delete</button></a>
                </li>
       
                             
                         

                        
       
        <?php } ?>

         </ul>

        <button class="btn btn-default" id= "button" onclick="hideComment()">Hide comments</button>
        <script>
        var comments = document.getElementById('hide')
        var button = document.getElementById('button')
        function hideComment(){
                
                if(button.innerHTML == "Show Comments"){
                        comments.classList.remove("hide")
                        button.innerHTML = "Hide Comments"
                } else{
                        comments.className = "hide"
                        button.innerHTML = "Show Comments"
                }
        }
</script>

       
</body>