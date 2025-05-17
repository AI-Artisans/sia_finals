<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 bg-gradient-to-br from-gray-100 via-indigo-100 to-purple-100">
  <!-- Hero Section -->
  <div class="w-full max-w-3xl bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl border border-indigo-100 p-8 mb-10 flex flex-col md:flex-row items-center gap-8">
    <div class="flex-shrink-0 flex flex-col items-center md:items-start">
      <div class="w-24 h-24 rounded-full bg-gradient-to-br from-indigo-400 via-pink-400 to-purple-400 flex items-center justify-center shadow-lg mb-3">
        <i class="fa-solid fa-user-astronaut text-white text-4xl"></i>
      </div>
      <div class="text-lg font-mono text-indigo-600 mb-1">Welcome,</div>
      <div class="text-3xl font-extrabold font-mono text-gray-900 mb-1 bg-white/80 px-2 py-1 rounded-lg shadow inline-block"> <?= esc($admin) ?> </div>
      <div class="text-indigo-500 font-semibold text-sm mb-2">BIT BY BIT Admin</div>
      <span class="inline-block bg-gradient-to-r from-indigo-500 via-pink-400 to-purple-400 text-white text-xs font-mono px-3 py-1 rounded-full shadow">Tech Blogging Platform</span>
    </div>
    <div class="flex-1 flex flex-col items-center md:items-end">
      <div class="w-full max-w-xs bg-indigo-50/80 rounded-xl p-4 shadow-lg mb-4">
        <div class="text-xs text-indigo-400 font-mono mb-2">// Admin Quick Code</div>
        <pre class="text-xs text-green-600 font-mono bg-gray-100/80 rounded p-2 overflow-x-auto">$ sudo manage bitbybit --admin
&gt; Welcome, <?= esc($admin) ?>!
&gt; You have full control over the platform.
</pre>
      </div>
      <div class="flex gap-3 mt-2">
        <span class="inline-flex items-center px-3 py-1 bg-indigo-200/80 text-indigo-800 text-xs font-mono rounded-full">Role: Admin</span>
        <span class="inline-flex items-center px-3 py-1 bg-pink-200/80 text-pink-800 text-xs font-mono rounded-full">Status: Online</span>
      </div>
    </div>
  </div>

  <!-- Platform Stats -->
  <div class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-6 flex flex-col items-center shadow border border-indigo-100">
      <div class="text-4xl font-bold text-indigo-500 font-mono mb-1"><?= esc($userCount ?? 0) ?></div>
      <div class="text-sm text-gray-700 font-semibold mb-1">Total Users</div>
      <div class="text-xs text-indigo-400 font-mono">Active tech writers</div>
    </div>
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-6 flex flex-col items-center shadow border border-pink-100">
      <div class="text-4xl font-bold text-pink-500 font-mono mb-1"><?= esc($postCount ?? 0) ?></div>
      <div class="text-sm text-gray-700 font-semibold mb-1">Published Posts</div>
      <div class="text-xs text-pink-400 font-mono">Articles & tutorials</div>
    </div>
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-6 flex flex-col items-center shadow border border-green-100">
      <div class="text-4xl font-bold text-green-400 font-mono mb-1">17</div>
      <div class="text-sm text-gray-700 font-semibold mb-1">Categories</div>
      <div class="text-xs text-green-400 font-mono">Tech topics</div>
    </div>
  </div>



  <!-- Blog Cards Section -->
  <div class="w-full max-w-6xl mx-auto mb-16">
    <h2 class="text-xl font-bold mb-6 text-indigo-900 font-mono">Blogs Preview</h2>
    <div class="flex gap-8 overflow-x-auto pb-4 snap-x scrollbar-thin scrollbar-thumb-indigo-200 scrollbar-track-white">
      <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
          <div class="min-w-[340px] max-w-xs bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-indigo-400 transition-all duration-200 flex-shrink-0 snap-center flex flex-col">
            <img src="<?= $post['featured_image'] ? base_url($post['featured_image']) : 'https://via.placeholder.com/400x200?text=No+Image' ?>" class="w-full h-44 object-cover rounded-t-2xl" alt="Article Image">
            <div class="p-6 flex flex-col flex-1">
              <span class="bg-gradient-to-r from-indigo-200 via-pink-200 to-purple-200 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full mb-2 w-max font-mono tracking-wide">
                <?= esc(ucwords(str_replace('-', ' ', $post['category']))) ?>
              </span>
              <h4 class="font-bold text-lg mb-2 hover:underline font-mono">
                <?= esc($post['title']) ?>
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
              <form action="<?= site_url('admin/posts/delete/' . $post['id']) ?>" method="post" class="mt-4" onsubmit="return confirm('Are you sure you want to delete this post?');">
                <button type="submit" class="px-3 py-1 rounded bg-pink-600 text-white font-bold text-xs hover:bg-pink-700 transition w-full">DELETE</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-span-full text-center py-12 text-gray-500 font-mono text-lg">
          No articles found.
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Admin Actions -->
  <div class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-8">
    <a href="<?= site_url('admin/users') ?>" class="group bg-gradient-to-br from-indigo-200 via-purple-200 to-pink-200 rounded-2xl p-6 flex flex-col items-center shadow-lg hover:scale-105 transition-all border border-indigo-100">
      <i class="fa-solid fa-users-cog text-3xl text-indigo-700 mb-3 group-hover:scale-110 transition-transform"></i>
      <div class="text-xl font-bold font-mono text-indigo-800 mb-1">Manage Users</div>
      <div class="text-xs text-indigo-500 font-mono">View, edit, or remove users</div>
    </a>
    <a href="<?= site_url('admin/posts') ?>" class="group bg-gradient-to-br from-pink-200 via-yellow-100 to-indigo-100 rounded-2xl p-6 flex flex-col items-center shadow-lg hover:scale-105 transition-all border border-pink-100">
      <i class="fa-solid fa-file-code text-3xl text-pink-600 mb-3 group-hover:scale-110 transition-transform"></i>
      <div class="text-xl font-bold font-mono text-pink-700 mb-1">Manage Posts</div>
      <div class="text-xs text-pink-500 font-mono">Moderate articles & tutorials</div>
    </a>
    <a href="<?= site_url('admin/categories') ?>" class="group bg-gradient-to-br from-green-100 via-blue-100 to-purple-100 rounded-2xl p-6 flex flex-col items-center shadow-lg hover:scale-105 transition-all border border-green-100">
      <i class="fa-solid fa-layer-group text-3xl text-green-500 mb-3 group-hover:scale-110 transition-transform"></i>
      <div class="text-xl font-bold font-mono text-green-700 mb-1">Manage Categories</div>
      <div class="text-xs text-green-500 font-mono">Organize tech topics</div>
    </a>
  </div>
</div>
<?= $this->endSection() ?> 