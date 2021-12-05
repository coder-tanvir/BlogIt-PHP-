
<?php if (! empty($errors)):?>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<form method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" placeholder="Article Title" value="<?=htmlspecialchars($article->title); ?>" >
    </div>
    <div class="mb-3">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" rows="10" cols="30" placeholder="Article Content"><?=htmlspecialchars($article->content); ?></textarea>
    </div>
    <div class="mb-3">
        <label for ="published_at">Publication date and time</label>
        <input class="form-control" type="datetime-local" name="published_at" id="published_at" value="<?= $article->published_at; ?>">
    </div>
    <button class="btn btn-primary">Save</button>

</form>
