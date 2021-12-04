<?php

require "includes/init.php";


$db=new Database();
$conn=$db->getConn();

if(isset($_GET['id'])){
    $article=Article::getByID($conn,$_GET['id'],'id');

    if($article){
        if($_SERVER["REQUEST_METHOD"]=="POST"){

        $sql="DELETE FROM article WHERE id=:id";
        //$stmt=mysqli_prepare($conn,$sql);
            $stmt=$conn->prepare($sql);
            $stmt->bindValue(':id',$article->id,PDO::PARAM_INT);
            $stmt->execute();

            header("Location:index.php");
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
