<!doctype html>
<html lang="en">
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
        <link href="styles/styles.css" rel="stylesheet">
    </head>
    <?php include('header.php')?>
    <main role="main" class="container">
       
            <form class="form" method="POST" action="create-post.php" >
                <input required name="title" type="text" placeholder="Title" style="display:block; margin-bottom:1rem; padding:0.5rem">
                <textarea required name="post" rows="5" cols="70" placeholder="Your post"  style="display:block; margin-bottom:1rem"></textarea>
                <input required name="author" type="text" placeholder="Author"  style="display:block; margin-bottom:1rem; padding:0.5rem"/>
                <input class="btn btn-default" type="submit" value="Submit">
            </form>
    </main>
</html>