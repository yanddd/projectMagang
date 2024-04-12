<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="row mt-3">
    <div class="col-lg-4">
        <?php foreach ($grup as $g) : ?>
            <?php if (user()->id === $g['userid']) { ?>
                <div class="card profile-card-2">
                    <div class="card-img-block">
                        <img class="img-fluid" src="<?= base_url(); ?>/images/<?= user()->foto; ?>" alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="<?= base_url(); ?>/images/<?= user()->foto; ?>" alt="profile-image" class="profile" style="width: 70px; height: 70px;">
                        <h5 class="card-title"><?= user()->username; ?></h5>
                        <div class="job badge badge-<?= ($g['group_id'] == '1') ? 'success' : 'primary' ?>"><?= $g['role']; ?></div>
                        <div class="social-media" style="text-align: center;">
                            <a class="btn btn-info btn-twitter ">
                                <span class="btn-label just-icon"> </span>
                            </a>
                            <a class="btn btn-danger " rel="publisher">
                                <span class="btn-label just-icon"> </span>
                            </a>
                            <a class="btn btn-primary " rel="publisher">
                                <span class="btn-label just-icon"> </span>
                            </a>
                            <a class="btn btn-danger " rel="publisher">
                                <span class="btn-label just-icon"> </span>
                            </a>
                        </div>
                        <div class="view-profile mt-2">
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#fotoModal">View Full Photo Profile</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade mt-5" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content" style="border-radius: 5%;">
                                    <img src="<?= base_url(); ?>/images/<?= user()->foto; ?>" style="border-radius: 5%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link <?= session('isChangePw') ? '' : 'active' ?>"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#changePW" data-toggle="pill" class="nav-link  <?= session('isChangePw') ? 'active' : '' ?>"><i class="icon-lock"></i> <span class="hidden-xs">Change Password</span></a>
                    </li>
                </ul>
                <div class="tab-content p-3">
                    <div class="tab-pane <?= session('isChangePw') ? '' : 'active' ?>" id="profile">
                        <h5 class="mb-3">User Profile</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Full Name</h6>
                                <p>
                                    <?= user()->nama_depan . ' ' . user()->nama_belakang; ?>
                                </p>
                                <h6>Email</h6>
                                <p>
                                    <?= user()->email; ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6>Birth Date</h6>
                                <p>
                                    <?= user()->tanggal_lahir; ?>
                                </p>
                                <h6>Gender</h6>
                                <p>
                                    <?= user()->jK; ?>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2 mb-3"><span class="fas fa-plus float-right"></span> More</h5>
                                <hr>
                                <h6>Phone</h6>
                                <p>
                                    <?= user()->no_hp; ?>
                                </p>
                                <h6>Address</h6>
                                <p>
                                    <?= user()->alamat; ?>
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="edit">
                        <form action="/akun/update/<?= user_id(); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= user_id(); ?>">
                            <input type="hidden" name="fotoLama" value="<?= user()->foto; ?>">
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="nama_depan" name="nama_depan" autofocus value="<?= user()->nama_depan; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" id="nama_belakang" name="nama_belakang" type="text" value="<?= user()->nama_belakang; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control" id="username" name="username" type="text" value="<?= user()->username; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" id="email" name="email" value="<?= user()->email; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="alamat" name="alamat" value="<?= user()->alamat; ?>" placeholder="Street">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" id="no_hp" name="no_hp" value="<?= user()->no_hp; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Birth Day</label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= user()->tanggal_lahir; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                <div class="col-sm-8">
                                    <div class="row ml-1">
                                        <?php if (user()->jK === 'laki-laki') { ?>
                                            <div class="form-check col-sm-3">
                                                <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="laki-laki" type="radio" checked>
                                                <label class="form-check-label" for="jK">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-sm-3 float-right">
                                                <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="perempuan" type="radio">
                                                <label class="form-check-label" for="jK">
                                                    Female
                                                </label>
                                            </div>
                                        <?php } ?>
                                        <?php if (user()->jK === 'perempuan') { ?>
                                            <div class="form-check col-sm-3">
                                                <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="laki-laki" type="radio">
                                                <label class="form-check-label" for="jK">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-sm-3 float-right">
                                                <input class="form-check-input <?= ($validation->hasError('jK')) ? 'is-invalid' : ''; ?>" id="jK" name="jK" value="perempuan" type="radio" checked>
                                                <label class="form-check-label" for="jK">
                                                    Female
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Change Profile</label>
                                <div class="col-lg-4">
                                    <div class="custom-file">
                                        <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                    </div>
                                    <div class="colom-sm-2">
                                        <img src="/images/<?= user()->foto; ?>" class="img-thumbnail img-preview mt-3" style="width: 100px;">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ml-1 float-right">
                                Change Password
                            </button>
                            <button type="reset" class="btn btn-danger float-end">
                                Reset
                            </button>

                        </form>
                    </div>
                    <div class="tab-pane <?= session('isChangePw') ? 'active' : '' ?>" id="changePW">
                        <form action="<?= route_to("akun.changepassword") ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control <?php if (session('errors.current_pass')) : ?>is-invalid<?php endif ?>" name="current_pass">
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control <?php if (session('errors.new_pass')) : ?>is-invalid<?php endif ?>" name="new_pass">
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.new_pass') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Repeat New Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control <?php if (session('errors.repeat_pass')) : ?>is-invalid<?php endif ?>" name="repeat_pass">
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.repeat_pass') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary float-right">Change Password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>