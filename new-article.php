
<?php
require 'includes/database.php';
$errors=[];
$title='';
$content='';
$date='';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $title=$_POST['title'];
    $content=$_POST['content'];
    if($_POST['title']==''){
        $errors[]='Title is required';
    }

    if($_POST['content']==''){
        $errors[]='Content is required';
    }

    if($_POST['published_at']==''){
        $date=NULL;
    }else{
        $date=$_POST['published_at'];
    }
    var_dump($errors);
    if(empty($errors)){

    $conn=getDB();

    $sql="INSERT INTO article (title,content,published_at)
            VALUES(?,?,?)";
    
    //Defense against sql injection attack
    $stmt=mysqli_prepare($conn,$sql);        

    
    if($stmt===false){
        echo mysqli_error($conn);
    }else{
        mysqli_stmt_bind_param($stmt,"sss", $_POST['title'],$content,$date);

        if(mysqli_stmt_execute($stmt)){
            $genid=mysqli_insert_id($conn);
            echo $genid;
            header("Location:article.php?id=$genid");
            exit;
            
        }else{
            echo mysqli_stmt_error($stmt);
        }
    
    }
}
    
}
?>

<?php require 'includes/header.php'; ?>
<h2>Post a New Article </h2>
<?php require 'includes/article_form.php' ?>

<?php require 'includes/footer.php';?>