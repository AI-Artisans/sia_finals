<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Profile<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-3xl mx-auto py-16 px-4">
  <div class="flex flex-col md:flex-row gap-8 items-center md:items-start mb-10">
    <!-- Avatar & Basic Info -->
    <div class="flex flex-col items-center md:items-start">
      <img src="https://api.dicebear.com/7.x/identicon/svg?seed=<?= urlencode($user['username']) ?>" class="h-24 w-24 rounded-full border-4 border-indigo-200 bg-white mb-4" alt="Avatar">
      <div class="text-2xl font-bold text-gray-900 mb-1 font-mono">@<?= esc($user['username']) ?></div>
      <div class="text-gray-500 text-sm mb-2">Joined <?= date('M Y', strtotime($user['date_created'])) ?></div>
      <div class="text-gray-700 text-sm mb-4"><i class="fas fa-envelope mr-1"></i><?= esc($user['email']) ?></div>
      <a href="<?= site_url('profile/edit') ?>" class="inline-block px-6 py-2 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow hover:scale-105 transition-all text-sm">Edit Profile</a>
    </div>
    <!-- Profile Stats & Bio (optional) -->
    <div class="flex-1 w-full">
      <div class="grid grid-cols-2 gap-6 mb-6">
        <div class="bg-white/80 rounded-xl shadow p-4 flex flex-col items-center">
          <div class="text-2xl font-bold text-indigo-600 mb-1"><?= esc(count($posts)) ?></div>
          <div class="text-xs text-gray-500 uppercase tracking-wider">Your Posts</div>
        </div>
        <div class="bg-white/80 rounded-xl shadow p-4 flex flex-col items-center">
          <div class="text-2xl font-bold text-pink-600 mb-1">Coming Soon</div>
          <div class="text-xs text-gray-500 uppercase tracking-wider">Followers</div>
        </div>
      </div>
      <!-- Optional: Add a bio or about section here -->
      <div class="bg-white rounded-xl shadow p-6 mb-4">
        <div class="font-bold text-gray-800 mb-2">About</div>
        <p class="text-gray-600 text-sm">This is your profile. You can add a bio, social links, or more details here in the future.</p>
      </div>
    </div>
  </div>

  <!-- User's Blog Posts -->
  <div class="bg-white rounded-2xl shadow-xl p-6">
    <h2 class="text-xl font-bold mb-4 text-indigo-900 font-mono">Your Blog Posts</h2>
    <?php if (!empty($posts)): ?>
      <div class="divide-y divide-indigo-50">
        <?php foreach ($posts as $post): ?>
          <div class="py-4 flex flex-col md:flex-row md:items-center gap-4">
            <div class="flex-1">
              <a href="<?= site_url('posts/' . $post['id']) ?>" class="text-lg font-bold text-indigo-700 hover:underline font-mono"><?= esc($post['title']) ?></a>
              <div class="text-xs text-gray-500 font-mono mt-1">Published <?= date('M j, Y', strtotime($post['date_created'])) ?></div>
            </div>
            <div class="flex gap-2 mt-2 md:mt-0">
              <a href="<?= site_url('posts/edit/' . $post['id']) ?>" class="px-4 py-2 rounded bg-indigo-100 text-indigo-700 font-bold text-xs hover:bg-indigo-200 transition">Edit</a>
              <form action="<?= site_url('posts/delete/' . $post['id']) ?>" method="post" onsubmit="return confirm('Delete this post?');">
                <button type="submit" class="px-4 py-2 rounded bg-pink-600 text-white font-bold text-xs hover:bg-pink-700 transition">Delete</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="text-gray-400 text-center py-8">You haven't written any blog posts yet.</div>
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection() ?> 