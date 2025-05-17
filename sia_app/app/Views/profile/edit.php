<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Profile<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-2xl mx-auto py-16 px-4">
  <h1 class="text-3xl font-bold mb-8">Edit Profile</h1>
  <?php if (isset($validation)): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-6">
      <?= $validation->listErrors() ?>
    </div>
  <?php endif; ?>
  <form action="<?= site_url('profile/update') ?>" method="post" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-xl p-8 flex flex-col gap-6">
    <div class="flex flex-col items-center mb-6">
      <img src="<?= isset($user['profile_image']) ? base_url($user['profile_image']) : 'https://api.dicebear.com/7.x/identicon/svg?seed=' . urlencode($user['username']) ?>" class="h-24 w-24 rounded-full border-4 border-indigo-200 bg-white mb-2" alt="Avatar">
      <label class="block text-sm font-medium text-gray-700 mb-1">Change Avatar</label>
      <input type="file" name="profile_image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="username" value="<?= esc($user['username']) ?>" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" value="<?= esc($user['email']) ?>" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required />
      </div>
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
      <textarea name="bio" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" maxlength="500"><?= esc($user['bio'] ?? '') ?></textarea>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Twitter</label>
        <input type="text" name="social_twitter" value="<?= esc($user['social_twitter'] ?? '') ?>" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="@yourhandle" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">GitHub</label>
        <input type="text" name="social_github" value="<?= esc($user['social_github'] ?? '') ?>" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="github.com/yourname" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
        <input type="text" name="social_linkedin" value="<?= esc($user['social_linkedin'] ?? '') ?>" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="linkedin.com/in/yourname" />
      </div>
    </div>
    <div class="flex justify-end gap-4 mt-6">
      <a href="<?= site_url('profile') ?>" class="px-6 py-2 rounded-lg bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">Cancel</a>
      <button type="submit" class="px-6 py-2 rounded-lg bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow hover:scale-105 transition-all">Save Changes</button>
    </div>
  </form>
</div>
<?= $this->endSection() ?> 