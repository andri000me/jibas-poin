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
                    <h1 class="m-0 text-dark">Pengaturan Jenis Poin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary mt-2 float-sm-left float-md-right" data-toggle="modal" data-target="#modal-tambah">
                        <!-- <i class="fas fa-plus mr-2"></i> -->
                        Tambah Jenis Poin
                    </button>
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
                            <table id="siswa" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Nama Poin</th>
                                        <th>Nilai</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($poin->result() as $item) { ?>
                                        <tr>
                                            <td><?php echo $item->jenis_poin == 0 ? '<h5><span class="badge bg-danger">PELANGGARAN</span></h5>' : '<h5><span class="badge bg-success">KEBAIKAN</span></h5>' ?></td>
                                            <td><?php echo $item->nama_poin ?></td>
                                            <td><?php echo $item->nilai ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>poin/edit_jenis/<?php echo $item->id ?>" class="text-muted ml-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Nama Poin</th>
                                        <th>Nilai</th>
                                        <th></th>
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

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Jenis Poin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('poin/jenis') ?>">
                <div class="modal-body">
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
                        <label for="nama_poin" class="col-sm-3 col-form-label">Deskripsi Poin</label>
                        <div class="col-sm-9">
                            <textarea id="nama_poin" name="nama_poin" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-3 col-form-label">Nilai Poin</label>
                        <div class="col-sm-9">
                            <input type="number" id="nilai" name="nilai" class="form-control">
                            <small id="nilai-help" class="form-text text-muted">Isi dengan angkat positif ( > 1 ) untuk poin kebaikan dan angka negatif ( < 0 ) untuk poin pelanggaran</small> </div> </div> </div> <div class="modal-footer justify-content-end">
                                    <button type="submit" class="btn btn-info">Tambah Jenis Poin</button>
                        </div>
            </form>
        </div>
        <!-- /.modal-content -->



    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->