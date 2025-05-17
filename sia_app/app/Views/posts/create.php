<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Create Article<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (isset($validation)): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<!-- Sticky Header -->
<header class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-indigo-100 shadow flex items-center justify-between px-6 py-3">
  <a href="<?= site_url('posts') ?>" class="flex items-center gap-2 text-lg font-bold text-indigo-700 font-mono">
    <i class="fas fa-arrow-left"></i> Back to Articles
  </a>
  <div class="flex items-center gap-3">
    <svg width="28" height="20" viewBox="0 0 220 160" fill="none" class="h-7 w-7"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
    <span class="font-mono text-indigo-700">BIT BY BIT</span>
    <span class="ml-4 text-xs text-gray-400 italic">Autosaved</span>
  </div>
</header>

<!-- Main Editor Area -->
<div class="max-w-3xl mx-auto py-10 px-4 relative">
  <form id="create-article-form" action="<?= site_url('posts/store') ?>" method="post" enctype="multipart/form-data" class="space-y-8">
    <?= csrf_field() ?>

    <!-- Title -->
    <input type="text" name="title" id="title"
      class="w-full text-3xl md:text-4xl font-extrabold font-mono bg-transparent border-0 border-b-2 border-indigo-200 focus:ring-0 focus:border-indigo-500 placeholder-gray-400 mb-2"
      placeholder="Your article title..." value="<?= old('title') ?>" required autofocus>
    <?php if (isset($validation) && $validation->hasError('title')): ?>
      <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('title') ?></div>
    <?php endif; ?>

    <!-- Category & Tags -->
    <div class="flex flex-wrap gap-3 items-center mb-2">
      <select name="category" id="category"
        class="rounded-full bg-indigo-50 border border-indigo-200 px-4 py-2 text-indigo-700 font-mono focus:ring-2 focus:ring-indigo-300">
        <option value="" disabled selected>Select category</option>
        <option value="programming" <?= (old('category') == 'programming') ? 'selected' : '' ?>>Programming</option>
        <option value="web-development" <?= (old('category') == 'web-development') ? 'selected' : '' ?>>Web Development</option>
        <option value="data-science" <?= (old('category') == 'data-science') ? 'selected' : '' ?>>Data Science</option>
        <option value="devops" <?= (old('category') == 'devops') ? 'selected' : '' ?>>DevOps</option>
        <option value="ai-ml" <?= (old('category') == 'ai-ml') ? 'selected' : '' ?>>AI & Machine Learning</option>
        <option value="mobile-dev" <?= (old('category') == 'mobile-dev') ? 'selected' : '' ?>>Mobile Development</option>
        <option value="security" <?= (old('category') == 'security') ? 'selected' : '' ?>>Security</option>
        <option value="blockchain" <?= (old('category') == 'blockchain') ? 'selected' : '' ?>>Blockchain</option>
        <option value="career" <?= (old('category') == 'career') ? 'selected' : '' ?>>Career Development</option>
      </select>
      <!-- Tag pills (add with JS) -->
      <div class="flex gap-2 flex-wrap" id="tagPills"></div>
      <input type="hidden" id="tags" name="tags" value="<?= old('tags') ?>">
      <input type="text" id="tagInput" placeholder="Add tag" class="bg-transparent border-0 focus:ring-0 text-sm font-mono w-24">
    </div>
    <?php if (isset($validation) && $validation->hasError('tags')): ?>
      <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('tags') ?></div>
    <?php endif; ?>
    <?php if (isset($validation) && $validation->hasError('category')): ?>
      <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('category') ?></div>
    <?php endif; ?>

    <!-- Featured Image -->
    <div class="mb-4">
      <label for="featured_image" class="block text-xs font-mono text-gray-500 mb-1">Featured Image</label>
      <div class="border-2 border-dashed border-indigo-200 rounded-lg p-4 flex flex-col items-center justify-center bg-indigo-50/50 hover:bg-indigo-100 transition cursor-pointer" id="dropzone">
        <input type="file" id="featured_image" name="featured_image" accept="image/*" class="hidden">
        <span class="text-gray-400 font-mono text-sm"><i class="fas fa-upload mr-2"></i>Drag & drop or click to upload</span>
        <div id="imagePreview" class="mt-2"></div>
      </div>
      <?php if (isset($validation) && $validation->hasError('featured_image')): ?>
        <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('featured_image') ?></div>
      <?php endif; ?>
    </div>

    <!-- Content Editor -->
    <div>
      <label for="editor" class="block text-xs font-mono text-gray-500 mb-1">Content</label>
      <textarea id="editor" name="content" rows="16"
        class="w-full rounded-lg border border-gray-200 bg-gradient-to-br from-white via-indigo-50 to-purple-50 px-4 py-3 text-gray-900 font-mono focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none transition text-base"
        placeholder="Write your article here..."><?= old('content') ?></textarea>
      <?php if (isset($validation) && $validation->hasError('content')): ?>
        <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('content') ?></div>
      <?php endif; ?>
    </div>

    <!-- Summary & Publish -->
    <div class="bg-white/80 backdrop-blur-lg rounded-xl shadow border border-indigo-100 p-6 mt-8 flex flex-col md:flex-row gap-6">
      <div class="flex-1">
        <label for="summary" class="block text-xs font-mono text-gray-500 mb-1">Summary</label>
        <textarea id="summary" name="summary" rows="3"
          class="w-full rounded-lg border border-gray-200 bg-white/90 px-4 py-2 text-gray-900 font-mono focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none transition text-base"
          placeholder="Brief summary for article listings"><?= old('summary') ?></textarea>
        <div class="text-xs text-gray-400 mt-1 ml-1"><span id="summaryCharCount">0</span>/250 characters</div>
        <?php if (isset($validation) && $validation->hasError('summary')): ?>
          <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('summary') ?></div>
        <?php endif; ?>
      </div>
      <div class="flex flex-col gap-2 justify-between">
        <div>
          <label class="block text-xs font-mono text-gray-500 mb-1">Status</label>
          <div class="flex gap-4">
            <label class="flex items-center gap-2">
              <input type="radio" name="published" value="0" <?= (!old('published') || old('published') == '0') ? 'checked' : '' ?> class="form-radio text-indigo-600">
              <span class="text-sm text-gray-700">Draft</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="radio" name="published" value="1" <?= (old('published') == '1') ? 'checked' : '' ?> class="form-radio text-indigo-600">
              <span class="text-sm text-gray-700">Publish</span>
            </label>
          </div>
        </div>
        <div class="flex items-center mt-2">
          <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 <?= (isset($validation) && $validation->hasError('terms')) ? 'border-red-400' : '' ?>">
          <label for="terms" class="ml-2 block text-xs text-gray-700">I confirm this content is original and complies with the <a href="<?= site_url('terms') ?>" target="_blank" class="underline text-indigo-600">Terms</a></label>
        </div>
        <?php if (isset($validation) && $validation->hasError('terms')): ?>
          <div class="text-xs text-red-600 mt-1 ml-1"><?= $validation->getError('terms') ?></div>
        <?php endif; ?>
      </div>
    </div>
  </form>
</div>

<!-- Floating Action Bar -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 items-end">
  <button type="button" class="px-6 py-3 rounded-full bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 text-white font-bold shadow-lg hover:scale-105 transition-all text-base" id="previewBtn">
    <i class="fas fa-eye mr-2"></i> Preview
  </button>
  <button type="submit" form="create-article-form" class="px-6 py-3 rounded-full bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 text-white font-bold shadow-lg hover:scale-105 transition-all text-base">
    <i class="fas fa-paper-plane mr-2"></i> Publish
  </button>
  <button type="reset" form="create-article-form" class="px-6 py-3 rounded-full bg-gray-200 text-gray-700 font-semibold shadow hover:bg-gray-300 transition-all text-base">
    <i class="fas fa-save mr-2"></i> Save Draft
  </button>
</div>

<script>
// Featured Image Drag & Drop + Click-to-Upload
const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('featured_image');
const imagePreview = document.getElementById('imagePreview');

// Click on dropzone opens file picker
if (dropzone && fileInput) {
  dropzone.addEventListener('click', () => fileInput.click());

  // Drag over styling
  dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('ring-2', 'ring-indigo-400', 'bg-indigo-100');
  });

  dropzone.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropzone.classList.remove('ring-2', 'ring-indigo-400', 'bg-indigo-100');
  });

  // Drop event
  dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('ring-2', 'ring-indigo-400', 'bg-indigo-100');
    if (e.dataTransfer.files && e.dataTransfer.files[0]) {
      fileInput.files = e.dataTransfer.files;
      showImagePreview(fileInput.files[0]);
    }
  });

  // File input change (for both click and drop)
  fileInput.addEventListener('change', (e) => {
    if (fileInput.files && fileInput.files[0]) {
      showImagePreview(fileInput.files[0]);
    }
  });
}

function showImagePreview(file) {
  if (!file.type.startsWith('image/')) {
    imagePreview.innerHTML = '<span class="text-red-500 text-xs font-mono">File is not an image.</span>';
    return;
  }
  const reader = new FileReader();
  reader.onload = function(e) {
    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="max-h-40 rounded shadow border mt-2">`;
  };
  reader.readAsDataURL(file);
}
</script>
<?= $this->endSection() ?> 