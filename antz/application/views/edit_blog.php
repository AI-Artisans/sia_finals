<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Blog Post - Banchoi</title>
    <link href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet" />
    <!-- Include Quill editor styles -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
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

        #editor-container {
            height: 400px;
        }

        .ql-editor {
            min-height: 350px;
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
                                <li class="breadcrumb-item"><a href="<?php echo base_url('blog/view/'.$post['id']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>

                        <h1 class="mb-4">Edit Blog Post</h1>

                        <div id="updateStatus"></div>

                        <form id="editPostForm" enctype="multipart/form-data">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                            </div>
                            
                            <?php if (!empty($post['image_path'])): ?>
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <div>
                                        <img src="<?php echo base_url($post['image_path']); ?>" class="img-fluid rounded" style="max-height: 200px;" alt="Current image">
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Change Image (Optional)</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div class="form-text">Leave empty to keep the current image.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="editor-container" class="form-label">Content</label>
                                <div id="editor-container"><?php echo $post['content']; ?></div>
                                <input type="hidden" name="content" id="hidden-content">
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="<?php echo base_url('blog/view/'.$post['id']); ?>" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill editor
            const quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        [{ 'script': 'sub' }, { 'script': 'super' }],
                        [{ 'indent': '-1' }, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }],
                        [{ 'size': ['small', false, 'large', 'huge'] }],
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'font': [] }],
                        [{ 'align': [] }],
                        ['clean'],
                        ['link', 'image']
                    ]
                },
                placeholder: 'Write your blog post here...'
            });

            // Handle form submission
            document.getElementById('editPostForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get the content from Quill editor
                document.getElementById('hidden-content').value = quill.root.innerHTML;
                
                const formData = new FormData(this);
                
                // Show loading indicator
                document.getElementById('updateStatus').innerHTML = `
                    <div class="alert alert-info">
                        Updating your post... Please wait.
                    </div>`;
                
                // Submit the form
                fetch('<?php echo site_url('api/update-post'); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('updateStatus').innerHTML = `
                            <div class="alert alert-danger">
                                ${data.error}
                            </div>`;
                    } else {
                        document.getElementById('updateStatus').innerHTML = `
                            <div class="alert alert-success">
                                Post updated successfully!
                            </div>`;
                        
                        // Redirect back to post view after 1 second
                        setTimeout(function() {
                            window.location.href = '<?php echo base_url('blog/view/'.$post['id']); ?>';
                        }, 1000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('updateStatus').innerHTML = `
                        <div class="alert alert-danger">
                            An error occurred while updating your post. Please try again.
                        </div>`;
                });
            });
        });
    </script>
</body>

</html>