
<?php
require 'classes/Database.php';
include "includes/auth.php";
require "classes/Article.php";
session_start();
//Comments are functional way to do the same thing.
///Refactoring to PDO


$db=new Database();
$conn=$db->getConn();

//Function
//$conn=getDB();

//$sql="SELECT * from article ORDER BY published_at;";
//$results=mysqli_query($conn,$sql);
//$articles=mysqli_fetch_all($results,MYSQLI_ASSOC);

//PDO
//if($results===false){
    //echo mysqli_error($conn);

//$results=$conn->query($sql);
// $conn->errorInfo();
//}else{
    //$articles=$results->fetchAll(PDO::FETCH_ASSOC);
//}
$articles=Article::getAll($conn);

?>

<?php require 'includes/header.php';?>

<?php if(isLoggedin()): ?>
    <p>You are Logged in</p>
    <a href="logout.php">Logout</a>
    <a href="new-article.php">New Article</a>
<?php else: ?>
<p>Please log in</p>
<a href="login.php">Login</a>
<?php endif; ?>

        <?php if (empty($articles)): ?>
            <p>No articles found.</p>
        <?php else: ?>

            <ul>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <article>
                            <h2><a href="article.php?id=<?= $article['id'];?>"><?= $article['title']; ?></h2>
                            <p><?= $article['content']; ?></p>
                            <p><a href="edit-article.php?id=<?= $article['id'];?>">Edit Article</p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
<?php require 'includes/footer.php';?>
