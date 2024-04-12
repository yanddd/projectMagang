<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Form Loker</h1>
            <form action="/loker/saveCalon" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="username" value="<?= user()->username; ?>">
                <div class="row mb-3">
                    <label for="nama_calon" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_calon" name="nama_calon" value="<?= old('nama_calon'); ?>" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_calon" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat_calon" name="alamat_calon" value="<?= old('alamat_calon'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_loker" class="col-sm-3 col-form-label">Nama Loker</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_loker" name="nama_loker" value="<?= (old('nama_loker')) ? old('nama_loker') : $loker['nama_loker'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_loker" class="col-sm-3 col-form-label">Jenis Loker</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis_loker" name="jenis_loker" value="<?= (old('jenis_loker')) ? old('jenis_loker') : $loker['jenis_loker'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= (old('nama_perusahaan')) ? old('nama_perusahaan') : $loker['nama_perusahaan'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input class="form-control" type="file" id="sampul" name="sampul" onchange="previewImg()">
                        </div>
                        <div class="colom-sm-3">
                            <img src="/img/default2.jpg" class="img-thumbnail img-preview mt-3" style="width: 100px;">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-4 tambahFormulir">Kirim Formulir</button>
                <p class="float-right rules">Sebelum mengirim formulir harap di baca aturan yang ada di bawah</p>
            </form>
            <h5>Aturan pengisian formulir:</h5>
            <ul>
                <li>Setiap akun hanya boleh mengisi 1 formulir</li>
                <li>Nama dan alamat wajib di isi</li>
                <li>Foto yang di upluad harus berformat jpg, jpeg, dan png serta ukuran maksimalnya adalah 1mb</li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>