<?=$this->extend('layout/dashboard')?>
<?=$this->section('sidebar')?>
<?=$this->include('mahasiswa/nav')?>
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container mt-3">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mulai Bimbingan Kerja Praktek Anda</h1>
    <p class="mb-4">Bimbingan dengan cara mengupload file laporan berbentuk docs/word</p>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="clearfix">
                        <div class="float-left">
                            Mulai Bimbingan
                        </div>
                        <div class="float-right">
                            <a href="">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputState">Date</label>
                        <input type="text" readonly class="form-control" required="required" name="date" value="<?= $today; ?>">
                        
                    </div>
                    

                    <div class="form-group">
                        <label for="penulis">NIM</label>
                        <input type="text" class="form-control" id="id_mhs" value="2018420047" name="id_mhs" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Title</label>
                            <input type="text" class="form-control" id="judul" placeholder="Judul Bimbingan (Bab_JudulKerjaPraktik) " autocomplete="off" required="required" name="judul">
                        </div>

                        
                        <div class="form-group">
                            <label for="isi">Upload File Bimbingan</label>
                            <input type="file" class="form-control">
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary" name="tambah">Tambah</button>
                            <button type="reset" class="btn btn-md btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>