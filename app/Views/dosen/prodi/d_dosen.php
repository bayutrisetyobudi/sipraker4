<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/prodi/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dosen </h1>
    <p class="mb-4">Data Dosen </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Alamat</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Alamat</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>65346556868</td>
                            <td>Jeff Markona S.T,.M.T</td>
                            <td>Teknik Informatika</td>
                            <td>Amerika</td>


                        </tr>
                        <tr>
                            <td>2</td>
                            <td>65346556869</td>
                            <td>Kusomo Ageng S.T,.M.T</td>
                            <td>Teknik Informatika</td>
                            <td>Belanda</td>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>