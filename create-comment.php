<?php

    include("db.php");

    $author=$_POST['author'];
    $comment = $_POST['komentar'];
    $postId = $_POST['postId'];

    $sql = "INSERT INTO comments (Author, Text, Post_id) VALUES ('{$author}', '{$comment}', {$postId});";
        $statementInsert = $connection->prepare($sql);
        $statementInsert->execute();
        $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: single-post.php?post_id=$postId");
?>

