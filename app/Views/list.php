<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="mid_containe">
        <div class="top-bar">
            <h2>User List</h2>
            <a href="/add-user" class="add-btn">+ Add User</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list)): ?>
                    <?php $i = 1; foreach ($list as $user): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($user['name']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                            <td>
                                <?php if ($user['status'] == 1): ?>
                                    <span class="status active">Active</span>
                                <?php else: ?>
                                    <span class="status inactive">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="action">
                                <a href="/edit/<?= $user['id'] ?>" class="edit">Edit</a>
                                <a href="/delete/<?= $user['id'] ?>" class="delete"
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

<?= $this->endSection() ?>
