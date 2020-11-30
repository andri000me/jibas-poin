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
                        <h1 class="m-0 text-dark">Tambah Catatan Poin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                            <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>poin/tambah">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="rombel" class="col-sm-3 col-form-label">Rombel</label>
                                        <div class="col-sm-9">
                                            <select name="rombel" id="rombel" class="form-control">
                                                <option value=""> - Pilih salah satu - </option>
                                                <?php foreach ($rombel as $row) : ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_rombel; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectSiswa" class="col-sm-3 col-form-label">Peserta Didik</label>
                                        <div class="col-sm-9">
                                            <select name="siswa_id" id="siswa_id" class="siswa form-control">
                                                <option value=""> - Pilih salah satu - </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_poin" class="col-sm-3 col-form-label">Jenis Poin</label>
                                        <div class="col-sm-9">
                                            <select name="jenis_poin" id="jenis_poin" class="form-control">
                                                <option value=""> - Pilih salah satu - </option>
                                                <option value="0">Pelanggaran</option>
                                                <option value="1">Kebaikan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selectSiswa" class="col-sm-3 col-form-label">Poin</label>
                                        <div class="col-sm-9">
                                            <select name="poin_id" id="poin_id" class="poin form-control">
                                                <option value=""> - Pilih salah satu - </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_poin" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="tgl_poin" name="tgl_poin" class="form-control""></input>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                            <label for="nama_poin" class="col-sm-3 col-form-label">Catatan</label>
                                            <div class="col-sm-9">
                                                <textarea id="catatan" name="catatan" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <a href="<?php echo base_url('poin/catatan_bk') ?>" class="btn btn-default">Kembali</a>
                                        <button type="submit" class="btn btn-success float-right ml-2">Tambah Catatan</button>
                                    </div>
                                    <!-- /.card-footer -->
                            </form>
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