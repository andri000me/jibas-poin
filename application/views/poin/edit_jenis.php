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

<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit jenis poin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Horizontal Form -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php foreach ($poins as $poin) { ?>
                                <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>poin/edit_jenis">
                                    <input type="hidden" name="id" value="<?php echo $poin->id ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="jenis_poin" class="col-sm-3 col-form-label">Jenis Poin</label>
                                            <div class="col-sm-9">
                                                <select name="jenis_poin" id="jenis_poin" class="form-control">
                                                    <option <?php echo $poin->jenis_poin == 0 ? 'selected' : '' ?> value="0">Pelanggaran</option>
                                                    <option <?php echo $poin->jenis_poin == 1 ? 'selected' : '' ?> value="1">Kebaikan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_poin" class="col-sm-3 col-form-label">Deskripsi Poin</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nama_poin" name="nama_poin" class="form-control" value="<?php echo $poin->nama_poin ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nilai" class="col-sm-3 col-form-label">Nilai</label>
                                            <div class="col-sm-9">
                                                <input type="number" id="nilai" name="nilai" class="form-control" value="<?php echo $poin->nilai ?>">
                                                <small id="nilai-help" class="form-text text-muted">Isi dengan angkat positif ( > 1 ) untuk poin kebaikan dan angka negatif ( < 0 ) untuk poin pelanggaran</small> </div> </div> </div> <!-- /.card-body -->
                                                        <div class="card-footer">
                                                            <a href="<?php echo base_url('poin/jenis') ?>" class="btn btn-default">Kembali</a>
                                                            <button type="submit" class="btn btn-success float-right ml-2">Simpan</button>
                                                            <button type="reset" class="btn btn-default float-right">Reset</button>
                                                        </div>
                                                        <!-- /.card-footer -->
                                </form>
                            <?php } ?>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->