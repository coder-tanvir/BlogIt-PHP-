
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
        <input name="title" id="title" placeholder="Article Title" value="<?=htmlspecialchars($article->title); ?>" >
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="10" cols="30" placeholder="Article Content"><?=htmlspecialchars($article->content); ?></textarea>
    </div>
    <div>
        <label for ="published_at">Publication date and time</label>
        <input type="datetime-local" name="published_at" id="published_at" value="<?= $article->published_at; ?>">
    </div>
    <button>Save</button>

</form>
