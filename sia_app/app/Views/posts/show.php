<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($post['title']) ?><?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
  body {
    background: #f8fafc;
    min-height: 100vh;
  }
  .hero-img {
    transition: transform 0.4s cubic-bezier(.4,0,.2,1);
    object-fit: cover;
    object-position: center;
  }
  .hero-img:hover {
    transform: scale(1.015);
  }
  .category-badge {
    position: absolute;
    top: 1.5rem;
    left: 1.5rem;
    z-index: 10;
    background: #fff;
    color: #6366f1;
    font-weight: 700;
    font-size: 1rem;
    padding: 0.4rem 1.2rem;
    border-radius: 9999px;
    box-shadow: 0 2px 8px 0 #6366f133;
    border: 1.5px solid #6366f1;
    letter-spacing: 0.03em;
  }
  .prose pre {
    background: #18181b;
    color: #e0e7ef;
    border-radius: 0.75rem;
    font-family: 'JetBrains Mono', monospace;
    font-size: 1.08rem;
    padding: 1.5rem 1.7rem;
    margin-bottom: 1.7rem;
    overflow-x: auto;
    border-left: 4px solid #6366f1;
  }
  .prose code {
    background: #f1f5f9;
    color: #7c3aed;
    border-radius: 0.375rem;
    padding: 0.2em 0.5em;
    font-size: 1em;
    font-family: 'JetBrains Mono', monospace;
    border: 1px solid #e5e7eb;
  }
  .author-row {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 2.5rem;
  }
  .author-avatar {
    width: 48px;
    height: 48px;
    border-radius: 9999px;
    border: 2px solid #e0e7ef;
    background: #fff;
  }
  .divider {
    width: 60px;
    height: 2px;
    background: #e5e7eb;
    margin: 1.5rem auto 2rem auto;
    border-radius: 2px;
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Back link -->
<div class="w-full flex justify-start max-w-3xl mx-auto mb-2 px-2">
  <a href="<?= site_url('posts') ?>" class="bg-white/90 hover:bg-indigo-50 text-indigo-700 font-semibold rounded-full px-4 py-1 text-sm shadow transition-all flex items-center gap-2 z-20">
    <i class="fas fa-arrow-left"></i> Back
  </a>
</div>

<!-- Main blog card -->
<div class="max-w-3xl w-full mx-auto bg-white rounded-3xl shadow-xl overflow-hidden mb-16">
  <div class="relative">
    <?php if (!empty($post['featured_image'])): ?>
      <img src="<?= base_url($post['featured_image']) ?>" alt="Featured Image" class="w-full h-80 hero-img">
      <span class="category-badge">
        <?= esc(ucwords(str_replace('-', ' ', $post['category']))) ?>
      </span>
    <?php endif; ?>
  </div>
  <div class="px-8 pt-8 pb-2 text-center">
    <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-3 text-gray-900">
      <?= esc($post['title']) ?>
    </h1>
    <div class="text-base text-gray-500 mb-2">
      <?= esc(ucwords(str_replace('-', ' ', $post['category']))) ?> · <?= date('M j, Y', strtotime($post['date_created'])) ?>
    </div>
  </div>
  <div class="author-row">
    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=<?= urlencode($post['username']) ?>" class="author-avatar" alt="Author">
    <span class="text-base font-semibold text-gray-800">@<?= esc($post['username']) ?></span>
  </div>
  <div class="divider"></div>
  <div class="prose prose-slate prose-lg max-w-none font-sans px-8 pb-10 pt-2 mx-auto">
    <?= nl2br(esc($post['content'])) ?>
  </div>
  <?php if (!empty($post['tags'])): ?>
    <div class="px-8 pb-8 pt-2 flex flex-wrap gap-2 justify-center">
      <?php foreach (explode(',', $post['tags']) as $tag): ?>
        <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold">#<?= esc(trim($tag)) ?></span>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?> 