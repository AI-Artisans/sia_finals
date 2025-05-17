<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> | BIT BY BIT</title>
    
    <!-- Meta tags -->
    <meta name="description" content="BIT BY BIT - A modern SaaS blog platform for technology enthusiasts and developers">
    <meta name="keywords" content="technology, programming, developers, tech community, coding">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>">
    
    <!-- Tailwind CSS via CDN (for development only) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Inter & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    
    <!-- Additional CSS -->
    <?= $this->renderSection('styles') ?>
</head>
<body class="min-h-screen flex flex-col bg-gray-50">

<header id="mainHeader" class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-gray-100 shadow-sm transition-colors duration-300">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    <a href="<?= site_url('/') ?>" class="flex items-center gap-3 text-2xl font-extrabold text-indigo-700 tracking-tight">
      <span class="inline-block align-middle">
        <svg width="32" height="24" viewBox="0 0 220 160" fill="none" class="h-8 w-8 md:h-10 md:w-10"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
      </span>
    </a>
    <?php if (session()->get('isLoggedIn')): ?>
      <div class="flex items-center gap-3 ml-auto">
        <a href="<?= site_url('profile') ?>" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-white/70 border border-indigo-100 text-indigo-700 font-semibold shadow hover:bg-indigo-50 transition-all">
          <i class="fas fa-user-circle text-xl"></i>
          <span class="hidden sm:inline">Profile</span>
        </a>
        <a href="<?= site_url('logout') ?>" class="px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow-lg hover:scale-105 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">Logout</a>
      </div>
    <?php else: ?>
      <nav class="hidden md:flex gap-8 text-lg font-medium">
        <a href="<?= site_url('/') ?>" class="hover:text-indigo-600 transition">Home</a>
        <a href="<?= site_url('posts') ?>" class="hover:text-indigo-600 transition">Articles</a>
        <a href="<?= site_url('about') ?>" class="hover:text-indigo-600 transition">About</a>
        <a href="<?= site_url('register') ?>" class="hover:text-indigo-600 transition">Join</a>
      </nav>
      <a href="<?= site_url('register') ?>" class="ml-4 px-6 py-2 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow-lg hover:scale-105 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">Get Started</a>
    <?php endif; ?>
  </div>
</header>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 border-l-4 border-green-400 p-4 relative" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700"><?= session()->getFlashdata('success') ?></p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="close-alert inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
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
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="close-alert inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

<!-- FOOTER -->
<footer class="bg-gradient-to-r from-indigo-900 via-purple-900 to-gray-900 text-gray-300 py-10 mt-12 backdrop-blur-lg">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
  <a href="<?= site_url('/') ?>" class="flex items-center gap-3 text-2xl font-extrabold text-indigo-700 tracking-tight">
      <span class="inline-block align-middle">
        <svg width="32" height="24" viewBox="0 0 220 160" fill="none" class="h-8 w-8 md:h-10 md:w-10"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
      </span>
    </a>
    <div class="flex gap-6 text-sm">
      <a href="<?= site_url('about') ?>" class="hover:text-white transition">About</a>
      <a href="<?= site_url('posts') ?>" class="hover:text-white transition">Articles</a>
      <a href="<?= site_url('register') ?>" class="hover:text-white transition">Join</a>
    </div>
    <div class="flex gap-4 mt-4 md:mt-0">
      <a href="#" class="hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56v14.91A4.56 4.56 0 0 1 19.44 24H4.56A4.56 4.56 0 0 1 0 19.44V4.56A4.56 4.56 0 0 1 4.56 0h14.88A4.56 4.56 0 0 1 24 4.56zM7.09 19.44h2.91V9.36H7.09zm1.45-11.09a1.69 1.69 0 1 1 0-3.38 1.69 1.69 0 0 1 0 3.38zm10.9 11.09h-2.91v-5.09c0-1.21-.02-2.77-1.69-2.77-1.69 0-1.95 1.32-1.95 2.68v5.18h-2.91V9.36h2.8v1.37h.04a3.07 3.07 0 0 1 2.76-1.52c2.95 0 3.5 1.94 3.5 4.47v5.76z"/></svg></a>
      <a href="#" class="hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.204-4.924 4.924 0 .386.045.763.127 1.124C7.691 8.095 4.066 6.13 1.64 3.161c-.423.722-.666 1.561-.666 2.475 0 1.708.87 3.216 2.188 4.099-.807-.026-1.566-.247-2.228-.616v.062c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.317 0-.626-.03-.928-.086.627 1.956 2.444 3.377 4.6 3.417-1.68 1.318-3.809 2.105-6.102 2.105-.396 0-.787-.023-1.175-.069 2.179 1.397 4.768 2.213 7.557 2.213 9.054 0 14.009-7.496 14.009-13.986 0-.21 0-.423-.016-.634.962-.689 1.797-1.56 2.457-2.548l-.047-.02z"/></svg></a>
      <a href="#" class="hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c-5.468 0-9.837 4.369-9.837 9.837 0 4.355 2.82 8.065 6.839 9.387.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.604-3.369-1.342-3.369-1.342-.454-1.154-1.11-1.461-1.11-1.461-.908-.62.069-.608.069-.608 1.004.07 1.532 1.032 1.532 1.032.892 1.529 2.341 1.088 2.91.832.092-.646.35-1.088.636-1.339-2.221-.253-4.555-1.111-4.555-4.944 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.272.098-2.65 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.748-1.025 2.748-1.025.546 1.378.202 2.397.1 2.65.64.699 1.028 1.592 1.028 2.683 0 3.842-2.337 4.687-4.566 4.936.359.309.678.919.678 1.852 0 1.336-.012 2.417-.012 2.747 0 .267.18.577.688.48C19.18 20.064 22 16.354 22 12c0-5.468-4.369-9.837-9.837-9.837z"/></svg></a>
    </div>
    <div class="text-xs mt-4">&copy; <?= date('Y') ?> Bit By Bit. All rights reserved.</div>
  </div>
</footer>

    <!-- JavaScript -->
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    
    <!-- Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    // Toggle mobile menu visibility
                    mobileMenu.classList.toggle('hidden');
                    
                    // Toggle menu icons
                    const openIcon = mobileMenuBtn.querySelector('.block');
                    const closeIcon = mobileMenuBtn.querySelector('.hidden');
                    
                    if (openIcon && closeIcon) {
                        openIcon.classList.toggle('hidden');
                        openIcon.classList.toggle('block');
                        closeIcon.classList.toggle('hidden');
                        closeIcon.classList.toggle('block');
                    }
                });
            }
            
            // User menu dropdown toggle
            const userMenu = document.getElementById('userMenu');
            const userMenuDropdown = document.getElementById('userMenuDropdown');
            
            if (userMenu && userMenuDropdown) {
                userMenu.addEventListener('click', function() {
                    userMenuDropdown.classList.toggle('hidden');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userMenu.contains(event.target) && !userMenuDropdown.contains(event.target)) {
                        userMenuDropdown.classList.add('hidden');
                    }
                });
            }
            
            // Alert close buttons
            const closeButtons = document.querySelectorAll('.close-alert');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    this.closest('[role="alert"]').remove();
                });
            });
        });
    </script>
    
    <!-- Additional Scripts -->
    <?= $this->renderSection('scripts') ?>

<script>
// Header color change on scroll
window.addEventListener('scroll', function() {
  const header = document.getElementById('mainHeader');
  if (window.scrollY > 40) {
    header.classList.add('bg-indigo-900', 'text-white', 'border-indigo-900');
    header.classList.remove('bg-white/80', 'border-gray-100');
  } else {
    header.classList.remove('bg-indigo-900', 'text-white', 'border-indigo-900');
    header.classList.add('bg-white/80', 'border-gray-100');
  }
});
</script>
</body>
</html> 