<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Page Not Found<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="<?= base_url('assets/images/404.svg') ?>" alt="404 - Page Not Found" class="img-fluid mb-4" style="max-height: 300px;">
            <h1 class="display-3 fw-bold text-secondary mb-3">404</h1>
            <h2 class="mb-4">Oops! Page Not Found</h2>
            <p class="lead text-secondary mb-5">The page you're looking for doesn't seem to exist. It might have been moved, deleted, or never existed in the first place.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="<?= site_url() ?>" class="btn btn-primary px-4">
                    <i class="fas fa-home me-2"></i> Back to Home
                </a>
                <a href="<?= site_url('posts') ?>" class="btn btn-outline-primary px-4">
                    <i class="fas fa-newspaper me-2"></i> Browse Articles
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 