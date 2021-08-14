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
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            Berhasil menghapus pengajuan Bimbingan !
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
                                    <a href="<?= base_url('bimbingan/' . $row['up_bimbingan']) ?>" download="<?= $row['judul_bimbingan'] ?>" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download mr-2" aria-hidden="true"></i> Unduh</a>
                                    <?php if ($row['status_bimbingan'] == 'Revisi') : ?>
                                        <a href="<?= base_url('revisi/' . $row['up_revisi']) ?>" download="revisi_<?= $row['judul_bimbingan'] ?>" class="btn btn-danger btn-md" title="Unduh Sekarang"><i class="fa fa-download mr-2" aria-hidden="true"></i> Unduh Revisi</a>
                                    <?php endif; ?>
                                    <?php if ($row['status_bimbingan'] == 'Menunggu') : ?>
                                        <button onclick="$('#id_bimbingan').val('<?= $row['id_bimbingan'] ?>');$('#hapusBimbingan').modal({backdrop:'static'})" class="btn btn-danger btn-md">
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
<?= $this->endSection() ?>
<?= $this->section('modal') ?>
<!-- Modal -->
<div class="modal fade" id="hapusBimbingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Bimbingan</h5>
            </div>
            <div class="modal-body">
                <p>Apa anda yakin ingin menghapus bimbingan ini ?</p>
            </div>
            <div class="modal-footer">
                <form action="/mahasiswa/dashboard/actionDeleteBimbingan" method="post">
                    <input type="hidden" name="id_bimbingan" id="id_bimbingan">
                    <button type="submit" class="btn btn-primary">OK</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>