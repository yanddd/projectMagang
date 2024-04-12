<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar">
                    <input type="text" class="form-control" placeholder="Enter keywords">
                    <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                </form>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="mr-1 d-none d-lg-inline small">
                        <?= user()->username; ?>
                    </span>
                    <span class="user-profile"><img src="<?= base_url(); ?>/images/<?= user()->foto; ?>" class="img-circle" alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="/akun">
                            <div class="media">
                                <div class="avatar"> <img src="<?= base_url(); ?>/images/<?= user()->foto; ?>" class="logo-icon" alt="logo icon"></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">
                                        <?php if (in_groups('admin')) : ?>
                                            <b>Admin </b>
                                        <?php endif; ?>
                                        <?php if (in_groups('pimpinan')) : ?>
                                            <b>Pimpinan </b>
                                        <?php endif; ?>
                                        <?php if (logged_in()) : ?>
                                            <?= user()->username; ?>
                                        <?php endif; ?>
                                    </h6>
                                    <p class="user-subtitle"><?= user()->email; ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <a href="/akun">
                        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                    </a>
                    <li class="dropdown-divider"></li>
                    <a href="#" data-toggle="modal" data-target="#logoutModal">
                        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
                    </a>
                </ul>
            </li>
        </ul>
    </nav>
</header>