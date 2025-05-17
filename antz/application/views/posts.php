<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Posts</title>
    <link href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: "Inria Sans", sans-serif;
            font-weight: 400;
            background-color: #EBEBEB;
        }

        h1,
        h2 {
            font-weight: 700;
        }

        .create_post {
            background-color: #3D3A3A;
            height: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

        .post-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .post-actions {
            display: flex;
            gap: 0.5rem;
        }

        .pagination {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .post-grid {
                grid-template-columns: 1fr;
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
                    <a class="nav-link text-white active" href="<?php echo base_url('posts'); ?>"><i class="ti ti-article me-2"></i>Your Posts</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#"><i class="ti ti-chart-bar me-2"></i>Stats</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#"><i class="ti ti-messages me-2"></i>Comments</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#"><i class="ti ti-world me-2"></i>View Blog</a>
                </li>
            </ul>
        </aside>

        <main class="flex-grow-1">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h2 mb-0">Your Posts</h1>
                    <a href="#" class="create_post btn btn-dark" data-bs-toggle="modal" data-bs-target="#blogModal">Create New Post</a>
                </div>

                <!-- Search -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </span>
                            <input type="text" id="post-search" class="form-control" placeholder="Search your posts..."/>
                        </div>
                    </div>
                </div>

                <!-- Posts Grid -->
                <div class="post-grid" id="posts-container">
                    <?php if (!empty($user_posts)): ?>
                        <?php foreach ($user_posts as $post): ?>
                            <div class="card post-card">
                                <?php if (!empty($post['image_path'])): ?>
                                    <img src="<?php echo base_url($post['image_path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                <?php else: ?>
                                    <img src="https://picsum.photos/600/300?random=<?php echo $post['id']; ?>" class="card-img-top" alt="Default Image">
                                <?php endif; ?>
                                
                                <div class="card-body">
                                    <h2 class="h5 mb-2"><?php echo htmlspecialchars($post['title']); ?></h2>
                                    <p class="text-muted small"><?php echo substr(strip_tags($post['content']), 0, 100) . '...'; ?></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="text-muted small">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                                                <path d="M16 3v4"></path>
                                                <path d="M8 3v4"></path>
                                                <path d="M4 11h16"></path>
                                            </svg>
                                            <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
                                        </span>
                                        <span class="text-muted small">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                            </svg>
                                            <?php echo isset($post['comment_count']) ? $post['comment_count'] : '0'; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <div class="post-actions">
                                        <a href="<?php echo base_url('blog/view/' . $post['id']); ?>" class="btn btn-sm btn-primary">View</a>
                                        <a href="<?php echo base_url('blog/edit/' . $post['id']); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <button class="btn btn-sm btn-outline-danger delete-post" data-post-id="<?php echo $post['id']; ?>">Delete</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <p class="mb-0">You haven't created any blog posts yet. Click "Create New Post" to get started!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if (!empty($user_posts) && $total_pages > 1): ?>
                    <div class="pagination">
                        <ul class="pagination">
                            <?php if ($current_page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url('posts?page=' . ($current_page - 1)); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                                        Prev
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="<?php echo base_url('posts?page=' . $i); ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <?php if ($current_page < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url('posts?page=' . ($current_page + 1)); ?>">
                                        Next
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <!-- Create Post Modal (Same as in dashboard) -->
    <div class="modal modal-blur fade" id="blogModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Enter blog title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <div id="editor"></div>
                            <input type="hidden" name="content" id="quill-html">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Blog Image</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark w-100 publish_btn">Publish</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Post Confirmation Modal -->
    <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Are you sure?</div>
                    <div>This action cannot be undone. This will permanently delete your post.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete">Yes, delete post</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Quill editor
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        ['bold', 'italic', 'underline'],
                        ['link']
                    ]
                },
                placeholder: 'Write your blog content here...'
            });

            // Publish button event handler
            document.querySelector('.publish_btn').addEventListener('click', function () {
                var title = document.querySelector('input[placeholder="Enter blog title"]').value;
                var content = quill.root.innerHTML;
                var imageFile = document.querySelector('input[type="file"]').files[0];

                if (!title.trim()) {
                    alert('Please enter a title');
                    return;
                }

                if (!content.trim() || content === '<p><br></p>') {
                    alert('Please enter some content');
                    return;
                }

                var formData = new FormData();
                formData.append('title', title);
                formData.append('content', content);
                if (imageFile) {
                    formData.append('image', imageFile);
                }

                this.innerHTML = 'Publishing...';
                this.disabled = true;

                fetch('<?php echo site_url('api/create-blog-post'); ?>', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert('Error: ' + data.error);
                        } else {
                            alert('Blog post published successfully!');
                            var modal = bootstrap.Modal.getInstance(document.getElementById('blogModal'));
                            modal.hide();
                            window.location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while publishing the post');
                    })
                    .finally(() => {
                        this.innerHTML = 'Publish';
                        this.disabled = false;
                    });
            });

            // Search functionality
            const searchInput = document.getElementById('post-search');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const postCards = document.querySelectorAll('.post-card');
                
                postCards.forEach(card => {
                    const title = card.querySelector('.h5').textContent.toLowerCase();
                    const content = card.querySelector('.text-muted').textContent.toLowerCase();
                    
                    if (title.includes(searchTerm) || content.includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Delete post functionality
            const deleteButtons = document.querySelectorAll('.delete-post');
            let postIdToDelete = null;
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    postIdToDelete = this.getAttribute('data-post-id');
                    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                    deleteModal.show();
                });
            });
            
            document.getElementById('confirm-delete').addEventListener('click', function() {
                if (!postIdToDelete) return;
                
                fetch('<?php echo site_url('api/delete-post/'); ?>' + postIdToDelete, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert('Error: ' + (data.error || 'Failed to delete post'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the post');
                });
            });
        });
    </script>
</body>
</html>