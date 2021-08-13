<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('mahasiswa/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mulai Bimbingan Kerja Praktek Anda</h1>
    <p class="mb-4">Bimbingan dengan cara mengupload file laporan berbentuk docs/word</p>
    <?php if(session()->has('success')):?>
    <div class="alert alert-success" role="alert">
        Berhasil mengajukan bimbingan !
    </div>
    <?php endif;?>
    <?php if(!$acc_kp):?>
    <div class="alert alert-danger" role="alert">
        Pengajuan Kerja Praktek anda Belum di ACC !
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="/mahasiswa/dashboard/actionAddBimbingan" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" value="<?= $_SESSION['data_mahasiswa']['nim'] ?>" name="nim" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Bimbingan</label>
                            <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" placeholder="( JudulKerjaPraktik_Bab ) Contoh: testing_IV" autocomplete="off" name="judul">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul') ?>
                            </div>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= $validation->hasError('bimbingan') ? 'is-invalid' : '' ?>" id="customFile" name="bimbingan" accept=".doc, .docx" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('bimbingan') ?>
                            </div>
                            <label id="fileLabel" class="custom-file-label" for="customFile">Upload File Bimbingan</label>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" <?=!$acc_kp?'disabled style="cursor:not-allowed"':''?> class="btn btn-md btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#customFile').on('change', function() {
        const namaFile = $(this)[0].files[0].name
        $('#fileLabel').html(namaFile);
    });
</script>
<?= $this->endSection() ?>