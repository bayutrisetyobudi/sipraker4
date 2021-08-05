<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/prodi/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Kerja Praktek Mahasiswa Tervalidasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Instansi / Perusahaan</th>
                            <th>Judul Penelitian / Kerja Praktek</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach($data_tervalidasi as $row):
                        ?>
                        <tr>
                            <td class="text-center"><?=$i++?></td>
                            <td><?=$row['tgl_pengajuan']?></td>
                                <td><?=$row['nim']?></td>
                                <td><?=$row['nama_mahasiswa']?></td>
                                <td><?=$row['nama_instansi']?></td>
                                <td><?=$row['judul_praker']?></td>
                            <td class="text-center"><span class="badge badge-success"><?=$row['acc']?></span></td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm" title="Cek Selengkapnya"><i class="fa fa-eye mr-2"></i> Lihat</a>

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