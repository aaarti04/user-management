<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f4f6f9;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #667eea;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 22px;
        }

        .header a {
            color: #667eea;
            background: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
        }

        /* Container */
        .container {
            padding: 30px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar h2 {
            color: #333;
        }

        .add-btn {
            background: #667eea;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .add-btn:hover {
            background: #5a67d8;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        thead {
            background: #edf2f7;
        }

        th, td {
            padding: 14px 15px;
            text-align: left;
        }

        th {
            color: #555;
            font-size: 14px;
            text-transform: uppercase;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .active {
            background: #d1fae5;
            color: #065f46;
        }

        .inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .action a {
            margin-right: 8px;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .edit {
            background: #e0e7ff;
            color: #3730a3;
        }

        .delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .edit:hover {
            background: #c7d2fe;
        }

        .delete:hover {
            background: #fecaca;
        }
         .success {
    background: #d1fae5;
    color: #065f46;
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
    font-weight: bold;
}
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>User Management System</h1>
        <a href="/dashboard">Dashboard</a>
    </div>

    <!-- Content -->
    <div class="container">
<?php if (session()->getFlashdata('success')): ?>
        <div class="success">
                <h3><?= session()->getFlashdata('success') ?></h3>
            </div>
        <?php endif; ?>
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

</body>
</html>
