<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/dosbim/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Bimbingan Kerja Praktek Mahasiswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Tanggal Bimbingan</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Judul Penelitian / Kerja Praktek</th>
                            <th>Judul Bimbingan</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Upload Revisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach($data_bimbingan as $row):?>
                        <tr>
                            <td class="align-middle text-center"><?=$i++?></td>
                            <td class="align-middle"><?=$row['tgl_bimbingan']?></td>
                            <td class="align-middle"><?=$row['nim']?></td>
                            <td class="align-middle"><?=$row['nama_mahasiswa']?></td>
                            <td class="align-middle"><?=$row['judul_praker']?></td>
                            <td class="align-middle"><?=$row['judul_bimbingan']?></td>
                            <td class="align-middle text-center">
                                <a href="" class="btn btn-warning btn-md" title="Baca Selengkapnya"><i class="fa fa-book"></i> Buka</a>
                                <a href="" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download" aria-hidden="true"></i> Unduh</a>
                                <form action="/dosen/dashboard/actionSetBimbingan" method="post">
                                    <input type="hidden" value="<?=$row['id_bimbingan']?>" name="id_bimbingan">
                                    <button class="btn btn-success"><i class="fas fa-check mr-2"></i> Lanjut</button>
                                </form>
                            </td>
                            <td class="align-middle text-center">
                                <a href="" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
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