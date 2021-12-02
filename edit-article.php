<?php

require "includes/database.php";
require "includes/article.php";

$conn=getDB();

if(isset($_GET['id'])){
    $article=get_Article($conn,$_GET['id']);

    $title=$article['title'];
    $content=$article['content'];
    echo($content);
    $published_at=$article['published_at'];
    }
else{
     $articel=null;
    }

    
?>

<?php require 'includes/header.php'; ?>
<h2>Post a New Article </h2>
<?php require 'includes/article_form.php' ?>

<?php require 'includes/footer.php';?>

