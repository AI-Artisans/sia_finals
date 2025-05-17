<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Dashboard | Admin' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tabler CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
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

        .sidebar a:hover {
            background-color: #2f2f2f;
        }

        .card {
            border-radius: 16px;
        }
    </style>
</head>

<body>

    <!-- Top Navigation Bar -->
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
            <h1 class="navbar-brand d-none d-md-flex">
                <span class="logo-text"><?= $title ?? 'Admin Panel' ?></span>
            </h1>
        </div>
    </header>

    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-md sidebar">
            <div class="container-fluid">
                <h2 class="mt-4 mb-4 ms-3">Menu</h2>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                            <span class="nav-link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('posts') ?>">
                            <span class="nav-link-title">Posts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('users') ?>">
                            <span class="nav-link-title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="btn btn-outline-light w-100" href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="page-wrapper">
            <div class="container-xl mt-4">
                <?= isset($content) ? $content : '' ?>
            </div>
        </main>
    </div>

    <!-- Tabler JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js"></script>
</body>

</html>
