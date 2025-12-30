<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>User Management System</h1>
        <?php    $session = session();  if ($session->get('isLoggedIn')) :?>
        <a href="/logout" class="logout">Logout</a>
        <?php endif;?>
    </div>

    <!-- Content -->
    <div class="container">
       
         <?php if (session()->getFlashdata('success')): ?>
        <div class="success">
                <h3><?= session()->getFlashdata('success') ?></h3>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>
    <!-- Footer -->
    <footer>
        © <?= date('Y') ?> User Management System
    </footer>

</body>
</html>
