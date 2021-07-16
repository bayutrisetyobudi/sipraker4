<?php



include('header.php');
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('nav.php');
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


            <div class="container mt-3">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Daftar Pengajuan Kerja Praktek</h1>
                <p class="mb-4">Pendaftaran Kerja Praktek / Magang</p>
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="clearfix">
                                    <div class="float-left">
                                        Daftar Kerja Praktik
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
                                        <label for="inputState">NIM</label>
                                        <input type="text" readonly class="form-control" required="required" name="date" value="2018420047">

                                    </div>

                                    <div class="form-group">
                                        <label for="judul">Nama Instansi / Perusahaan </label>
                                        <input type="text" class="form-control" id="judul" placeholder="Nama Instansi / Perusahaan " autocomplete="off" required="required" name="judul">
                                    </div>


                                    <div class="form-group">
                                        <label for="isi">Alamat Instansi / Perusahaan </label>
                                        <textarea class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="judul">Judul Penelitian / Kerja Praktik </label>
                                        <input type="text" class="form-control" id="judul" placeholder="Judul Penelitian / Kerja Praktik" autocomplete="off" required="required" name="judul">
                                    </div>

                                    <div class="form-group">
                                        <!--    <label for="penulis">Penulis</label> -->
                                        <input type="text" class="form-control" id="id_mhs" value="" name="id_mhs" readonly hidden>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-primary" name="tambah">Daftar</button>
                                        <button type="reset" class="btn btn-md btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Main Content -->

    <?php
    include('footer.php');
    ?>