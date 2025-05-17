<div class="container my-4">
    <h2 class="mb-4">Create New User</h2>

    <?php if (validation_errors()): ?>
        <div class="alert alert-danger">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open('users/store'); ?>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>"
            placeholder="Enter username" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>"
            placeholder="Enter email address" required>
    </div>

    <button type="submit" class="btn btn-primary">Create User</button>

    <?php echo form_close(); ?>

    <p class="mt-3">
        <a href="<?= site_url('users'); ?>" class="btn btn-secondary">Back to User List</a>
    </p>
</div>