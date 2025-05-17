<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Dashboard | Banchoi'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Inria Sans", sans-serif;
            background-color: #F4F4F4;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #000;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .sidebar {
            background-color: #3D3A3A;
            color: white;
        }

        .sidebar a {
            color: white;
        }

        .card {
            border-radius: 16px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
            <h1 class="navbar-brand d-none d-md-flex">
                <span class="logo-text">Banchoi Dashboard</span>
            </h1>
        </div>
    </header>

    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-md sidebar">
            <div class="container-fluid">
                <h2 class="mt-4 mb-4 ms-3">Menu</h2>
                <ul class="navbar-nav">
                    <!-- <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dashboard'); ?>"><span class="nav-link-title">Dashboard</span></a></li> -->
                    <li class="nav-item"><a class="nav-link"
                            href="<?php echo site_url('dashboard/your_blogs'); ?>"><span class="nav-link-title">Your
                                Blogs</span></a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="<?php echo site_url('dashboard/create_blog'); ?>"><span class="nav-link-title">Create
                                Blog</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link"
                            href="<?php echo site_url('dashboard/statistics'); ?>"><span
                                class="nav-link-title">Statistics</span></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dashboard/all_blogs'); ?>"><span
                                class="nav-link-title">All Blogs</span></a></li>
                </ul>
                <div class="logout-section mt-auto p-3">
                    <a href="<?php echo site_url('logout'); ?>" class="btn btn-outline-light w-100">Logout</a>
                </div>

            </div>
        </aside>

        <main class="page-wrapper">
            <div class="container-xl mt-4">
                <?php $this->load->view($page); ?>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
</body>

</html>