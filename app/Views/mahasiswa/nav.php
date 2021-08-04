<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/mahasiswa/dashboard/index') ?>">
        <div class="sidebar-brand-icon rotate-n-1">
            <img src="<?= base_url('assets/img/logo.png') ?>" style="height: 50px; width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">SIPRAKER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/mahasiswa/dashboard/index') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Kerja Praktek</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('/mahasiswa/dashboard/daftar/') ?>">Pengajuan KP</a>
                <a class="collapse-item" href="<?= base_url('/mahasiswa/dashboard/validasi/') ?>">Data Pengajuan KP</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Bimbingan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('/mahasiswa/dashboard/daftar_bimbingan/') ?>">Mulai Bimbingan</a>
                <a class="collapse-item" href="<?= base_url('/mahasiswa/dashboard/bimbingan/') ?>">Data Bimbingan Anda</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <form action="/mahasiswa/dashboard/actionLogout" method="post">
            <button type="submit" class="nav-link" style="background-color: transparent;border:0">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                <span>Log Out</span>
            </button>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->