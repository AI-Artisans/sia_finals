<h1>Posts</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th><th>Title</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= htmlspecialchars($post->title) ?></td>
            <td>
                <a href="<?= base_url('admin/edit_post/'.$post->id) ?>">Edit</a> |
                <a href="<?= base_url('admin/delete_post/'.$post->id) ?>" onclick="return confirm('Delete this post?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
