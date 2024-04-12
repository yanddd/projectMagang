<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<img class="wave" src="<?= base_url(); ?>/img/wave.png">
<div class="container">
    <div class="img">
        <img src="<?= base_url(); ?>/img/undraw_quitting_time_dm8t.svg">
    </div>
    <div class="login-container">
        <form class="user" action="<?= route_to('login') ?>" method="post">
            <?= csrf_field() ?>
            <img class="coding" src="<?= base_url(); ?>/img/undraw_Coding_re_iv62.svg">
            <h2>SING-IN</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Username Or Email</h5>
                    <input class="input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" type=" text">
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Password</h5>
                    <input type="password" class="input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password">
                </div>
            </div>
            <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
            <button type="submit" class="btn btn-primary btn-user btn-block"><?= lang('Auth.loginAction') ?></button>
            <?= view('Myth\Auth\Views\_message_block') ?>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>