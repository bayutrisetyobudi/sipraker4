<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/prodi/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Kerja Praktek Mahasiswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Instansi / Perusahaan</th>
                            <th>Judul Penelitian / Kerja Praktek</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2011/04/25</td>
                            <td>2018420133</td>
                            <td>Dendy Zulfikar</td>
                            <td>PT. CAHAYA ILAHI</td>
                            <td>Sistem Abal - Abal</td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm" title="Cek Selengkapnya"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="" class="btn btn-success btn-sm" title="Validasi"><i class="fa fa-check"></i> Validasi</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2011/05/12</td>
                            <td>2018420047</td>
                            <td>Bayu Tri Setyo Budi</td>
                            <td>PT. CAHAYA ILAHI</td>
                            <td>Sistem Informasi Kenduren</td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm" title="Cek Selengkapnya"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="" class="btn btn-success btn-sm" title="Validasi"><i class="fa fa-check"></i> Validasi</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>