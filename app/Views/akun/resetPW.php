<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="my-3">Edit User</h2>
            <form action="<?= route_to('reset-password') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-1">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" autofocus>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="password" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" autofocus>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="pass_confirm" class="col-sm-3 col-form-label">New Password Repeat</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= session('errors.pass_confirm') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-danger ml-2 tambahData float-end">Ubah Password</button>
                <a href="/users" type="submit" class="btn btn-secondary tambahData float-end">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>