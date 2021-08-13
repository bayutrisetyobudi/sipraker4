<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('mahasiswa/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
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
                        foreach ($data_bimbingan as $row) :
                            $badge_class = "";
                            switch ($row['status_bimbingan']) {
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
                                <td class="align-middle text-center"><?= $i++ ?></td>
                                <td class="align-middle"><?= $row['tgl_bimbingan'] ?></td>
                                <td class="align-middle"><?= $row['judul_bimbingan'] ?></td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-<?= $badge_class ?>"><?= $row['status_bimbingan'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?=base_url('bimbingan/'.$row['up_bimbingan'])?>" download="<?= $row['judul_bimbingan'] ?>" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download mr-2" aria-hidden="true"></i> Unduh</a>
                                    <?php if ($row['status_bimbingan'] == 'Revisi') : ?>
                                        <a href="<?=base_url('revisi/'.$row['up_revisi'])?>" download="revisi_<?= $row['judul_bimbingan'] ?>" class="btn btn-danger btn-md" title="Unduh Sekarang"><i class="fa fa-download mr-2" aria-hidden="true"></i> Unduh Revisi</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>