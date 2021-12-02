
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
        mysqli_stmt_bind_param($stmt,"sss", $_POST['title'],$_POST['content'],$date);

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
<?php if (! empty($errors)):?>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form method="post">
    <div>
        <label for="title">Title</label>
        <input name="title" id="title" placeholder="Article Title" value="<?=htmlspecialchars($title); ?>" >
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Article Content" value="<?= htmlspecialchars($content); ?>">
        </textarea>
    </div>
    <div>
        <label for ="published_at">Publication date and time</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>
    <button>Post Article</button>

</form>

<?php require 'includes/footer.php';?>