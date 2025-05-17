<h1>Your Blogs</h1>
<div id="blogs-container">Loading your blogs...</div>

<script>
    async function fetchYourBlogs() {
        const userId = <?= json_encode($this->session->userdata('user_id')) ?>; // pass user_id from PHP

        try {
            const response = await fetch(`<?= base_url('api/BlogApi/get_blogs_by_user') ?>?user_id=${userId}`);
            if (!response.ok) {
                throw new Error('Failed to fetch blogs');
            }
            const blogs = await response.json();

            const container = document.getElementById('blogs-container');
            if (blogs.length === 0) {
                container.innerHTML = '<p>You have not created any blogs yet.</p>';
                return;
            }

            container.innerHTML = '';
            blogs.forEach(blog => {
                const blogDiv = document.createElement('div');
                blogDiv.classList.add('blog-post');

                blogDiv.innerHTML = `
          <h3>${escapeHtml(blog.title)}</h3>
          <p>${wordLimiter(escapeHtml(blog.content), 20)}</p>
          ${blog.image ? `<img src="<?= base_url('uploads/') ?>${blog.image}" style="max-width:300px;">` : ''}
          <small>Status: ${escapeHtml(blog.status)}</small><br>
          <small>Published: ${blog.published ? escapeHtml(blog.published) : 'Not Published'}</small><br>

          <button class="btn btn-sm btn-primary update-btn" data-id="${blog.id}">Update</button>
          <button class="btn btn-sm btn-danger delete-btn" data-id="${blog.id}">Delete</button>
          <hr>
        `;

                container.appendChild(blogDiv);
            });

            // Attach update and delete handlers after rendering blogs
            document.querySelectorAll('.update-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const blogId = btn.getAttribute('data-id');
                    // Redirect to update blog page (create this page)
                    window.location.href = `<?= base_url('dashboard/edit_blog/') ?>${blogId}`;
                });
            });

            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', async () => {
                    const blogId = btn.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this blog?')) {
                        try {
                            const res = await fetch(`<?= base_url('api/BlogApi/delete_blog') ?>`, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ id: blogId })
                            });
                            const result = await res.json();
                            if (result.status === 'success') {
                                alert('Blog deleted.');
                                fetchYourBlogs(); // reload blogs after delete
                            } else {
                                alert('Failed to delete blog.');
                            }
                        } catch (error) {
                            alert('Error deleting blog.');
                            console.error(error);
                        }
                    }
                });
            });

        } catch (error) {
            document.getElementById('blogs-container').innerText = 'Error loading blogs.';
            console.error(error);
        }
    }

    // Word limiter to truncate content preview
    function wordLimiter(text, limit) {
        return text.split(' ').slice(0, limit).join(' ') + (text.split(' ').length > limit ? '...' : '');
    }

    // Simple HTML escape to prevent XSS
    function escapeHtml(text) {
        return text.replace(/[&<>"'`=\/]/g, function (s) {
            return ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;',
                '`': '&#x60;',
                '=': '&#x3D;',
                '/': '&#x2F;'
            })[s];
        });
    }

    fetchYourBlogs();
</script>