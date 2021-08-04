<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('mahasiswa/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mulai Bimbingan Kerja Praktek Anda</h1>
    <p class="mb-4">Bimbingan dengan cara mengupload file laporan berbentuk docs/word</p>
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
                            <input type="text" class="form-control" id="judul" placeholder="Bab_JudulKerjaPraktik" autocomplete="off" required="required" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="isi">Upload File Bimbingan</label>
                            <input type="file" id="isi" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>