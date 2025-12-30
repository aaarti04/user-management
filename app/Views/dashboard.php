<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="dashboard_header">
    <div>
     <h2 class="welcome">Welcome to the Dashboard 👋</h2>
     </div>
     <div class="logout_btn"> 
            <!-- <a href="/logout" class="logout">Logout</a> -->
     </div>

 </div>
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
<?= $this->endSection() ?>