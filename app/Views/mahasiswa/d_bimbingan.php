<?=$this->extend('layout/dashboard')?>
<?=$this->section('sidebar')?>
<?=$this->include('mahasiswa/nav')?>
<?=$this->endSection()?>
<?=$this->section('content')?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Bimbingan</h1>
    <p class="mb-4">Data Bimbingan Laporan Kerja Praktek Anda</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Bimbingan</th>
                            <th>Judul Bimbingan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        foreach($data_bimbingan as $row):
                        $badge_class="";
                        switch($row['status_bimbingan']){
                            case "Menunggu":
                                $badge_class = "warning";
                                break;
                            case "Revisi":
                                $badge_class = "danger";
                                break;
                            case "Lanjut":
                                $badge_class = "success";
                                break;
                        }
                        ?>
                        <tr>
                            <td class="align-middle text-center"><?=$i++?></td>
                            <td class="align-middle"><?=$row['tgl_bimbingan']?></td>
                            <td class="align-middle"><?=$row['judul_bimbingan']?></td>
                            <td class="align-middle text-center">
                                <span class="badge badge-<?=$badge_class?>"><?=$row['status_bimbingan']?></span>
                            </td>
                            <td class="align-middle text-center">
                                <a href="" class="btn btn-warning btn-md" title="Baca Selengkapnya"><i class="fa fa-book"></i> Buka</a>
                                <a href="" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download" aria-hidden="true"></i> Unduh</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <!-- <tr>
                            <td>2</td>
                            <td>2011/07/25</td>
                            <td>Bab 1 (Sistem Kenduren)</td>
                            <td class="text-center"><span class="badge badge-success">Lanjut</span></td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-md" title="Baca Selengkapnya"><i class="fa fa-book"></i> Buka</a>
                                <a href="" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download" aria-hidden="true"></i> Unduh</a>

                            </td>
                        </tr> -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
<?=$this->endSection()?>