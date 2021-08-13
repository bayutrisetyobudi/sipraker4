<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/dosbim/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Bimbingan Kerja Praktek Mahasiswa Tervalidasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Bimbingan</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Judul Penelitian / Kerja Praktek</th>
                            <th>Judul Bimbingan</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($data_bimbingan as $row):
                            $class_btn = "";
                        switch($row['status_bimbingan']){
                            case "Lanjut":
                                $class_btn = "success";
                                break;
                            case "Revisi":
                                $class_btn = "danger";
                                break;
                        }
                        ?>
                        <tr>
                            <td class="text-center align-middle"><?=$i++?></td>
                            <td class="align-middle"><?=$row['tgl_bimbingan']?></td>
                            <td class="align-middle"><?=$row['nim']?></td>
                            <td class="align-middle"><?=$row['nama_mahasiswa']?></td>
                            <td class="align-middle"><?=$row['judul_praker']?></td>
                            <td class="align-middle"><?=$row['judul_bimbingan']?></td>
                            <td class="text-center">
                                <a href="<?=base_url('bimbingan/'.$row['up_bimbingan'])?>" download="<?= $row['judul_bimbingan'] ?>" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download mr-2" aria-hidden="true"></i> Unduh</a>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-<?=$class_btn?> btn-sm"><i class="fa fa-exit" aria-hidden="true"></i> <?=$row['status_bimbingan']?></button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>