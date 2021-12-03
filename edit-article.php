<?php

require "includes/database.php";
require "includes/article.php";
require "classes/Database.php";
require "classes/Article.php";

//$conn=getDB();
$db=new Database();
$conn=$db->getConn();


if(isset($_GET['id'])){
    $article=Article::getByID($conn,$_GET['id']);

    if(! $article){
        die('Not found');
    }

    }
else{
     $article=null;
     die('Article Not Found');
}

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $article->title=$_POST['title'];
        $article->content=$_POST['content'];
        $article->published_at=$_POST['published_at'];
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
                SET title=:title,
                    content=:content,
                    published_at=:published_at
                    WHERE id=:id";

            $stmt=$conn->prepare($sql);

            $stmt->bindValue(':id',$article->id,PDO::PARAM_INT);
            $stmt->bindValue(':title',$article->title,PDO::PARAM_STR);
            $stmt->bindValue(':content',$article->content,PDO::PARAM_STR);

            if($article->published_at == ''){
                $stmt->bindValue(':published_at',null,PDO::PARAM_NULL);
            }else{
                $stmt->bindValue(':published_at',$article->published_at,PDO::PARAM_STR);
            }
            $stmt->execute();
            
            header("Location:index.php?id=$article->id");
        }


    }

?>

<?php require 'includes/header.php'; ?>
<h2>Post a New Article </h2>
<?php require 'includes/article_form.php' ?>

<?php require 'includes/footer.php';?>

