<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="mid_container">
    <div class="form-box">
        <h1>Forgot Password</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="/forgot-password" method="post">
            <?= csrf_field(); ?>

            <label>Email</label>
            <input type="email" name="email" required>

            <!-- Google reCAPTCHA -->
           <div class="g-recaptcha" data-sitekey="6LfLbkQsAAAAAC-HbmexeiRS_My8U1sUtjci5ReZ"></div>
           <!-- reCAPTCHA script -->
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>


<?= $this->endSection() ?>
