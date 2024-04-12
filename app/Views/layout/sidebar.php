<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="/">
            <img src="<?= base_url(); ?>/images/logo2.png" class="logo-icon" alt="logo icon">
            <img class="logo-text w-50" src="<?= base_url(); ?>/images/logo1.png">
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
            <a href="/">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="/karyawan">
                <i class="zmdi zmdi-accounts-outline"></i> <span>Karyawan</span>
            </a>
        </li>

        <li>
            <a href="/penggajian">
                <i class="fas fa-hand-holding-usd"></i> <span>Penggajian</span>
            </a>
        </li>

        <li>
            <a href="/akun">
                <i class="zmdi zmdi-account-box"></i> <span>Info Akun</span>
            </a>
        </li>

        <li>
            <a href="/users">
                <i class="zmdi zmdi-accounts"></i> <span>Users</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-file-alt"></i> <span>Laporan</span>
            </a>
        </li>

        <li>
            <a href="<?= base_url('logout'); ?>">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </a>
        </li>

    </ul>

</div>