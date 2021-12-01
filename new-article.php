
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
        var_dump($_POST);
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