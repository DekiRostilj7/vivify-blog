<?php
   include( "db.php");
?>

<?php
        $id = $_GET['post_id'];
        $sqlDel = "DELETE FROM posts WHERE Id = $id;";
        $statementDelete = $connection->prepare($sqlDel);
        $statementDelete->execute();
        $statementDelete->setFetchMode(PDO::FETCH_ASSOC);
    
    header("Location:index.php");
    
?>