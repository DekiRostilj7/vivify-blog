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
        
        
            
        <div class = "comment-div">
            <ul id="hide">
        <?php

                foreach ($comments as $comment) {
        ?>


                <li  class="single-comment">
                        <div>Posted by: <?php echo $comment['Author'] ?></div>
                        <div> comment: <?php echo $comment['Text'] ?> </div>
                </li>
       

       
        <?php } ?>

         </ul>

        <button id= "button" onclick="hideComment()">Hide comments</button>
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