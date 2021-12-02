<?php

require "includes/database.php";
require "includes/article.php";

$conn=getDB();

if(isset($_GET['id'])){
    $article=get_Article($conn,$_GET['id']);

    if(! $article){
        die('Not found');
    }
    $id=$article['id'];
    $title=$article['title'];
    $content=$article['content'];
    echo($content);
    $published_at=$article['published_at'];
    echo ($published_at);
    }
else{
     $articel=null;
     die('Article Not Found');
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $published_at=$_POST['published_at'];
        if($_POST['title']==''){
            $errors[]='Title is required';
        }
    
        if($_POST['content']==''){
            $errors[]='Content is required';
        }
    
        if($_POST['published_at']==''){
            $published_at=NULL;
        }else{
            $published_at=$_POST['published_at'];
        }
        
        if(empty($errors)){
           $sql="UPDATE article 
                SET title=?,
                    content=?,
                    published_at=?
                    WHERE id=?";
            
            $stmt=mysqli_prepare($conn,$sql);
            if($stmt==false){
                echo mysqli_error($conn);
            }
            mysqli_stmt_bind_param($stmt,"sssi",$title,$content,$published_at,$id);
            if(mysqli_stmt_execute($stmt)){
                header("Location:article.php?id=$id");
            }else{
                echo mysqli_stmt_errror($stmt);
            }
        }


    }
    
?>

<?php require 'includes/header.php'; ?>
<h2>Post a New Article </h2>
<?php require 'includes/article_form.php' ?>

<?php require 'includes/footer.php';?>

