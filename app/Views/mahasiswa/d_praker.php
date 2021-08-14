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
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success" role="alert">
                Berhasil menghapus pengajuan Kerja Praktek !
            </div>
        <?php endif; ?>
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
                                    <td class="text-center align-middle"><?= $i++ ?></td>
                                    <td class="align-middle"><?= $row['tgl_pengajuan'] ?></td>
                                    <td class="align-middle"><?= $row['nama_instansi'] ?></td>
                                    <td class="align-middle"><?= $row['judul_praker'] ?></td>
                                    <td class="text-center align-middle"><?= $row['dosbim'] ? $row['nama_dosen'] : '<span class="badge badge-danger">Belum dapat</span>' ?></th>

                                    <td class="text-center align-middle">
                                        <?php if ($row['acc'] == 'Ditolak') : ?>
                                            <button onclick="$('#message').html('<?= $row['keterangan'] ?>');$('#pengajuanDitolak').modal()" class="btn btn-<?= $btn_class ?> btn-md">
                                                <i class="fas fa-eye mr-2"></i>
                                                <?= $row['acc'] ?>
                                            </button>
                                        <?php else : ?>
                                            <button class="btn btn-<?= $btn_class ?> btn-md">
                                                <?= $row['acc'] ?>
                                            </button>
                                        <?php endif; ?>
                                        <?php if ($row['acc'] == 'Menunggu') : ?>
                                            <button onclick="$('#id_pengajuan').val('<?= $row['id_praker'] ?>');$('#hapusPengajuan').modal({backdrop:'static'})" class="btn btn-danger btn-md">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
</div>
<?= $this->endSection() ?>
<?= $this->section('modal') ?>
<!-- Modal -->
<div class="modal fade" id="pengajuanDitolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Ditolak</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusPengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pengajuan</h5>
            </div>
            <div class="modal-body">
                <p>Apa anda yakin ingin menghapus pengajuan ini ?</p>
            </div>
            <div class="modal-footer">
                <form action="/mahasiswa/dashboard/actionDeletePengajuan" method="post">
                    <input type="hidden" name="id_pengajuan" id="id_pengajuan">
                    <button type="submit" class="btn btn-primary">OK</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>