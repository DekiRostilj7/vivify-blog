<?php
    include('db.php');

    if(!empty($_POST['title']) && !empty($_POST['post'] && !empty($_POST['author']))) {
        $title = $_POST['title'];
        $post = $_POST['post'];
        $author = $_POST['author'];
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO posts (Title, Body, Author,Created_at) VALUES ('{$title}', '{$post}', '{$author}','$date');";
        // var_dump($sqlInsert);
        $statementInsert = $connection->prepare($sql);
        $statementInsert->execute();
        $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: index.php");

    }
    
?>