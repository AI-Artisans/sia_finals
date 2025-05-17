<h2>Create Blog</h2>
<form id="blogForm" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">

    <div class="mb-3">
        <label class="form-label">Blog Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Blog Content</label>
        <textarea name="content" class="form-control" rows="6"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="draft" selected>Draft</option>
            <option value="published">Published</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Publish Date</label>
        <input type="datetime-local" name="published" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Submit Blog</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('blogForm');
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                const response = await fetch('<?php echo site_url('api/BlogApi/create'); ?>', {
                    method: 'POST',
                    body: formData
                });

        const result = await response.json();
        console.log(result); // For debugging

        alert(result.message);

        if (result.status === 'success') {
            window.location.href = "<?php echo site_url('dashboard/your_blogs'); ?>";
        }

    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while submitting the blog.');
    }
        });
    });
</script>