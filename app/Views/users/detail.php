<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row mt-3">
    <div class="col-lg-4">
        <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="<?= base_url(); ?>/images/<?= $users['foto']; ?>" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
                <img src="<?= base_url(); ?>/images/<?= $users['foto']; ?>" alt="profile-image" class="profile" style="width: 70px; height: 70px;">
                <h5 class="card-title"><?= $users['username']; ?></h5>
                <div class="job badge badge-<?= ($users['group_id'] == '1') ? 'success' : 'primary' ?>"><?= $users['role']; ?></div>
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
                            <img src="<?= base_url(); ?>/images/<?= $users['foto']; ?>" style="border-radius: 5%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                    </li>
                </ul>
                <div class="tab-content p-3">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">User Profile</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Full Name</h6>
                                <p>
                                    <?= $users['nama_depan'] . ' ' . $users['nama_belakang']; ?>
                                </p>
                                <h6>Email</h6>
                                <p>
                                    <?= $users['email']; ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6>Birth Date</h6>
                                <p>
                                    <?= $users['tanggal_lahir']; ?>
                                </p>
                                <h6>Gender</h6>
                                <p>
                                    <?= $users['jK']; ?>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2 mb-3"><span class="fas fa-plus float-right"></span> More</h5>
                                <hr>
                                <h6>Phone</h6>
                                <p>
                                    <?= $users['no_hp']; ?>
                                </p>
                                <h6>Address</h6>
                                <p class="float-left">
                                    <?= $users['alamat']; ?>
                                </p>
                                <a href="/users" class="btn btn-secondary float-right" style="margin-top: -5px;">Kembali</a>
                            </div>
                            <!-- <div class="col-md-6 float-right">
                                
                            </div> -->
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>