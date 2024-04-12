<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Detail Loker</h2>
            <div class="row mb-3">
                <img src="/img/<?= $loker['sampul']; ?>" class="img-fluid" style="width: 400px;">
            </div>
            <div class="row">
                <label for="nama_loker" class="col-sm-3 col-form-label">Nama Loker</label>
                <div class="col-sm-8">
                    <h5 class="card-text">: <?= $loker['nama_loker']; ?></h5>
                </div>
            </div>
            <div class="row">
                <label for="jenis_loker" class="col-sm-3 col-form-label">Jenis Loker</label>
                <div class="col-sm-8">
                    <h5 class="card-text">: <?= $loker['jenis_loker']; ?></h5>
                </div>
            </div>
            <div class="row">
                <label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                <div class="col-sm-8">
                    <h5 class="card-text">: <?= $loker['nama_perusahaan']; ?></h5>
                </div>
            </div>
            <div class="row mb-3">
                <p class="card-text">
                    <?= $loker['tentang_perusahaan']; ?>
                </p>
            </div>
            <?php if (in_groups('admin')) : ?>
                <div class="tombolD">
                    <a href="/loker/edit/<?= $loker['slug']; ?>" class="btn btn-warning">Edit</a>
                </div>
            <?php endif; ?>
            <?php if (in_groups('user')) : ?>
                <form action="/loker/saveCalon" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_calon" value="<?= user()->id; ?>">
                    <input type="hidden" name="username" value="<?= user()->username; ?>">
                    <input type="hidden" name="nama_calon" value="<?= user()->full_name; ?>">
                    <input type="hidden" name="alamat_calon" value="<?= user()->alamat; ?>">
                    <input type="hidden" name="no_hp" value="<?= user()->no_hp; ?>">
                    <input type="hidden" name="sampul" value="<?= user()->sampul; ?>">
                    <input type="hidden" name="id_loker" value="<?= $loker['id']; ?>">
                    <input type="hidden" name="nama_loker" value="<?= $loker['nama_loker']; ?>">
                    <input type="hidden" name="jenis_loker" value="<?= $loker['jenis_loker']; ?>">
                    <input type="hidden" name="nama_perusahaan" value="<?= $loker['nama_perusahaan']; ?>">
                    <div class="tombolD">
                        <button type="submit" class="btn btn-primary mb-4 tambahFormulir">Pilih Loker</button>
                    </div>
                </form>
            <?php endif; ?>
            <div class="back">
                <a href="/loker">
                    <h1 class="fas fa-backspace"></h1>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>