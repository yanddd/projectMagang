<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row mt-3 align-items-center justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambah User</div>
                <hr>
                <form class="user" action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="foto" value="undraw_profile.svg">
                    <div class="row mb-1">
                        <label for="nama_depan" class="col-sm-3 col-form-label">Nama Depan</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?php if (session('errors.nama_depan')) : ?>is-invalid<?php endif ?>" id="nama_depan" name="nama_depan" autofocus value="<?= old('nama_depan')  ?>" placeholder="Nama Depan">
                            <div id="validationServernama_depanFeedback" class="invalid-feedback">
                                <?= $validation->getError('nama_depan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nama_belakang" class="col-sm-3 col-form-label">Nama Belakang</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?php if (session('errors.nama_belakang')) : ?>is-invalid<?php endif ?>" id="nama_belakang" name="nama_belakang" autofocus value="<?= old('nama_belakang')  ?>" placeholder="Nama Depan">
                            <div id="validationServernama_belakangFeedback" class="invalid-feedback">
                                <?= $validation->getError('nama_belakang'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            <div id="validationServerusernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            <div id="validationServeremailFeedback" class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" id="alamat" name="alamat" value="<?= old('alamat')  ?>" placeholder="Alamat">
                            <div id="validationServeralamatFeedback" class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="no_hp" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" id="no_hp" name="no_hp" value="<?= old('no_hp')  ?>" placeholder="Nomor HP">
                            <div id="validationServerno_hpFeedback" class="invalid-feedback">
                                <?= $validation->getError('no_hp'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control <?php if (session('errors.tanggal_lahir')) : ?>is-invalid<?php endif ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir')  ?>" placeholder="Tanggal">
                            <div id="validationServertanggal_lahirFeedback" class="invalid-feedback">
                                <?= $validation->getError('tanggal_lahir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <div class="row ml-1">
                                <div class="form-check col-sm-3">
                                    <input class="form-check-input <?php if (session('errors.jK')) : ?>is-invalid<?php endif ?>" id="jK" name="jK" value="laki-laki" type="radio">
                                    <label class="form-check-label" for="jK">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check col-sm-3 float-right">
                                    <input class="form-check-input <?php if (session('errors.jK')) : ?>is-invalid<?php endif ?>" id="jK" name="jK" value="perempuan" type="radio">
                                    <label class="form-check-label" for="jK">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm">
                            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="pass_confirm" class="col-sm-3 col-form-label">Repeat Password</label>
                        <div class="col-sm">
                            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-light ml-2 tambahData float-end">Tambah User</button>
                    <a href="/users" type="submit" class="btn btn-secondary tambahData float-end">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>