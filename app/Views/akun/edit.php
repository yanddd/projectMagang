<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="my-3">Edit User</h2>
            <form action="/akun/update/<?= user_id(); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="userid" value="<?= user_id(); ?>">
                <input type="hidden" name="fotoLama" value="<?= user()->foto; ?>">
                <div class="row mb-1">
                    <label for="nama_depan" class="col-sm-3 col-form-label">Nama Depan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_depan')) ? 'is-invalid' : ''; ?>" id="nama_depan" name="nama_depan" autofocus value="<?= (old('nama_depan')) ? old('nama_depan') : $users->nama_depan ?>">
                        <div id="validationServernama_depanFeedback" class="invalid-feedback">
                            <?= $validation->getError('nama_depan'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="nama_belakang" class="col-sm-3 col-form-label">Nama Belakang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_belakang')) ? 'is-invalid' : ''; ?>" id="nama_belakang" name="nama_belakang" autofocus value="<?= (old('nama_belakang')) ? old('nama_belakang') : $users->nama_belakang ?>">
                        <div id="validationServernama_belakangFeedback" class="invalid-feedback">
                            <?= $validation->getError('nama_belakang'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= (old('username')) ? old('username') : $users->username ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $users->email ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $users->alamat ?>">
                        <div id="validationServeralamatFeedback" class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="no_hp" class="col-sm-3 col-form-label">Nomor HP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" autofocus value="<?= (old('no_hp')) ? old('no_hp') : $users->no_hp ?>">
                        <div id="validationServerno_hpFeedback" class="invalid-feedback">
                            <?= $validation->getError('no_hp'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $users->tanggal_lahir ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <div class="row ml-1">
                            <?php if ($users->jK === 'laki-laki') { ?>
                                <div class="form-check col-sm-3">
                                    <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="laki-laki" type="radio" checked>
                                    <label class="form-check-label" for="jK">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check col-sm-3 float-right">
                                    <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="perempuan" type="radio">
                                    <label class="form-check-label" for="jK">
                                        Perempuan
                                    </label>
                                </div>
                            <?php } ?>
                            <?php if ($users->jK === 'perempuan') { ?>
                                <div class="form-check col-sm-3">
                                    <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="laki-laki" type="radio">
                                    <label class="form-check-label" for="jK">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check col-sm-3 float-right">
                                    <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="perempuan" type="radio" checked>
                                    <label class="form-check-label" for="jK">
                                        Perempuan
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                        <div class="colom-sm-2">
                            <img src="/img/<?= $users->foto; ?>" class="img-thumbnail img-preview mt-3" style="width: 100px;">
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-danger ml-2 tambahData float-end">Ubah Data</button>
                <a href="/akun" type="submit" class="btn btn-secondary tambahData float-end">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>