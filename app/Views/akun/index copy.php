<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <!-- <div class="row"> -->
    <div class="col-9 Ak">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- <h2 class="my-3">Tentang Akun</h2> -->
        <?php foreach ($users as $u) : ?>
            <?php if ($u->username === user()->username) { ?>
                <div class="akun col-8" style="margin: auto;">
                    <div class="fotoA mb-4" style="text-align: center;">
                        <img src="/img/<?= $u->foto; ?>" alt="">
                    </div>
                    <div class="col">
                        <div class="row mb-3 labA" style="margin: auto;">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <label class="col-9">: <?= user()->full_name; ?></label>
                            <label class="col-sm-3 col-form-label">Username</label>
                            <label class="col-9">: <?= user()->username; ?></label>
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <label class="col-9">: <?= user()->alamat; ?></label>
                            <label class="col-sm-3 col-form-label">Email</label>
                            <label class="col-9">: <?= user()->email; ?></label>
                            <label class="col-sm-3 col-form-label">No. HP</label>
                            <label class="col-9">: <?= user()->no_hp; ?></label>
                        </div>
                    </div>
                    <div class=" tombolD">
                        <a href="/akun/<?= user()->username; ?>" class="btn btn-primary">Edit</a>
                        <a href="/akun/resetPW/<?= user()->username; ?>" class="btn btn-primary">Reset PW</a>
                    </div>
                    <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <!-- </div> -->
</div>
<?= $this->endSection(); ?>