<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background: #fff;
            width: 420px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .form-box h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #667eea;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        button {
            flex: 1;
            padding: 12px;
            border: none;
            background: #667eea;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }

        .back {
            background: #e2e8f0;
            color: #333;
        }

        .back:hover {
            background: #cbd5e1;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="form-box">
        <h1>Edit User</h1>

        <!-- Validation Errors -->
        <?php if (isset($errors)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/update/<?= $user['id'] ?>" method="post">
            <label>Name</label>
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="text" name="name"
                   value="<?= esc($user['name']) ?>" required>

            <label>Email</label>
            <input type="email" name="email"
                   value="<?= esc($user['email']) ?>" required>

            <label>Status</label>
            <select name="status" required>
                <option value="1" <?= $user['status'] == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?= $user['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
            </select>

            <div class="btn-group">
                <button type="submit">Update User</button>
                <a href="/list">
                    <button type="button" class="back">Cancel</button>
                </a>
            </div>
        </form>
    </div>

</body>
</html>
