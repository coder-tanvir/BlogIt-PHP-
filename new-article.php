
<?php

require "includes/init.php";

session_start();

if(! Auth::isLoggedin()){
    die('unauthorized');
    header("Location:login.php");
}
$errors=[];
$db= new Database();
$conn=$db->getConn();
$article=new Article();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $article->title=$_POST['title'];
    $article->content=$_POST['content'];
    if($_POST['title']==''){
        $errors[]='Title is required';
    }

    if($_POST['content']==''){
        $errors[]='Content is required';
    }

    if($_POST['published_at']==''){
        $published_at=NULL;
    }else{
        $article->published_at=$_POST['published_at'];
    }
    var_dump($errors);
    if(empty($errors)){

    

    $sql="INSERT INTO article (title,content,published_at)
            VALUES(:title,:content,:published_at)";

        $stmt=$conn->prepare($sql);

        
        $stmt->bindValue(':title',$article->title,PDO::PARAM_STR);
        $stmt->bindValue(':content',$article->content,PDO::PARAM_STR);

        if($article->published_at == ''){
            $stmt->bindValue(':published_at',null,PDO::PARAM_NULL);
        }else{
            $stmt->bindValue(':published_at',$article->published_at,PDO::PARAM_STR);
        }
        

        if($stmt->execute()){
            $article->id=$conn->lastInsertId();
        }

        header("Location:article.php?id=$article->id");
    
    // //Defense against sql injection attack
    // $stmt=mysqli_prepare($conn,$sql);        

    
    // if($stmt===false){
    //     echo mysqli_error($conn);
    // }else{
    //     mysqli_stmt_bind_param($stmt,"sss", $_POST['title'],$content,$published_at);

    //     if(mysqli_stmt_execute($stmt)){
    //         $genid=mysqli_insert_id($conn);
    //         echo $genid;
    //         header("Location:article.php?id=$genid");
    //         exit;
            
    //     }else{
    //         echo mysqli_stmt_error($stmt);
    //     }
    
    // }
}
    
}
?>

<?php require 'includes/header.php'; ?>
<h2>Post a New Article </h2>
<?php require 'includes/article_form.php' ?>

<?php require 'includes/footer.php';?>