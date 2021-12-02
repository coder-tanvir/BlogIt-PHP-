<?php

require 'includes/database.php';
require 'includes/article.php';

$conn=getDB();

if(isset($_GET['id'])){
    $article=get_Article($conn,$_GET['id'],'id');

    if($article){
        if($_SERVER["REQUEST_METHOD"]=="POST"){

        $sql="DELETE FROM article WHERE id=?";
        $stmt=mysqli_prepare($conn,$sql);

        if($stmt==false){
            echo mysqli_error($conn);
        }else{
            mysqli_stmt_bind_param($stmt,"i",$_GET['id']);
            if(mysqli_stmt_execute($stmt)){
                header("Location:index.php");
            }else{
                echo mysqli_stmt_error($stmt);
            }
        }
    }

    }else{
        echo'No such Article';
    }
}

?>
<?php
require "includes/header.php"; ?>
<h2> Delete Article </h2>
<P>Are You Sure </p>
<form method="POST">
<button>Delete</button>
<a href="index.php">Go Back to index</a>
</form>
<?php require "includes/footer.php";
?>
