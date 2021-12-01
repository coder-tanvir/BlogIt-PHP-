
<?php
require 'includes/database.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $sql="INSERT INTO article (title,content,published_at)
            VALUES(?,?,?)";
    
    $stmt=mysqli_prepare($conn,$sql);        

    
    if($stmt===false){
        echo mysqli_error($conn);
    }else{
        mysqli_stmt_bind_param($stmt,"sss", $_POST['title'],$_POST['content'],$_POST['published_at']);

        if(mysqli_stmt_execute($stmt)){
            $genid=mysqli_insert_id($conn);
            
        }else{
            echo mysqli_stmt_error($stmt);
        }
    
    }
    
}
?>

<?php require 'includes/header.php'; ?>
<form method="post">
    <div>
        <label for="title">Title</label>
        <input name="title" id="title" placeholder="Article Title">
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Article Content">
        </textarea>
    </div>
    <div>
        <label for ="published_at">Publication date and time</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>
    <button>Post Article</button>

</form>

<?php require 'includes/footer.php';?>