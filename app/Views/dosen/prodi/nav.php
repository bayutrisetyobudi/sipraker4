<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('/dosen/kaprodi/dashboard')?>">
        <div class="sidebar-brand-icon rotate-n-1">
            <img src="<?=base_url('assets/img/logo.png')?>" style="height: 50px; width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">SIPRAKER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('/dosen/kaprodi/dashboard')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Mahasiswa
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/kaprodi/dashboard/mahasiswa')?>">
            <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Data Mahasiswa</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Data Dosen
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/kaprodi/dashboard/dosen')?>">
            <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Data Dosen</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Pengajuan Kerja Praktek
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/kaprodi/dashboard/pengajuan')?>">
            <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Data Pengajuan</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/kaprodi/dashboard/tervalidasi')?>">
            <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Data Tervalidasi</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= route_to('dosen/login') ?>">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Log Out</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->