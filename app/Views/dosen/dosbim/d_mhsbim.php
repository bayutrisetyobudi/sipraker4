<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/dosbim/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa Kerja Praktek Yang Anda Pegang</h1>
            <p class="mb-4">Data Mahasiswa Kerja Praktek Yang Anda Pegang</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa Kerja Praktek Yang Anda Pegang</h6>
                </div>
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
                                    <th class="text-center">Status</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Instansi / Perusahaan</th>
                                    <th>Judul Penelitian / Kerja Praktek</th>
                                    <th class="text-center">Status</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2011/04/25</td>
                                    <td>2018420133</td>
                                    <td>Dendy Zulfikar</td>
                                    <td>PT. CAHAYA ILAHI</td>
                                    <td>Sistem Abal - Abal</td>
                                    <td class="text-center">

                                        <a href="" class="btn btn-success btn-sm" title="Validasi"><i class="fa fa-check"></i> Tervalidasi</a>

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

                                        <a href="" class="btn btn-success btn-sm" title="Validasi"><i class="fa fa-check"></i> Tervalidasi</a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?= $this->endSection() ?>
<!-- End of Main Content -->