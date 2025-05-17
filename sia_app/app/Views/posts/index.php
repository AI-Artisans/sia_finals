<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Articles<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- HERO SECTION -->
<section class="relative bg-gradient-to-br from-indigo-900 via-indigo-700 to-purple-900 py-14 md:py-20 px-4 sm:px-6 text-center flex flex-col items-center justify-center min-h-[30vh] md:min-h-[40vh] mb-8 md:mb-10 overflow-hidden">
  <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
    <svg class="absolute left-1/2 top-0 -translate-x-1/2 w-[150vw] max-w-none h-auto" style="min-width:1200px;" width="1200" height="400" viewBox="0 0 1200 400" fill="none">
      <defs>
        <linearGradient id="circuit2" x1="0" y1="0" x2="1200" y2="400" gradientUnits="userSpaceOnUse">
          <stop stop-color="#a5b4fc" />
          <stop offset="1" stop-color="#f472b6" />
        </linearGradient>
      </defs>
      <rect x="0" y="0" width="1200" height="400" fill="url(#circuit2)" opacity="0.1"/>
      <g stroke="url(#circuit2)" stroke-width="2">
        <path d="M100 100 Q200 200 300 100 T500 100 T700 100 T900 100" />
        <path d="M200 300 Q400 200 600 300 T1000 300" />
        <circle cx="600" cy="200" r="80" fill="none" />
      </g>
    </svg>
  </div>
  <div class="relative z-10 max-w-2xl mx-auto w-full">
    <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold text-white leading-tight mb-3 md:mb-4 drop-shadow-lg break-words font-mono">Tech Blogging & Insights</h1>
    <p class="text-base sm:text-xl text-indigo-100 mb-4 md:mb-6 break-words">Write, read, and connect with the best minds in tech. <span class='font-mono bg-white/10 px-2 rounded'>Share your story</span> or <span class='font-mono bg-white/10 px-2 rounded'>explore articles</span> from our community.</p>
    <div class="flex flex-col gap-3 sm:flex-row sm:gap-4 justify-center w-full">
      <form action="<?= site_url('posts') ?>" method="get" class="flex w-full sm:w-auto">
        <input type="text" name="search" placeholder="Search articles..." value="<?= isset($_GET['search']) ? esc($_GET['search']) : '' ?>" class="px-4 py-3 rounded-l-lg bg-white/60 backdrop-blur border border-indigo-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full sm:w-64 text-sm">
        <button class="px-6 py-3 bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold rounded-r-lg shadow hover:scale-105 transition-all text-sm">Search</button>
      </form>
      <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= site_url('posts/create') ?>" class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow hover:scale-105 transition-all text-sm w-full sm:w-auto">
          <i class="fas fa-pencil-alt mr-2"></i> Write Article
        </a>
      <?php else: ?>
        <a href="<?= site_url('login') ?>" class="inline-flex items-center justify-center px-6 py-3 rounded-lg border-2 border-indigo-200 text-indigo-100 font-semibold bg-white/10 hover:bg-white/20 hover:text-white transition shadow text-sm w-full sm:w-auto">
          <i class="fas fa-sign-in-alt mr-2"></i> Login to Write
        </a>
      <?php endif; ?>
    </div>
    <div class="flex flex-wrap justify-center gap-2 mt-5 md:mt-6">
      <a href="<?= site_url('posts') ?>" class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-semibold text-xs md:text-sm shadow hover:scale-105 transition-all font-mono <?= !isset($_GET['category']) ? 'ring-2 ring-indigo-400' : '' ?>">All Categories</a>
      <a href="<?= site_url('posts?category=programming') ?>" class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-indigo-200 text-indigo-700 font-semibold text-xs md:text-sm hover:bg-indigo-50 transition font-mono <?= (isset($_GET['category']) && $_GET['category'] == 'programming') ? 'ring-2 ring-indigo-400' : '' ?>">Programming</a>
      <a href="<?= site_url('posts?category=web-development') ?>" class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-pink-200 text-pink-700 font-semibold text-xs md:text-sm hover:bg-pink-50 transition font-mono <?= (isset($_GET['category']) && $_GET['category'] == 'web-development') ? 'ring-2 ring-pink-400' : '' ?>">Web Development</a>
      <a href="<?= site_url('posts?category=data-science') ?>" class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-amber-200 text-amber-700 font-semibold text-xs md:text-sm hover:bg-amber-50 transition font-mono <?= (isset($_GET['category']) && $_GET['category'] == 'data-science') ? 'ring-2 ring-amber-400' : '' ?>">Data Science</a>
      <a href="<?= site_url('posts?category=devops') ?>" class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-green-200 text-green-700 font-semibold text-xs md:text-sm hover:bg-green-50 transition font-mono <?= (isset($_GET['category']) && $_GET['category'] == 'devops') ? 'ring-2 ring-green-400' : '' ?>">DevOps</a>
      <a href="<?= site_url('posts?category=ai-ml') ?>" class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-purple-200 text-purple-700 font-semibold text-xs md:text-sm hover:bg-purple-50 transition font-mono <?= (isset($_GET['category']) && $_GET['category'] == 'ai-ml') ? 'ring-2 ring-purple-400' : '' ?>">AI & Machine Learning</a>
    </div>
  </div>
</section>

<!-- POPULAR TAGS BAR -->
<div class="max-w-5xl mx-auto px-4 mb-8">
  <div class="flex gap-3 overflow-x-auto pb-2 snap-x">
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-green-200 via-green-100 to-green-50 text-green-700 text-xs font-mono">#javascript</span>
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-blue-200 via-blue-100 to-blue-50 text-blue-700 text-xs font-mono">#typescript</span>
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-pink-200 via-pink-100 to-pink-50 text-pink-700 text-xs font-mono">#ai</span>
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-amber-200 via-amber-100 to-amber-50 text-amber-700 text-xs font-mono">#cloud</span>
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-indigo-200 via-indigo-100 to-indigo-50 text-indigo-700 text-xs font-mono">#devops</span>
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-purple-200 via-purple-100 to-purple-50 text-purple-700 text-xs font-mono">#blogging</span>
    <span class="px-3 py-1 rounded-full bg-gradient-to-r from-gray-200 via-gray-100 to-gray-50 text-gray-700 text-xs font-mono">#career</span>
  </div>
</div>

<!-- WRITE YOUR FIRST ARTICLE CTA -->
<div class="max-w-5xl mx-auto px-4 mb-8">
  <div class="bg-gradient-to-r from-indigo-50 via-white to-pink-50 border border-indigo-100 rounded-xl shadow flex flex-col md:flex-row items-center p-6 gap-6">
    <div class="flex-1">
      <h3 class="text-xl font-bold mb-2 font-mono">Ready to share your story?</h3>
      <p class="text-gray-600 mb-3 text-sm">Start your first blog post and inspire the tech community. Your experience matters!</p>
      <a href="<?= site_url('posts/create') ?>" class="inline-block px-6 py-3 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow hover:scale-105 transition-all text-base">Write Your First Article</a>
    </div>
    <div class="flex-1 flex justify-center">
      <svg width="120" height="80" viewBox="0 0 120 80" fill="none"><rect x="10" y="20" width="100" height="40" rx="8" fill="#fff" fill-opacity=".12"/><rect x="18" y="30" width="84" height="8" rx="2" fill="#a5b4fc"/><rect x="18" y="44" width="60" height="6" rx="2" fill="#fbbf24"/><rect x="18" y="54" width="84" height="6" rx="2" fill="#f472b6"/></svg>
    </div>
  </div>
</div>

<!-- FEATURED BLOGGERS BAR -->
<div class="max-w-5xl mx-auto px-4 mb-8">
  <div class="flex gap-6 overflow-x-auto pb-2 snap-x">
    <div class="min-w-[180px] bg-gradient-to-br from-indigo-50 to-white rounded-xl shadow flex flex-col items-center p-4 mr-2">
      <svg class="w-8 h-8 mb-2 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
      <div class="font-mono text-base font-bold text-gray-900">Jane Smith</div>
      <div class="text-xs text-indigo-600 font-mono mb-1">@janesmith</div>
      <span class="inline-block bg-indigo-100 text-indigo-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: JavaScript</span>
      <span class="inline-block bg-white/80 text-indigo-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-indigo-100">Latest: <span class="font-semibold">The Future of JS Frameworks</span></span>
    </div>
    <div class="min-w-[180px] bg-gradient-to-br from-pink-50 to-white rounded-xl shadow flex flex-col items-center p-4 mr-2">
      <svg class="w-8 h-8 mb-2 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
      <div class="font-mono text-base font-bold text-gray-900">Alex Lee</div>
      <div class="text-xs text-pink-600 font-mono mb-1">@alexlee</div>
      <span class="inline-block bg-pink-100 text-pink-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: AI</span>
      <span class="inline-block bg-white/80 text-pink-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-pink-100">Latest: <span class="font-semibold">AI in Everyday Life</span></span>
    </div>
    <div class="min-w-[180px] bg-gradient-to-br from-amber-50 to-white rounded-xl shadow flex flex-col items-center p-4 mr-2">
      <svg class="w-8 h-8 mb-2 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
      <div class="font-mono text-base font-bold text-gray-900">Samira Patel</div>
      <div class="text-xs text-amber-600 font-mono mb-1">@samirapatel</div>
      <span class="inline-block bg-amber-100 text-amber-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: Cloud</span>
      <span class="inline-block bg-white/80 text-amber-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-amber-100">Latest: <span class="font-semibold">Cloud Native Patterns</span></span>
    </div>
    <div class="min-w-[180px] bg-gradient-to-br from-green-50 to-white rounded-xl shadow flex flex-col items-center p-4 mr-2">
      <svg class="w-8 h-8 mb-2 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
      <div class="font-mono text-base font-bold text-gray-900">Chris Wong</div>
      <div class="text-xs text-green-600 font-mono mb-1">@chriswong</div>
      <span class="inline-block bg-green-100 text-green-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: DevOps</span>
      <span class="inline-block bg-white/80 text-green-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-green-100">Latest: <span class="font-semibold">CI/CD for Teams</span></span>
    </div>
  </div>
</div>

<!-- BLOGGING TESTIMONIAL -->
<div class="max-w-5xl mx-auto px-4 mb-8">
  <div class="bg-white/60 rounded-lg p-4 text-sm italic text-indigo-700 border-l-4 border-indigo-400">“Blogging here gave me a voice in the tech world and helped me grow my network!”<br><span class="not-italic font-bold text-indigo-900">— Sarah, DevOps Blogger</span></div>
</div>

<!-- FEATURED POST -->
<div class="max-w-2xl md:max-w-5xl mx-auto mb-8 md:mb-12 px-2 sm:px-4">
  <div class="bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
    <div class="w-full md:w-1/2">
      <img src="https://via.placeholder.com/800x600?text=Featured+Article" class="w-full h-48 sm:h-64 md:h-full object-cover" alt="Featured Article">
    </div>
    <div class="w-full md:w-1/2 p-4 sm:p-6 md:p-8 flex flex-col justify-between">
      <div>
        <div class="flex flex-col sm:flex-row sm:justify-between mb-2 gap-1 sm:gap-0">
          <span class="px-3 py-1 rounded-full bg-gradient-to-r from-indigo-200 via-pink-200 to-purple-200 text-indigo-700 text-xs font-bold w-max">Featured</span>
          <small class="text-gray-500">May 9, 2025</small>
        </div>
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold mb-2 break-words">The Future of Web Development: Trends to Watch in 2025</h2>
        <p class="text-gray-600 mb-3 md:mb-4 text-sm md:text-base break-words">Explore the emerging technologies and frameworks that are shaping the future of web development. From WebAssembly to Edge Computing, discover what's driving innovation in the industry...</p>
      </div>
      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mt-2 md:mt-4 gap-2 sm:gap-0">
        <div class="flex items-center">
          <img src="https://via.placeholder.com/40" class="h-8 w-8 sm:h-10 sm:w-10 rounded-full mr-2 sm:mr-3" alt="Author Avatar">
          <div>
            <div class="font-semibold text-xs sm:text-sm">Alex Morgan</div>
            <div class="text-xs text-gray-500">Senior Web Developer</div>
          </div>
        </div>
        <div class="flex gap-3 text-gray-500 text-xs sm:text-base">
          <span class="flex items-center"><i class="far fa-heart text-pink-500 mr-1"></i> 248</span>
          <span class="flex items-center"><i class="far fa-comment text-indigo-500 mr-1"></i> 42</span>
        </div>
      </div>
      <a href="<?= site_url('posts/1') ?>" class="mt-4 sm:mt-6 inline-block px-6 py-2 sm:px-8 sm:py-3 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow hover:scale-105 transition-all text-sm sm:text-base w-full sm:w-auto text-center">Read Article</a>
    </div>
  </div>
</div>

<!-- FEATURED/RECENT ARTICLES - daily.dev inspired horizontal scroll -->
<div class="max-w-7xl mx-auto px-4 mb-12">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-900 font-mono tracking-tight">Recent Articles</h2>
    <a href="<?= site_url('posts/create') ?>" class="inline-flex items-center px-5 py-2 rounded-full bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow hover:scale-105 transition-all text-sm">
      <i class="fas fa-pencil-alt mr-2"></i> Write Article
    </a>
  </div>
  <div class="flex gap-8 overflow-x-auto pb-4 snap-x scrollbar-thin scrollbar-thumb-indigo-200 scrollbar-track-white">
    <?php if (!empty($posts) && is_array($posts)): ?>
      <?php foreach ($posts as $post): ?>
        <div class="min-w-[340px] max-w-xs bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-indigo-400 transition-all duration-200 flex-shrink-0 snap-center flex flex-col">
          <a href="<?= site_url('posts/' . $post['id']) ?>">
            <img src="<?= $post['featured_image'] ? base_url($post['featured_image']) : 'https://via.placeholder.com/400x200?text=No+Image' ?>" class="w-full h-44 object-cover rounded-t-2xl" alt="Article Image">
          </a>
          <div class="p-6 flex flex-col flex-1">
            <span class="bg-gradient-to-r from-indigo-200 via-pink-200 to-purple-200 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full mb-2 w-max font-mono tracking-wide">
              <?= esc(ucwords(str_replace('-', ' ', $post['category']))) ?>
            </span>
            <h4 class="font-bold text-lg mb-2 hover:underline font-mono">
              <a href="<?= site_url('posts/' . $post['id']) ?>"><?= esc($post['title']) ?></a>
            </h4>
            <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-1 font-mono">
              <?= esc($post['summary']) ?>
            </p>
            <div class="flex items-center mt-auto gap-3">
              <img src="https://api.dicebear.com/7.x/identicon/svg?seed=<?= urlencode($post['author_name'] ?? 'unknown') ?>" class="h-8 w-8 rounded-full border-2 border-indigo-200 bg-white" alt="Author">
              <span class="text-xs text-gray-700 font-mono">By <?= esc($post['author_name'] ?? 'Unknown Author') ?></span>
              <span class="text-xs text-gray-400 font-mono ml-auto">
                <?= date('M j, Y', strtotime($post['date_created'] ?? $post['created_at'] ?? 'now')) ?>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-span-full text-center py-12 text-gray-500 font-mono text-lg">
        No articles found. Be the first to <a href="<?= site_url('posts/create') ?>" class="underline text-indigo-600">write one</a>!
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- PAGINATION -->
<nav class="mt-10 md:mt-12 flex justify-center">
  <ul class="inline-flex items-center gap-2">
    <li>
      <a class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-gray-200 text-gray-400 cursor-not-allowed" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li><a class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow" href="#">1</a></li>
    <li><a class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-gray-200 text-gray-700 hover:bg-indigo-50 transition" href="#">2</a></li>
    <li><a class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-gray-200 text-gray-700 hover:bg-indigo-50 transition" href="#">3</a></li>
    <li>
      <a class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-gray-200 text-gray-700 hover:bg-indigo-50 transition" href="#">Next</a>
    </li>
  </ul>
</nav>
<?= $this->endSection() ?> 