<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($post['title']); ?> - Banchoi</title>
    <link href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: "Inria Sans", sans-serif;
            font-weight: 400;
            background-color: #EBEBEB;
        }

        h1, h2 {
            font-weight: 700;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #1e293b;
            color: white;
            min-height: calc(100vh - 56px);
        }

        .main-content {
            flex: 1;
            background: #f9fafb;
            padding: 1.5rem;
        }

        .comment-box {
            border-radius: 8px;
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Top Navbar -->
    <header class="navbar navbar-expand-md navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Banchoi</a>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex align-items-center text-reset p-0" data-bs-toggle="dropdown">
                        <span class="avatar avatar-sm bg-blue-lt me-2"><?php echo strtoupper(substr($username, 0, 1)); ?></span>
                        <span class="d-none d-md-inline"><?php echo htmlspecialchars($username); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="<?php echo base_url('usercontroller/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Layout: Sidebar + Main -->
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar p-3">
            <h4 class="text-white mb-3">Menu</h4>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="<?php echo base_url('dashboard'); ?>"><i class="ti ti-home me-2"></i>Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#"><i class="ti ti-users me-2"></i>Stats</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#"><i class="ti ti-users me-2"></i>Comments</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#"><i class="ti ti-users me-2"></i>View Blog</a>
                </li>
            </ul>
        </aside>

        <main class="flex-grow-1">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($post['title']); ?></li>
                            </ol>
                        </nav>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1><?php echo htmlspecialchars($post['title']); ?></h1>
                            
                            <!-- Post Actions (Only visible to post owner) -->
                            <?php if ($post['user_id'] == $user_id): ?>
                            <div class="post-actions">
                                <button class="btn btn-warning me-2" id="editPostBtn" data-post-id="<?php echo $post['id']; ?>">
                                    <i class="ti ti-edit"></i> Edit
                                </button>
                                <!-- Updated Delete Post Button -->
<button class="btn btn-danger" onclick="window.deletePost('<?php echo $post['id']; ?>')">
    <i class="ti ti-trash"></i> Delete
</button>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (!empty($post['image_path'])): ?>
                            <img src="<?php echo base_url($post['image_path']); ?>" class="img-fluid rounded mb-4" alt="<?php echo htmlspecialchars($post['title']); ?>">
                        <?php endif; ?>
                        
                        <div class="mb-4">
                            <small class="text-muted">Posted by <?php echo htmlspecialchars($post['username']); ?> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></small>
                        </div>

                        <div class="blog-content mb-5">
                            <?php echo $post['content']; ?>
                        </div>

                        <hr class="my-5">

                        <h3 class="mb-4">Comments</h3>

                        <!-- Comment Form -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Leave a Comment</h4>
                                <form id="commentForm">
                                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                    <div class="mb-3">
                                        <textarea class="form-control" name="comment" rows="3" placeholder="Write your comment here..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>

                        <!-- Comments List -->
                        <div id="commentsContainer">
                            <?php if (!empty($comments)): ?>
                                <?php foreach ($comments as $comment): ?>
                                    <div class="comment-box">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <div class="avatar avatar-sm bg-blue-lt"><?php echo strtoupper(substr($comment['username'], 0, 1)); ?></div>
                                                </div>
                                                <div>
                                                    <h5 class="mb-1"><?php echo htmlspecialchars($comment['username']); ?></h5>
                                                    <small class="text-muted"><?php echo date('F j, Y \a\t g:i a', strtotime($comment['created_at'])); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info">
                                    No comments yet. Be the first to comment!
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Post Confirmation Modal -->
            <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post? This action cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');
    
    // Comment Form Handling
    const commentForm = document.getElementById('commentForm');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(commentForm);
            
            fetch('<?php echo site_url("api/add-comment"); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Error: ' + data.error);
                } else {
                    alert('Comment added successfully!');
                    // If the API returns updated comments, use them
                    if (data.comments) {
                        updateComments(data.comments);
                    } else {
                        // Otherwise reload the page to show the new comment
                        window.location.reload();
                    }
                    commentForm.reset();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting your comment');
            });
        });
    }
    
    // Edit Post Functionality
    const editPostBtn = document.getElementById('editPostBtn');
    if (editPostBtn) {
        editPostBtn.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            console.log('Edit button clicked for post ID:', postId);
            window.location.href = `<?php echo base_url('blog/edit/'); ?>${postId}`;
        });
    }
    
    // Delete Post Function - Global function that can be called from onclick
    window.deletePost = function(postId) {
        console.log('Delete function called for post ID:', postId);
        
        if (!confirm('Are you sure you want to delete this post? This action cannot be undone.')) {
            return;
        }
        
        const formData = new FormData();
        formData.append('post_id', postId);
        
        // Add CSRF token if CodeIgniter CSRF protection is enabled
        <?php if(isset($this->security) && $this->security->get_csrf_token_name()): ?>
        formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        <?php endif; ?>
        
        fetch('<?php echo site_url("api/delete-post"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            alert('Post deleted successfully!');
            // Redirect to posts list page
            window.location.href = '<?php echo base_url("posts"); ?>';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the post: ' + error.message);
        });
    };
    
    // Helper Functions
    function updateComments(comments) {
        const commentsContainer = document.getElementById('commentsContainer');
        if (!commentsContainer) return;
        
        if (comments.length === 0) {
            commentsContainer.innerHTML = `
                <div class="alert alert-info">
                    No comments yet. Be the first to comment!
                </div>
            `;
            return;
        }
        
        let commentsHtml = '';
        comments.forEach(comment => {
            const firstLetter = comment.username ? comment.username.charAt(0).toUpperCase() : '?';
            commentsHtml += `
                <div class="comment-box">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <div class="me-2">
                                <div class="avatar avatar-sm bg-blue-lt">${firstLetter}</div>
                            </div>
                            <div>
                                <h5 class="mb-1">${escapeHtml(comment.username)}</h5>
                                <small class="text-muted">${formatDate(comment.created_at)}</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>${escapeHtml(comment.comment)}</p>
                    </div>
                </div>
            `;
        });
        
        commentsContainer.innerHTML = commentsHtml;
    }
    
    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
    
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
        });
    }
});
</script>
</body>

</html>