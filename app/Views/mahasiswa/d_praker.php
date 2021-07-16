<?=$this->extend('layout/dashboard')?>
<?=$this->section('sidebar')?>
<?=$this->include('mahasiswa/nav')?>
<?=$this->endSection()?>
<?=$this->section('content')?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pengajuan Kerja Praktek Anda</h1>
        <p class="mb-4">Data Pengajuan Kerja Praktek Anda</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Kerja Praktek </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Instansi / Perusahaan</th>
                                <th>Judul Penelitian / Kerja Praktek</th>
                                <th>Dosen Pembimbing</th>
                                <th class="text-center">Status</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Instansi / Perusahaan</th>
                                <th>Judul Penelitian / Kerja Praktek</th>
                                <th class="text-center">Dosen Pembimbing</th>
                                <th class="text-center">Status</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2011/04/25</td>
                                <td>PT. CAHAYA ILAHI</td>
                                <td>Sistem Kenduren</td>
                                <th class="text-center"><span class="badge badge-danger">Belum dapat</span></th>

                                <td class="text-center">
                                    <a href="" class="btn btn-danger btn-md" title="Cek Keterangan"><i class="fa fa-eye"></i> Ditolak</a>
                                </td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2011/05/12</td>
                                <td>PT. CAHAYA ILAHI</td>
                                <td>Sistem Informasi Kenduren</td>
                                <td class="text-center">Edwan Budi, S.kom,.M.kom.</td>

                                <td class="text-center">
                                    <a class="btn btn-success btn-md"> Tervalidasi</a>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>