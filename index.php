
<?php
require "includes/init.php";

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
if(isset($_GET['page'])){
    
    $paginator=new Paginator($_GET['page'], 3 ,Article::getTotal($conn));
}else{
    $paginator=new Paginator(1,3 ,Article::getTotal($conn)); 
}

$articles=Article::getPage($conn,$paginator->limit,$paginator->offset);

?>

<?php require 'includes/header.php';?>


        <?php if (empty($articles)): ?>
            <p>No articles found.</p>
        <?php else: ?>

            

            <ul id="index">
            <?php if(Auth::isLoggedIn()): ?>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <article>
                            <h2><a class="articlename" href="article.php?id=<?= $article['id'];?>"><?= $article['title']; ?></h2>
                            <p><?= $article['content']; ?></p>
                            <a href="edit-article.php?id=<?= $article['id']; ?>">Edit Article</a>
                            <a href="delete-article.php?id=<?= $article['id']; ?>">Delete Article</a>
                        </article>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <article>
                            <h2><a href="article.php?id=<?= $article['id'];?>"><?= $article['title']; ?></h2>
                            <p><?= $article['content']; ?></p>
                           
                        </article>
                    </li>
                    <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <nav>
                <ul class="pagination">
                    <?php if($paginator->previous): ?>
                <li class="page-item"><a class="page-link" href="?page=<?=$paginator->previous; ?>">Previous</a></li>
                <?php else: ?> 
                   <span class="page-link"> Previous </span>
                <?php endif; ?>

                <?php if($paginator->next): ?>
                <li class="page-item"><a class="page-link" href="?page=<?=$paginator->next; ?>">Next</a></li>
                </ul>
                <?php else: ?>
                   <span class="page-link"> Next </span>
                <?php endif; ?>
            </nav>
        <?php endif; ?>

<?php require 'includes/footer.php'; ?>
