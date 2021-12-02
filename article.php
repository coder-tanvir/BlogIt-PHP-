<?php

require "includes/database.php";
require "includes/article.php";
$conn=getDB();

if(isset($_GET['id'])){
    $article=get_Article($conn,$_GET['id']);
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
                            <h2><?= $article['title']; ?></a></h2>
                            <p><?= $article['content']; ?></p>
                        </article>
                    </li>
                
            </ul>

        <?php endif; ?>
            <a href="edit-article.php?id=<?= $article['id']; ?>">Edit</a>
            <a href="delete-article.php?id=<?= $article['id']; ?>">Delete</a>

    <?php require 'includes/footer.php'; ?>
