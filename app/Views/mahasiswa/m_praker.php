<?= $this->extend('layout/dashboard') ?>
<?= $this->section('sidebar') ?>
<?= $this->include('mahasiswa/nav') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Pengajuan Kerja Praktek</h1>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="/mahasiswa/dashboard/actionAddKP">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim" readonly class="form-control" required="required" name="nim" value="<?=$_SESSION['data_mahasiswa']['nim']?>">

                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Instansi / Perusahaan </label>
                            <input type="text" class="form-control" id="nama" autocomplete="off" required="required" name="nama">
                        </div>


                        <div class="form-group">
                            <label for="alamat">Alamat Instansi / Perusahaan </label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul Penelitian / Kerja Praktik </label>
                            <input type="text" class="form-control" id="judul" autocomplete="off" required="required" name="judul">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Daftar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>