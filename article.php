<?php

require "includes/database.php";
require "includes/article.php";
require 'classes/Database.php';
require 'classes/Article.php';

$db=new Database();
$conn=$db->getConn();

if(isset($_GET['id'])){
    $article=Article::getByID($conn,$_GET['id']);
    }
else{
     $articel=null;
    }

?>

<?php require 'includes/header.php';?>
        <?php if (empty($article)): ?>
            <p>No articles found.</p>
        <?php else: ?>

            <ul>

                    <li>
                        <article>
                            <h2><?= $article->title; ?></a></h2>
                            <?php if($article->image_file): ?>
                                <img src="uploads/<?=$article->image_file; ?>">
                            <?php endif; ?>
                            <p><?= $article->content; ?></p>
                            <a href="edit-article-image.php?id=<?=$article->id; ?>">Edit-Image</a>
                        </article>
                    </li>
                
            </ul>

        <?php endif; ?>


    <?php require 'includes/footer.php'; ?>
