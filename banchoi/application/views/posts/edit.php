<h1>Edit Post</h1>

<?= validation_errors() ?>

<form method="post" action="">
    <label>Title</label><br>
    <input type="text" name="title" value="<?= set_value('title', $post->title) ?>"><br>

    <label>Content</label><br>
    <textarea name="content"><?= set_value('content', $post->content) ?></textarea><br>

    <button type="submit">Update</button>
</form>