<div class="container-xl my-4">
    <h2 class="mb-4">Edit User</h2>

    <form action="<?= site_url('users/update/' . $user['id']); ?>" method="post" class="card p-4" autocomplete="off">
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>"
                value="<?= set_value('username', htmlspecialchars($user['username'])); ?>"
                required
            />
            <?php if (form_error('username')): ?>
                <div class="invalid-feedback"><?= form_error('username'); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>"
                value="<?= set_value('email', htmlspecialchars($user['email'])); ?>"
                required
            />
            <?php if (form_error('email')): ?>
                <div class="invalid-feedback"><?= form_error('email'); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="password">Password <small class="text-muted">(Leave blank to keep current password)</small></label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
                autocomplete="new-password"
            />
            <?php if (form_error('password')): ?>
                <div class="invalid-feedback"><?= form_error('password'); ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="<?= site_url('users'); ?>" class="btn btn-link ms-2">Cancel</a>
    </form>
</div>
