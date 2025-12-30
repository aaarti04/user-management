<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="mid_container">
    <div class="login-box">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?= esc($error) ?></div>
        <?php endif; ?>

        <form action="/login" method="post">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>
       
    </div>
</div>
<?= $this->endSection() ?>