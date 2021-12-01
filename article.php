<?php

require "includes/database.php";

if(is_numeric($_GET['id'])){

$sql="SELECT * from article WHERE id=".$_GET['id'];

$results=mysqli_query($conn,$sql);

if($results===false){
    echo mysqli_error($conn);
}else{
    $article=mysqli_fetch_assoc($results);

}
}else{
    $articel=null;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>My blog</h1>
    </header>

    <main>
        <?php if (empty($article)): ?>
            <p>No articles found.</p>
        <?php else: ?>

            <ul>

                    <li>
                        <article>
                            <h2><?= $article['title']; ?></a></h2>
                            <p><?= $article['content']; ?></p>
                        </article>
                    </li>
                
            </ul>

        <?php endif; ?>
    </main>
</body>
</html>
