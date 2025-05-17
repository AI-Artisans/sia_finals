<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> | BIT BY BIT Admin</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-900">

<!-- Admin Navbar (styled like main.php) -->
<header class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-gray-100 shadow-sm">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center gap-3 text-2xl font-extrabold text-white tracking-tight">
      <span class="inline-block align-middle">
        <svg width="32" height="24" viewBox="0 0 220 160" fill="none" class="h-8 w-8 md:h-10 md:w-10"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
      </span>
      <span class="font-mono">BIT BY BIT <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded ml-2 align-middle font-bold">ADMIN</span></span>
    </a>
    <nav class="hidden md:flex gap-8 text-lg font-medium">
      <a href="<?= site_url('admin/dashboard') ?>" class="text-white hover:text-indigo-200 transition">Dashboard</a>
      <a href="<?= site_url('admin/users') ?>" class="text-white hover:text-indigo-200 transition">Users</a>
      <a href="<?= site_url('admin/posts') ?>" class="text-white hover:text-indigo-200 transition">Posts</a>
      <a href="<?= site_url('admin/categories') ?>" class="text-white hover:text-indigo-200 transition">Categories</a>
    </nav>
    <a href="<?= site_url('logout') ?>" class="ml-4 px-6 py-2 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow-lg hover:scale-105 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 flex items-center gap-2"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</header>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
  <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
    <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-sm w-full text-center relative animate-fade-in">
      <button onclick="document.getElementById('successModal').style.display='none'" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-xl font-bold focus:outline-none">&times;</button>
      <div class="flex flex-col items-center">
        <svg class="h-10 w-10 text-green-400 mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <div class="text-green-700 text-base font-semibold mb-1">Success</div>
        <div class="text-gray-700 text-sm mb-2"><?= session()->getFlashdata('success') ?></div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-50 border-l-4 border-red-400 p-4 relative" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700"><?= session()->getFlashdata('error') ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Main Content -->
<main class="flex-grow">
    <?= $this->renderSection('content') ?>
</main>

<!-- Admin Footer (styled like main.php) -->
<footer class="bg-gradient-to-r from-indigo-900 via-purple-900 to-gray-900 text-gray-300 py-10 mt-12 backdrop-blur-lg">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
    <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center gap-3 text-2xl font-extrabold text-indigo-700 tracking-tight">
      <span class="inline-block align-middle">
        <svg width="32" height="24" viewBox="0 0 220 160" fill="none" class="h-8 w-8 md:h-10 md:w-10"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
      </span>
      <span class="font-mono">BIT BY BIT <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded ml-2 align-middle font-bold">ADMIN</span></span>
    </a>
    <div class="flex gap-6 text-sm">
      <a href="<?= site_url('admin/dashboard') ?>" class="hover:text-white transition">Dashboard</a>
      <a href="<?= site_url('admin/users') ?>" class="hover:text-white transition">Users</a>
      <a href="<?= site_url('admin/posts') ?>" class="hover:text-white transition">Posts</a>
      <a href="<?= site_url('admin/categories') ?>" class="hover:text-white transition">Categories</a>
    </div>
    <div class="text-xs mt-4 md:mt-0">&copy; <?= date('Y') ?> Bit By Bit Admin. All rights reserved.</div>
  </div>
</footer>

<!-- Add fade-in animation -->
<style>
@keyframes fade-in {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}
.animate-fade-in {
  animation: fade-in 0.2s ease;
}
</style>

<?= $this->renderSection('scripts') ?>
</body>
</html> 