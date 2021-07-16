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



            <!-- Content Row -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa </h1>
                <p class="mb-4">Data Mahasiswa </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Alamat</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Alamat</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2018420047</td>
                                        <td>Bayu Tri Setyo Budi</td>
                                        <td>Teknik Informatika</td>
                                        <td>Lamongan</td>


                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2018420133</td>
                                        <td>Dendy Zulfikar</td>
                                        <td>Teknik Informatika</td>
                                        <td>Trenggralik</td>

                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2018420115</td>
                                        <td>Danang Defri F.</td>
                                        <td>Teknik Informatika</td>
                                        <td>Ngawi</td>

                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>2018420103</td>
                                        <td>M. Virkansyah Pradana</td>
                                        <td>Teknik Informatika</td>
                                        <td>Mojokerto</td>

                                    </tr>

                                </tbody>
                            </table>
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