<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/dosbim/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Bimbingan Kerja Praktek Mahasiswa</h1>

    <?php if ($validation->hasError('revisi')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $validation->getError('revisi') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

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
                        $i = 1;
                        foreach ($data_bimbingan as $row) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++ ?></td>
                                <td class="align-middle"><?= $row['tgl_bimbingan'] ?></td>
                                <td class="align-middle"><?= $row['nim'] ?></td>
                                <td class="align-middle"><?= $row['nama_mahasiswa'] ?></td>
                                <td class="align-middle"><?= $row['judul_praker'] ?></td>
                                <td class="align-middle"><?= $row['judul_bimbingan'] ?></td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('bimbingan/' . $row['up_bimbingan']) ?>" download="<?= $row['judul_bimbingan'] ?>" class="btn btn-primary btn-md" title="Unduh Sekarang"><i class="fa fa-download mr-2" aria-hidden="true"></i> Unduh</a>
                                    <form action="/dosen/dashboard/actionSetBimbingan" method="post" class="d-inline">
                                        <input type="hidden" value="<?= $row['id_bimbingan'] ?>" name="id_bimbingan">
                                        <button class="btn btn-success"><i class="fas fa-check mr-2"></i> Lanjut</button>
                                    </form>
                                </td>
                                <td class="align-middle text-center">
                                    <button id="fileButton" class="btn btn-danger btn-md" title="Unduh Sekarang" onclick="$('#idBimbingan').val('<?= $row['id_bimbingan'] ?>');$('#uploadRevisi').modal({backdrop:'static'})"><i class="fa fa-upload mr-2" aria-hidden="true"></i> Upload</button>
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
<div class="modal fade" id="uploadRevisi" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/dosen/dashboard/actionSetBimbingan" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="custom-file">
                        <input hidden name="id_bimbingan" id="idBimbingan">
                        <input id="revisiFile" class="custom-file-input" name="revisi" type="file" accept=".doc,.docx">
                        <label id="fileLabel" class="custom-file-label" for="revisiFile">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn_revisi" class="btn btn-danger">
                        <i class="fas fa-upload mr-2"></i>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#revisiFile').on('change', function() {
        const fileName = $(this)[0].files[0].name;
        $('#fileLabel').html(fileName);
    });
</script>
<?= $this->endSection() ?>