<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client Dashboard</title>
    <link href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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

        .total_posts,
        .total_comments {
            font-size: 30px;
        }

        .create_post {
            background-color: #3D3A3A;
            height: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .view_post {
            background-color: #ffffff;
            color: #000000;
            height: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .publish_btn {
            background-color: #3D3A3A;
        }

        #editor {
            height: 200px;
            background: white;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .ql-toolbar {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom: none !important;
            z-index: 1;
            position: relative;
        }

        .ql-container {
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            font-size: 16px;
        }

        .search {
            height: 50px;
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
                        <h2 class="fw-bold text-black mb-4">Welcome back, <?php echo htmlspecialchars($username); ?>!</h2>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body position-relative">
                                        <h6 class="text-uppercase text-muted small">Total Posts</h6>
                                        <h3 class="total_posts fw-bold mt-2"><?php echo isset($total_posts) ? $total_posts : 0; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body position-relative">
                                        <h6 class="text-uppercase text-muted small">Total Comments</h6>
                                        <h3 class="total_comments fw-bold mt-2"><?php echo isset($total_comments) ? $total_comments : 0; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row g-2 my-4">
                    <div class="col-12 col-md-6">
                        <a href="#" class="create_post btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#blogModal">Create New Post</a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="<?php echo base_url('posts'); ?>" class="view_post btn btn-secondary w-100">View Your Posts</a>
                    </div>
                </div>

                <!-- Search -->
                <div class="row mb-4">
                    <div class="col-12">
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
                            <input type="text" class="search form-control" placeholder="Search..."/>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Blog Cards -->
                <div class="row my-4">
                    <?php if (!empty($recent_posts)): ?>
                        <?php foreach ($recent_posts as $post): ?>
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                            <a href="<?php echo base_url('blog/view/' . $post['id']); ?>" class="text-decoration-none text-dark">
                                <div class="card shadow-sm h-100">

                                    <?php if (!empty($post['image_path'])): ?>
                                        <img src="<?php echo base_url($post['image_path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                    <?php else: ?>
                                        <img src="https://picsum.photos/600/300?random=<?php echo $post['id']; ?>" class="card-img-top" alt="Default Image">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h1 class="mb-2"><?php echo htmlspecialchars($post['title']); ?></h1>
                                        <h2 class="h6 text-muted"><?php echo substr(strip_tags($post['content']), 0, 100) . '...'; ?></h2>
                                        <small class="text-muted">Created on: <?php echo date('M d, Y', strtotime($post['created_at'])); ?></small>
                                    </div>
                                </div>
                                    </a>
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
            </div>
        </main>

        <!-- Modal -->
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
                        <button type="button" class="publish_btn btn btn-dark w-100">Publish</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
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

                document.querySelector('.publish_btn').addEventListener('click', function () {
                    var title = document.querySelector('input[placeholder="Enter blog title"]').value;
                    var content = document.querySelector('.ql-editor').innerHTML;
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
            });
        </script>
</body>

</html>
