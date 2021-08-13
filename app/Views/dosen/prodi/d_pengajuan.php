<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('dosen/prodi/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Content Row -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Kerja Praktek Mahasiswa</h1>
    
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
                            <th>Tanggal Pengajuan</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Instansi / Perusahaan</th>
                            <th>Judul Penelitian / Kerja Praktek</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data_pengajuan as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $row['tgl_pengajuan'] ?></td>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama_mahasiswa'] ?></td>
                                <td><?= $row['nama_instansi'] ?></td>
                                <td><?= $row['judul_praker'] ?></td>
                                <td class="text-center">
                                    <button onclick="$('#id_praker').val('<?= $row['id_praker'] ?>');$('#tolakPengajuan').modal({backdrop:'static'})" class="btn btn-danger btn-sm"><i class="fa fa-times mr-2"></i> Tolak</button>
                                    <form action="/dosen/dashboard/actionUpdateAcc" method="post" class="d-inline">
                                        <input type="hidden" name="id_praker" value="<?= $row['id_praker'] ?>">
                                        <button type="submit" name="validasi" class="btn btn-success btn-sm"><i class="fa fa-check mr-2"></i> Validasi</button>
                                    </form>
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
<div class="modal fade" id="tolakPengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/dosen/dashboard/actionUpdateAcc" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_praker" id="id_praker">
                    <textarea rows="5" class="form-control" name="alasan" required placeholder="masukkan alasan ditolak...."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="tolak" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>