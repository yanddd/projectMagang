<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row mt-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title float-left">List User</h5>
                <a href="/users/create" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm float-right" style="margin-top: -5px;">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Tambah User</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($users as $u) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/images/<?= $u['foto']; ?>" class="imgUU"></td>
                                    <td><?= $u['username']; ?></td>
                                    <td><?= $u['email']; ?></td>
                                    <td>
                                        <?php foreach ($grup as $g) : ?>
                                            <?php if ($u['userid'] === $g['user_id']) { ?>
                                                <form action="/users/changeRole/<?= $g['id']; ?>" method="post" enctype="multipart/form-data">
                                                    <?= csrf_field(); ?>
                                                    <?php if ($u['userid'] !== user()->id) { ?>
                                                        <input type="hidden" name="id" value="<?= $g['id']; ?>">
                                                        <input type="hidden" name="group_id" value="<?= ($g['group_id'] == '1') ? 2 : 1 ?>">
                                                        <button type="submit" class="badge badge-<?= ($g['group_id'] == '1') ? 'success' : 'primary' ?>">
                                                            <?= $u['role']; ?>
                                                        </button>
                                                    <?php } else { ?>
                                                        <a class="badge badge-<?= ($g['group_id'] == '1') ? 'success' : 'primary' ?>">
                                                            <?= $u['role']; ?>
                                                        </a>
                                                    <?php } ?>
                                                    <?php if ($u['userid'] === user()->id) { ?>
                                                        (<b>You</b>)
                                                    <?php } ?>
                                                </form>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?php if ($u['active'] === "1") { ?>
                                            <a class="badge badge-success">Aktif</a>
                                        <?php } else { ?>
                                            <a class="badge badge-secondary">Tidak Aktif</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($u['userid'] === user()->id) { ?>
                                            <a href="/akun" class="btn btn-primary btn-circle mt-2">
                                                <i class="fas fa-info"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="/users/<?= $u['userid']; ?>" class="btn btn-primary btn-circle mt-2">
                                                <i class="fas fa-info"></i>
                                            </a>
                                        <?php } ?>
                                        <form action="/users/<?= $u['userid']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?php if ($u['userid'] !== user()->id) { ?>
                                                <button type="submit" class="btn btn-warning btn-circle mt-2" id="alert_demo_4"><i class="fas fa-trash"></i></button>
                                            <?php } else { ?>
                                                <a type="submit" class="btn btn-secondary btn-circle mt-2" id="alert_demo_4"><i class="fas fa-trash"></i></a>
                                            <?php } ?>
                                        </form>
                                        <form action="/users/changeActive/<?= $u['userid']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?= $u['userid']; ?>">
                                            <input type="hidden" name="active" value="<?= ($u['active'] == '1') ? 0 : 1 ?>">
                                            <?php if ($u['userid'] !== user()->id) { ?>
                                                <button type="submit" class="btn btn-danger btn-circle mt-2" id="alert_demo_4"><i class="fas fa-power-off"></i></button>
                                            <?php } else { ?>
                                                <a type="submit" class="btn btn-secondary btn-circle mt-2"><i class="fas fa-power-off"></i></a>
                                            <?php } ?>
                                        </form>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>