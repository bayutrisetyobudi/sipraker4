<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('mahasiswa/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Kerja Praktek Anda</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
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
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data_kp as $row) :
                                $btn_class = "";
                                switch ($row['acc']) {
                                    case "Menunggu":
                                        $btn_class = "warning";
                                        break;
                                    case "Ditolak":
                                        $btn_class = "danger";
                                        break;
                                    case "Tervalidasi":
                                        $btn_class = "success";
                                        break;
                                }
                            ?>
                                <tr>
                                    <td class="align-middle"><?= $i++ ?></td>
                                    <td class="align-middle"><?= $row['tgl_pengajuan'] ?></td>
                                    <td class="align-middle"><?= $row['nama_instansi'] ?></td>
                                    <td class="align-middle"><?= $row['judul_praker'] ?></td>
                                    <td class="text-center align-middle"><?= $row['dosbim'] ? $row['dosbim'] : '<span class="badge badge-danger">Belum dapat</span>' ?></th>

                                    <td class="text-center align-middle">
                                        <a class="btn btn-<?= $btn_class ?> btn-md"><?= $row['acc'] ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- <tr>
                                <td>2</td>
                                <td>2011/05/12</td>
                                <td>PT. CAHAYA ILAHI</td>
                                <td>Sistem Informasi Kenduren</td>
                                <td class="text-center">Edwan Budi, S.kom,.M.kom.</td>

                                <td class="text-center">
                                    <a class="btn btn-success btn-md"> Tervalidasi</a>
                                </td>

                            </tr> -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>