<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="my-3">Edit User</h2>
            <form action="/users/update/<?= $users['userid']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="userid" value="<?= $users['userid']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $users['foto']; ?>">
                <div class="row mb-1">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= (old('username')) ? old('username') : $users['username'] ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $users['email'] ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-4">
                        <select class="form-select <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" type="text" id="role" name="role" value="<?= (old('role')) ? old('role') : $users['role'] ?>">
                            <?php if ($users['role'] === 'admin') { ?>
                                <option selected value="1">Admin</option>
                                <option value="2">Pimpinan</option>
                            <?php } ?>
                            <?php if ($users['role'] === 'pimpinan') { ?>
                                <option value="1">Admin</option>
                                <option selected value="2">Pimpinan</option>
                            <?php } ?>
                            <?php if ($users['role'] === 0) { ?>
                                <option selected>Pilih Role...</option>
                                <option value="1">Admin</option>
                                <option value="2">Pimpinan</option>
                            <?php } ?>
                        </select>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('role'); ?>
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
                            <img src="/img/<?= $users['foto']; ?>" class="img-thumbnail img-preview mt-3" style="width: 100px;">
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-danger ml-2 tambahData float-end">Ubah Data</button>
                <a href="/users" type="submit" class="btn btn-secondary tambahData float-end">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>