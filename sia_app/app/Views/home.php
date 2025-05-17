<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>




<!-- LIVE ACTIVITY TICKER -->
<div class="w-full bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white text-sm py-2 px-6 flex items-center gap-4 animate-pulse">
  <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path d="M12 6v6l4 2" stroke-width="2"/></svg>
  <span>Live: 3 new articles today • 1,200 active members now • Trending: AI, Cloud, TypeScript</span>
</div>

<!-- HERO SECTION WITH ANIMATED BACKGROUND -->
<section class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-indigo-700 to-purple-900 py-28 px-6 text-center flex flex-col items-center justify-center min-h-[60vh]">
  <!-- Animated SVG background -->
  <div class="absolute inset-0 pointer-events-none z-0">
    <svg class="absolute left-1/2 top-0 -translate-x-1/2 opacity-30 animate-pulse" width="1200" height="400" viewBox="0 0 1200 400" fill="none">
      <defs>
        <linearGradient id="circuit" x1="0" y1="0" x2="1200" y2="400" gradientUnits="userSpaceOnUse">
          <stop stop-color="#a5b4fc" />
          <stop offset="1" stop-color="#f472b6" />
        </linearGradient>
      </defs>
      <rect x="0" y="0" width="1200" height="400" fill="url(#circuit)" opacity="0.1"/>
      <g stroke="url(#circuit)" stroke-width="2">
        <path d="M100 100 Q200 200 300 100 T500 100 T700 100 T900 100" />
        <path d="M200 300 Q400 200 600 300 T1000 300" />
        <circle cx="600" cy="200" r="80" fill="none" />
      </g>
    </svg>
  </div>
  <div class="relative z-10 max-w-3xl mx-auto">
    <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
      <span class="block">Tech Blogging,</span>
      <span class="block bg-gradient-to-r from-indigo-400 via-pink-400 to-purple-400 bg-clip-text text-transparent animate-gradient-x font-mono">Written by You.</span>
    </h1>
    <p class="text-2xl text-indigo-100 mb-10">A modern platform for developers, engineers, and tech enthusiasts to <span class="font-mono bg-white/10 px-2 rounded">write</span>, <span class="font-mono bg-white/10 px-2 rounded">read</span>, and <span class="font-mono bg-white/10 px-2 rounded">connect</span> through blogging.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?= site_url('register') ?>" class="inline-flex items-center px-10 py-4 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow-xl hover:scale-105 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 text-lg">Start Blogging Free</a>
      <a href="<?= site_url('posts') ?>" class="inline-flex items-center px-10 py-4 rounded-lg border-2 border-indigo-200 text-indigo-100 font-semibold bg-white/10 hover:bg-white/20 hover:text-white transition text-lg backdrop-blur">Explore Blogs</a>
    </div>
  </div>
</section>

<!-- WHY BLOG ON BIT BY BIT -->
<section class="py-16 bg-gradient-to-br from-indigo-50 via-white to-pink-50 border-b border-gray-100">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-12 px-6">
    <div class="flex-1 flex justify-center mb-8 md:mb-0">
      <svg width="220" height="160" viewBox="0 0 220 160" fill="none"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
    </div>
    <div class="flex-1">
      <h2 class="text-2xl font-bold mb-4 text-gray-900 font-mono">Why Blog on Bit By Bit?</h2>
      <ul class="mb-6 space-y-2">
        <li><span class="font-mono text-green-600">&lt;Write/&gt;</span> Share your tech stories, tutorials, and opinions</li>
        <li><span class="font-mono text-yellow-600">#Read</span> Discover curated articles from real engineers</li>
        <li><span class="font-mono text-pink-600">@Connect</span> Grow your network and get feedback</li>
        <li><span class="font-mono text-blue-600">★</span> Build your portfolio and reputation</li>
      </ul>
      <div class="bg-white/60 rounded-lg p-4 text-sm italic text-indigo-700 border-l-4 border-indigo-400 mb-2">“Writing here helped me land a job and connect with amazing devs!”<br><span class="not-italic font-bold text-indigo-900">— Priya, Full Stack Blogger</span></div>
      <div class="mt-4">
        <div class="font-bold text-gray-700 mb-2">Sample Blog Titles:</div>
        <ul class="text-sm text-gray-600 font-mono grid grid-cols-1 sm:grid-cols-2 gap-2">
          <li>How I Built My First API in Go</li>
          <li>5 CSS Tricks for Responsive Layouts</li>
          <li>Why I Switched to TypeScript</li>
          <li>Debugging Like a Pro: My Workflow</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED AUTHORS -->
<section class="py-12 bg-white/80 backdrop-blur border-b border-gray-100">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-xl font-bold mb-6 text-gray-900 font-mono">Featured Authors</h2>
    <div class="flex gap-8 overflow-x-auto pb-2 snap-x">
      <!-- Author 1 -->
      <div class="min-w-[220px] bg-gradient-to-br from-indigo-50 to-white rounded-xl shadow flex flex-col items-center p-6 mr-2 group hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-indigo-400 transition-all duration-200 relative">
        <div class="absolute top-4 right-4 opacity-20 pointer-events-none">
          <svg width="32" height="32" viewBox="0 0 32 32"><rect x="4" y="8" width="24" height="12" rx="3" fill="#a5b4fc"/></svg>
        </div>
        <img src="https://via.placeholder.com/64" class="h-16 w-16 rounded-full mb-2 border-2 border-indigo-400" alt="Author">
        <div class="font-mono text-lg font-bold text-gray-900">Jane Smith</div>
        <div class="text-xs text-indigo-600 font-mono mb-1">@janesmith</div>
        <span class="inline-block bg-indigo-100 text-indigo-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: JavaScript, React</span>
        <span class="inline-block bg-white/80 text-indigo-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-indigo-100">Latest: <span class="font-semibold">The Future of JS Frameworks</span></span>
        <div class="flex items-center gap-1 text-xs text-gray-500 font-mono"><svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 17V7a2 2 0 012-2h12a2 2 0 012 2v10"/><path d="M16 21v-2a2 2 0 00-2-2H10a2 2 0 00-2 2v2"/></svg> Blogger</div>
      </div>
      <!-- Author 2 -->
      <div class="min-w-[220px] bg-gradient-to-br from-pink-50 to-white rounded-xl shadow flex flex-col items-center p-6 mr-2 group hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-pink-400 transition-all duration-200 relative">
        <div class="absolute top-4 right-4 opacity-20 pointer-events-none">
          <svg width="32" height="32" viewBox="0 0 32 32"><rect x="4" y="8" width="24" height="12" rx="3" fill="#f472b6"/></svg>
        </div>
        <img src="https://via.placeholder.com/64" class="h-16 w-16 rounded-full mb-2 border-2 border-pink-400" alt="Author">
        <div class="font-mono text-lg font-bold text-gray-900">Alex Lee</div>
        <div class="text-xs text-pink-600 font-mono mb-1">@alexlee</div>
        <span class="inline-block bg-pink-100 text-pink-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: AI, Python</span>
        <span class="inline-block bg-white/80 text-pink-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-pink-100">Latest: <span class="font-semibold">AI in Everyday Life</span></span>
        <div class="flex items-center gap-1 text-xs text-gray-500 font-mono"><svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 17V7a2 2 0 012-2h12a2 2 0 012 2v10"/><path d="M16 21v-2a2 2 0 00-2-2H10a2 2 0 00-2 2v2"/></svg> Blogger</div>
      </div>
      <!-- Author 3 -->
      <div class="min-w-[220px] bg-gradient-to-br from-amber-50 to-white rounded-xl shadow flex flex-col items-center p-6 mr-2 group hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-amber-400 transition-all duration-200 relative">
        <div class="absolute top-4 right-4 opacity-20 pointer-events-none">
          <svg width="32" height="32" viewBox="0 0 32 32"><rect x="4" y="8" width="24" height="12" rx="3" fill="#fbbf24"/></svg>
        </div>
        <img src="https://via.placeholder.com/64" class="h-16 w-16 rounded-full mb-2 border-2 border-amber-400" alt="Author">
        <div class="font-mono text-lg font-bold text-gray-900">Samira Patel</div>
        <div class="text-xs text-amber-600 font-mono mb-1">@samirapatel</div>
        <span class="inline-block bg-amber-100 text-amber-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: Cloud, DevOps</span>
        <span class="inline-block bg-white/80 text-amber-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-amber-100">Latest: <span class="font-semibold">Cloud Native Patterns</span></span>
        <div class="flex items-center gap-1 text-xs text-gray-500 font-mono"><svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 17V7a2 2 0 012-2h12a2 2 0 012 2v10"/><path d="M16 21v-2a2 2 0 00-2-2H10a2 2 0 00-2 2v2"/></svg> Blogger</div>
      </div>
      <!-- Author 4 -->
      <div class="min-w-[220px] bg-gradient-to-br from-green-50 to-white rounded-xl shadow flex flex-col items-center p-6 mr-2 group hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-green-400 transition-all duration-200 relative">
        <div class="absolute top-4 right-4 opacity-20 pointer-events-none">
          <svg width="32" height="32" viewBox="0 0 32 32"><rect x="4" y="8" width="24" height="12" rx="3" fill="#34d399"/></svg>
        </div>
        <img src="https://via.placeholder.com/64" class="h-16 w-16 rounded-full mb-2 border-2 border-green-400" alt="Author">
        <div class="font-mono text-lg font-bold text-gray-900">Chris Wong</div>
        <div class="text-xs text-green-600 font-mono mb-1">@chriswong</div>
        <span class="inline-block bg-green-100 text-green-700 font-mono text-xs px-2 py-1 rounded mb-1">Writes about: DevOps, CI/CD</span>
        <span class="inline-block bg-white/80 text-green-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-green-100">Latest: <span class="font-semibold">CI/CD for Teams</span></span>
        <div class="flex items-center gap-1 text-xs text-gray-500 font-mono"><svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 17V7a2 2 0 012-2h12a2 2 0 012 2v10"/><path d="M16 21v-2a2 2 0 00-2-2H10a2 2 0 00-2 2v2"/></svg> Blogger</div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED IN BAR -->
<div class="bg-white/80 backdrop-blur py-4 px-6 flex flex-wrap justify-center items-center gap-8 border-b border-gray-100">
  <span class="text-gray-500 text-xs uppercase tracking-wider">Featured In</span>
  <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" class="h-6 opacity-60" alt="Microsoft">
  <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Logo_TV_2015.png" class="h-6 opacity-60" alt="TechVision">
  <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" class="h-6 opacity-60" alt="Google">
  <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" class="h-6 opacity-60" alt="Facebook">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png" class="h-6 opacity-60" alt="JS">
</div>

<!-- TECH STACK / TRENDING TECHNOLOGIES -->
<section class="py-12 bg-gradient-to-r from-indigo-50 via-white to-pink-50">
  <div class="max-w-5xl mx-auto px-6">
    <h2 class="text-xl font-bold text-center mb-8 text-gray-900">Trending Technologies</h2>
    <div class="flex flex-wrap justify-center gap-8">
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="React">
        <span class="text-xs mt-2 text-gray-700">React</span>
      </div>
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="Node.js">
        <span class="text-xs mt-2 text-gray-700">Node.js</span>
      </div>
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="TypeScript">
        <span class="text-xs mt-2 text-gray-700">TypeScript</span>
      </div>
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="Python">
        <span class="text-xs mt-2 text-gray-700">Python</span>
      </div>
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/aws/aws-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="AWS">
        <span class="text-xs mt-2 text-gray-700">AWS</span>
      </div>
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="Docker">
        <span class="text-xs mt-2 text-gray-700">Docker</span>
      </div>
      <div class="flex flex-col items-center group">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg" class="h-12 w-12 group-hover:scale-110 transition-transform duration-200" alt="GCP">
        <span class="text-xs mt-2 text-gray-700">GCP</span>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED ARTICLES CAROUSEL -->
<section class="py-16 bg-white/80 backdrop-blur border-t border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-2xl font-bold mb-8 text-gray-900">Featured</h2>
    <div class="flex gap-8 overflow-x-auto pb-4 snap-x">
      <!-- Card 1 -->
      <div class="min-w-[340px] max-w-xs bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-indigo-400 transition-all duration-200 flex-shrink-0 snap-center flex flex-col">
        <img src="https://via.placeholder.com/400x220?text=Feature+1" class="w-full h-44 object-cover rounded-t-2xl" alt="Feature 1">
        <div class="p-6 flex flex-col flex-1">
          <span class="bg-gradient-to-r from-indigo-200 via-pink-200 to-purple-200 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full mb-2">JavaScript</span>
          <h3 class="text-lg font-bold mb-2 hover:underline"><a href="#">The Future of JS Frameworks</a></h3>
          <p class="text-gray-600 text-sm mb-4">What's next for frontend development in 2024?</p>
          <div class="flex items-center mt-auto">
            <img src="https://via.placeholder.com/32" class="h-8 w-8 rounded-full mr-2" alt="Author">
            <span class="text-xs text-gray-500">Jane Smith</span>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="min-w-[340px] max-w-xs bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-pink-400 transition-all duration-200 flex-shrink-0 snap-center flex flex-col">
        <img src="https://via.placeholder.com/400x220?text=Feature+2" class="w-full h-44 object-cover rounded-t-2xl" alt="Feature 2">
        <div class="p-6 flex flex-col flex-1">
          <span class="bg-gradient-to-r from-pink-200 via-indigo-100 to-purple-200 text-pink-700 text-xs font-bold px-3 py-1 rounded-full mb-2">AI</span>
          <h3 class="text-lg font-bold mb-2 hover:underline"><a href="#">AI in Everyday Life</a></h3>
          <p class="text-gray-600 text-sm mb-4">How artificial intelligence is shaping our routines.</p>
          <div class="flex items-center mt-auto">
            <img src="https://via.placeholder.com/32" class="h-8 w-8 rounded-full mr-2" alt="Author">
            <span class="text-xs text-gray-500">Alex Lee</span>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="min-w-[340px] max-w-xs bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-amber-400 transition-all duration-200 flex-shrink-0 snap-center flex flex-col">
        <img src="https://via.placeholder.com/400x220?text=Feature+3" class="w-full h-44 object-cover rounded-t-2xl" alt="Feature 3">
        <div class="p-6 flex flex-col flex-1">
          <span class="bg-gradient-to-r from-amber-200 via-indigo-100 to-purple-200 text-amber-700 text-xs font-bold px-3 py-1 rounded-full mb-2">Cloud</span>
          <h3 class="text-lg font-bold mb-2 hover:underline"><a href="#">Cloud Native Patterns</a></h3>
          <p class="text-gray-600 text-sm mb-4">Best practices for scalable cloud infrastructure.</p>
          <div class="flex items-center mt-auto">
            <img src="https://via.placeholder.com/32" class="h-8 w-8 rounded-full mr-2" alt="Author">
            <span class="text-xs text-gray-500">Samira Patel</span>
          </div>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="min-w-[340px] max-w-xs bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-green-400 transition-all duration-200 flex-shrink-0 snap-center flex flex-col">
        <img src="https://via.placeholder.com/400x220?text=Feature+4" class="w-full h-44 object-cover rounded-t-2xl" alt="Feature 4">
        <div class="p-6 flex flex-col flex-1">
          <span class="bg-gradient-to-r from-green-200 via-indigo-100 to-purple-200 text-green-700 text-xs font-bold px-3 py-1 rounded-full mb-2">DevOps</span>
          <h3 class="text-lg font-bold mb-2 hover:underline"><a href="#">CI/CD for Teams</a></h3>
          <p class="text-gray-600 text-sm mb-4">Streamline your workflow with modern DevOps tools.</p>
          <div class="flex items-center mt-auto">
            <img src="https://via.placeholder.com/32" class="h-8 w-8 rounded-full mr-2" alt="Author">
            <span class="text-xs text-gray-500">Chris Wong</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RECENT ARTICLES GRID - daily.dev inspired horizontal scroll -->
<section class="py-20 bg-gradient-to-br from-indigo-50 via-white to-pink-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
      <h2 class="text-2xl font-bold text-gray-900 font-mono tracking-tight">Recent Articles</h2>
      <div class="flex gap-2 flex-wrap">
        <button class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-semibold text-sm shadow hover:scale-105 transition-all">All</button>
        <button class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-indigo-200 text-indigo-700 font-semibold text-sm hover:bg-indigo-50 transition">GraphQL</button>
        <button class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-pink-200 text-pink-700 font-semibold text-sm hover:bg-pink-50 transition">TypeScript</button>
        <button class="px-4 py-2 rounded-full bg-white/60 backdrop-blur border border-amber-200 text-amber-700 font-semibold text-sm hover:bg-amber-50 transition">Cloud</button>
      </div>
    </div>
    <div class="flex gap-8 overflow-x-auto pb-4 snap-x scrollbar-thin scrollbar-thumb-indigo-200 scrollbar-track-white">
      <?php if (!empty($posts)): ?>
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
                <img src="https://api.dicebear.com/7.x/identicon/svg?seed=<?= urlencode($post['author_name']) ?>" class="h-8 w-8 rounded-full border-2 border-indigo-200 bg-white" alt="Author">
                <span class="text-xs text-gray-700 font-mono">By <?= esc($post['author_name']) ?></span>
                <span class="text-xs text-gray-400 font-mono ml-auto">
                  <?= date('M j, Y', strtotime($post['date_created'])) ?>
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
</section>

<!-- COMMUNITY STATS (Modern, Icon-based, Glassy) -->
<section class="py-16 bg-white/80 backdrop-blur">
  <div class="max-w-4xl mx-auto flex flex-wrap justify-center gap-8">
    <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-8 shadow-xl min-w-[160px]">
      <svg class="w-8 h-8 mb-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V7a4 4 0 00-8 0v3m12 4a4 4 0 01-8 0"></path></svg>
      <div class="text-3xl font-extrabold text-indigo-600 mb-1">12k+</div>
      <div class="text-gray-600 text-sm uppercase tracking-wider">Members</div>
    </div>
    <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-8 shadow-xl min-w-[160px]">
      <svg class="w-8 h-8 mb-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h4l2-2 2 2h4a2 2 0 012 2v12a2 2 0 01-2 2z"></path></svg>
      <div class="text-3xl font-extrabold text-pink-600 mb-1">800+</div>
      <div class="text-gray-600 text-sm uppercase tracking-wider">Articles</div>
    </div>
    <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-8 shadow-xl min-w-[160px]">
      <svg class="w-8 h-8 mb-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3v2a1 1 0 001 1h2a1 1 0 001-1v-2h3a1 1 0 001-1V7"></path></svg>
      <div class="text-3xl font-extrabold text-amber-600 mb-1">30+</div>
      <div class="text-gray-600 text-sm uppercase tracking-wider">Categories</div>
    </div>
    <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-8 shadow-xl min-w-[160px]">
      <svg class="w-8 h-8 mb-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path></svg>
      <div class="text-3xl font-extrabold text-green-600 mb-1">24/7</div>
      <div class="text-gray-600 text-sm uppercase tracking-wider">Support</div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS (Modern, Grid, Glassy) -->
<section class="py-20 bg-gradient-to-br from-indigo-50 via-white to-pink-50">
  <div class="max-w-5xl mx-auto px-6">
    <h2 class="text-2xl font-bold text-center mb-12 text-gray-900">What our members say</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="flex items-start bg-white/60 backdrop-blur-lg rounded-xl shadow-xl p-6 relative">
        <img src="https://via.placeholder.com/48" class="rounded-full border-2 border-indigo-400 mr-4" alt="Testimonial">
        <div>
          <div class="bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold mb-2 inline-block">Sarah J.</div>
          <div class="relative bg-gray-50/80 rounded-lg p-4 text-gray-700 mb-2 italic before:content-[''] before:absolute before:-left-4 before:top-4 before:w-0 before:h-0 before:border-t-8 before:border-t-transparent before:border-b-8 before:border-b-transparent before:border-r-8 before:border-r-gray-50/80">
            "This platform helped me grow my network and learn from the best in tech."
          </div>
          <div class="text-xs text-gray-500">Full Stack Developer</div>
        </div>
      </div>
      <div class="flex items-start bg-white/60 backdrop-blur-lg rounded-xl shadow-xl p-6 relative">
        <img src="https://via.placeholder.com/48" class="rounded-full border-2 border-pink-400 mr-4" alt="Testimonial">
        <div>
          <div class="bg-pink-50 text-pink-700 px-3 py-1 rounded-full text-xs font-bold mb-2 inline-block">Michael C.</div>
          <div class="relative bg-gray-50/80 rounded-lg p-4 text-gray-700 mb-2 italic before:content-[''] before:absolute before:-left-4 before:top-4 before:w-0 before:h-0 before:border-t-8 before:border-t-transparent before:border-b-8 before:border-b-transparent before:border-r-8 before:border-r-gray-50/80">
            "I love the clean design and the quality of articles. Highly recommended!"
          </div>
          <div class="text-xs text-gray-500">Software Engineer</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NEWSLETTER SIGNUP -->
<section class="py-16 bg-white/80 backdrop-blur text-center">
  <div class="max-w-lg mx-auto">
    <div class="flex justify-center mb-4">
      <div class="p-3 rounded-full bg-gradient-to-r from-indigo-100 via-pink-100 to-purple-100 text-indigo-600">
        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm0 0v2a4 4 0 01-8 0v-2"></path></svg>
      </div>
    </div>
    <h3 class="text-xl font-bold mb-2 text-gray-900">Stay in the loop</h3>
    <p class="text-gray-600 mb-6">Get the latest articles and updates straight to your inbox.</p>
    <form class="flex flex-col sm:flex-row gap-3 justify-center">
      <input type="email" placeholder="Enter your email" class="flex-grow px-5 py-4 rounded-lg bg-white/60 backdrop-blur border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
      <button type="submit" class="px-8 py-4 bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 rounded-lg font-bold text-white shadow hover:scale-105 transition-all">Subscribe</button>
    </form>
    <div class="text-xs text-gray-400 mt-3">No spam. Unsubscribe anytime.</div>
  </div>
</section>



<?= $this->endSection() ?>