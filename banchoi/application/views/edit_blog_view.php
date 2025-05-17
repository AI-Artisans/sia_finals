<h2>Edit Blog</h2>

<div id="message"></div>

<form id="editBlogForm" enctype="multipart/form-data">
    <input type="hidden" id="blogId" name="id" value="<?= htmlspecialchars($blog->id) ?>">
    <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">

    <div class="mb-3">
        <label for="title" class="form-label">Blog Title</label>
        <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($blog->title) ?>"
            required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Blog Content</label>
        <textarea id="content" name="content" class="form-control" rows="6"
            required><?= htmlspecialchars($blog->content) ?></textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="form-control">
            <option value="draft" <?= ($blog->status ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
            <option value="published" <?= ($blog->status ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="published" class="form-label">Publish Date</label>
        <input type="datetime-local" id="published" name="published" class="form-control"
            value="<?= isset($blog->published) ? date('Y-m-d\TH:i', strtotime($blog->published)) : '' ?>">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
        <?php if (!empty($blog->image)): ?>
            <small>Current image: <a href="<?= base_url('uploads/' . $blog->image) ?>"
                    target="_blank"><?= $blog->image ?></a></small>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Update Blog</button>
</form>

<script>
    document.getElementById('editBlogForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        try {
            const res = await fetch('<?= base_url("api/BlogApi/edit_blog/" . $blog->id) ?>', {
                method: 'POST',
                body: formData
            });

    const data = await res.json();

    const messageDiv = document.getElementById('message');
    if (data.status === 'success') {
        messageDiv.innerText = 'Blog updated successfully!';
        messageDiv.className = 'alert alert-success';
    } else {
        messageDiv.innerText = 'Update failed: ' + (data.message || 'Unknown error');
        messageDiv.className = 'alert alert-danger';
    }
        } catch (error) {
        console.error(error);
        const messageDiv = document.getElementById('message');
        messageDiv.innerText = 'Error updating blog.';
        messageDiv.className = 'alert alert-danger';
    }
    });
</script>