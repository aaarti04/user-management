<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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

        .logout {
            background: #fff;
            color: #667eea;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .logout:hover {
            background: #e2e8f0;
        }

        /* Main Content */
        .container {
            padding: 40px;
        }

        .welcome {
            margin-bottom: 30px;
            color: #333;
        }

        /* Cards */
        .card-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 15px;
            color: #444;
        }

        .card a {
            display: inline-block;
            padding: 10px 18px;
            background: #667eea;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: 0.3s;
        }

        .card a:hover {
            background: #5a67d8;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background: #fff;
            margin-top: 40px;
            color: #777;
            font-size: 14px;
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
        <a href="/logout" class="logout">Logout</a>
    </div>

    <!-- Content -->
    <div class="container">
        <h2 class="welcome">Welcome to the Dashboard 👋</h2>
         <?php if (session()->getFlashdata('success')): ?>
        <div class="success">
                <h3><?= session()->getFlashdata('success') ?></h3>
            </div>
        <?php endif; ?>
        <div class="card-wrapper">
            <div class="card">
                <h3>Add User</h3>
                <a href="/add-user">Add New User</a>
            </div>

            <div class="card">
                <h3>View Users</h3>
                <a href="/list">User List</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © <?= date('Y') ?> User Management System
    </footer>

</body>
</html>
