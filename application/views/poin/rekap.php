<!--
* Name : e-Poin v.1.0
* Author : DEDE ISKANDAR
* Github : https://github.com/ddiskandar
* Facebook : https://www.facebook.com/dzulqarnayn
* Email : d3215k@gmail.com
* WA/Telegram : +62 856 2402 8940
*
* Description: Aplikasi e-Poin ini dibuat dan dikembangkan bertujuan membantu sekolah
* dalam mencatat poin pelanggaran dan kebaikan peserta didik untuk pendidikan
* karakter generasi penerus bangsa yang lebih baik.
*
* Donasi : Support developer untuk terus mengembangkan aplikasi
* dengan memberikan donasi pengembangan.
*
-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Rekapitulasi Poin Peserta Didik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="walikelas" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Pelanggaran</th>
                                        <th>Nilai</th>
                                        <th>Kebaikan</th>
                                        <th>Nilai</th>
                                        <th>Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa->result() as $item) { ?>
                                        <tr>
                                            <td><a href="<?php echo base_url('siswa/view/') . $item->id ?>"><i class="nav-icon fas fa-user-circle mr-2"></i><strong><?php echo $item->nama ?></strong></a></td>



                                            <td>
                                                <strong>
                                                    <span class="text-danger">
                                                        <?php echo $item->pelanggaran ?>
                                                    </span>
                                                </strong>
                                            </td>

                                            <td>
                                                <strong>
                                                    <span class="text-danger">
                                                        <?php echo $item->nilai_pelanggaran ?>
                                                    </span>
                                                </strong>
                                            </td>

                                            <td>
                                                <strong>
                                                    <span class="text-success">
                                                        <?php echo $item->kebaikan ?>
                                                    </span>
                                                </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    <span class="text-success">
                                                        <?php echo $item->nilai_kebaikan ?>
                                                    </span>
                                                </strong>
                                            </td>

                                            <td>
                                                <strong>
                                                    <span class="text-primary">
                                                        <?php echo $item->total_nilai ?>
                                                    </span>
                                                </strong>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Pelanggaran</th>
                                        <th>Nilai</th>
                                        <th>Kebaikan</th>
                                        <th>Nilai</th>
                                        <th>Total Nilai</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->