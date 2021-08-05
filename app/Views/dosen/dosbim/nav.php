<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('/dosen/dosbim/dashboard')?>">
        <div class="sidebar-brand-icon rotate-n-1">
            <img src="<?= base_url('assets/img/logo.png') ?>" style="height: 50px; width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">SIPRAKER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('/dosen/dosbim/dashboard')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Mahasiswa Bimbingan
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/dosbim/dashboard/mahasiswa')?>">
            <i class="fas fa-users fa-sm fa-fw mr-2 "></i>
            <span>Data Mahasiswa</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->

    <!-- Heading -->
    <div class="sidebar-heading">
        Bimbingan
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/dosbim/dashboard/bimbingan')?>">
            <i class="fas fa-clipboard-list fa-sm fa-fw mr-2"></i>
            <span>Data Bimbingan </span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('/dosen/dosbim/dashboard/tervalidasi')?>">
            <i class="fas fa-clipboard-check fa-sm fa-fw mr-2 "></i>
            <span>Bimbingan Tervalidasi</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <form action="/dosen/dashboard/actionLogout" method="POST">
            <button class="nav-link" type="submit" style="background-color: transparent;border:0">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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