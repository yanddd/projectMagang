<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row mt-3 align-items-center justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambah Data Karyawan</div>
                <hr>
                <form action="/karyawan/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-1">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Karyawan</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= old('jabatan'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('jabatan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="no_hp" class="col-sm-3 col-form-label">Telpon</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('no_hp'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm">
                            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('tempat_lahir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('tgl_lahir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <div class="row ml-1">
                                <div class="form-check col-sm-3">
                                    <input class="form-check-input <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" type="radio">
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check col-sm-3 float-right">
                                    <input class="form-check-input <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" type="radio">
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="foto" class="col-sm-3 col-form-label">Foto Karyawan</label>
                        <div class="col-sm-4">
                            <div class="custom-file">
                                <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                            </div>
                            <div class="colom-sm-2">
                                <img src="/images/default2.jpg" class="img-thumbnail img-preview mt-3" style="width: 100px;">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-light ml-2 tambahData float-end">Tambah Data</button>
                    <a href="/karyawan" type="submit" class="btn btn-secondary tambahData float-end">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>