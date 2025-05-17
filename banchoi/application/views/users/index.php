<div class="container my-4">
    <h2 class="mb-4">User Management</h2>

    <div class="mb-3">
        <a href="<?= site_url('users/create'); ?>" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Create New User
        </a>
    </div>


    <?php if (!empty($users)): ?>
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['username']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('users/edit/' . $user['id']); ?>" class="btn btn-sm btn-primary me-1"
                                title="Edit User">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <a href="<?= site_url('users/delete/' . $user['id']); ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this user?');" title="Delete User">
                                <i class="bi bi-trash-fill"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            No users found.
        </div>
    <?php endif; ?>
</div>