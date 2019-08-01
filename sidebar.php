<?php 
    include('db.php');

$sql = "SELECT * FROM posts ORDER BY Created_at desc LIMIT 5";
$statement = $connection->prepare($sql);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();

?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <?php 
        foreach($posts as $post ) { ?>
            <div class="sidebar-module sidebar-module-inset">
                <h4 class="side-title"><a href="single-post.php?post_id=<?php echo($post['Id']) ?>">
                    <?php echo $post['Title']; ?>
                </a></h4>
            </div>
        <?php } ?>
</aside>