<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="card mt-3">
    <div class="card-body">
        <h5 class="card-title float-left">List Karyawan</h5>
        <a href="/karyawan/create" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm float-right" style="margin-top: -5px;">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Tambah Data</a>
        <div class="table-responsive">
            <table id="patient-table" class="table table-hover align-middle mb-0" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Telpon</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Jenis<br>Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($karyawan as $k) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $k['id']; ?></td>
                            <td><img src="<?= base_url(); ?>/images/<?= $k['foto']; ?>" class="avatar sm rounded-circle me-2" alt="profile-image" style="width: 30px; height: 30px;"><span><?= $k['nama']; ?></span></td>
                            <td><?= $k['jabatan']; ?></td>
                            <td><?= $k['email']; ?></td>
                            <td><?= $k['no_hp']; ?></td>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['tempat_lahir']; ?>, <?= $k['tgl_lahir']; ?>
                            </td>
                            <td><?= $k['jenis_kelamin']; ?></td>
                            <td class="btn">
                                <a href="/karyawan/<?= $k['id']; ?>" class="btn btn-primary btn-circle mt-2">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <form action="/karyawan/<?= $k['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-circle mt-2"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>