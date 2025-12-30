<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="mid_container">
    <div class="form-box">
        <h1>Add User</h1>
       <?php if (isset($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

        <form action="/add-user" method="post"  id="addUserForm">
            <?= csrf_field(); ?>
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter full name" required>

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email address" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" id="password" required>

             <label>Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Enter password"  id="confirm_password" required>
            <small id="pass_error" style="color:red; display:none;">
                Passwords do not match
            </small>
            <label>Status</label>
            <select name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

            <div class="btn-group">
                <button type="submit">Save User</button>
                <a href="/dashboard">
                    <button type="button" class="back">Back</button>
                </a>
            </div>
        </form>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('addUserForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const errorText = document.getElementById('pass_error');

    function checkPasswordMatch() {
        if (confirmPassword.value === '') {
            errorText.style.display = 'none';
            confirmPassword.style.borderColor = '';
            return;
        }

        if (password.value === confirmPassword.value) {
            errorText.style.display = 'none';
            confirmPassword.style.borderColor = 'green';
        } else {
            errorText.style.display = 'block';
            confirmPassword.style.borderColor = 'red';
        }
    }

    password.addEventListener('keyup', checkPasswordMatch);
    confirmPassword.addEventListener('keyup', checkPasswordMatch);

    // 🚨 STOP FORM SUBMISSION HERE
    form.addEventListener('submit', function (e) {
        if (password.value !== confirmPassword.value) {
            e.preventDefault(); // ⛔ stops submit
            alert('Passwords do not match');
            confirmPassword.focus();
        }
    });

});
</script>

<?= $this->endSection() ?>
