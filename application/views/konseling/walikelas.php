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
                    <h1 class="m-0 text-dark">Jurnal Konseling</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary mt-2 float-sm-left float-md-right" data-toggle="modal" data-target="#modal-tambah">
                        Tambah Jurnal
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
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>Permasalahan</th>
                                        <th>Solusi/Tindak Lanjut</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($konseling as $item) { ?>
                                        <tr>
                                            <td><?php echo date_indo($item->tgl_konseling) ?></td>
                                            <th>
                                                <a href="<?php echo base_url('siswa/view/') . $item->siswa_id ?>"><i class="nav-icon fas fa-user-circle mr-2"></i><?php echo $item->nama ?></a>
                                            </th>
                                            <td><?php echo $item->masalah ?></td>
                                            <td><?php echo $item->solusi ?></td>
                                            <td>
                                                <a href="<?php echo base_url('konseling/delete/') . $item->konseling_id ?>" class="text-muted ml-2" onclick="return confirm('Yakin mau menghapus Jurnal?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>Permasalahan</th>
                                        <th>Solusi/Tindak Lanjut</th>
                                        <th>Aksi</th>
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
                <h4 class="modal-title">Tambah Jurnal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('konseling/add') ?>">
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="tgl_konseling" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" id="tgl_konseling" name="tgl_konseling" class="form-control""></input>
                        </div>
                    </div>

                    <div class=" form-group row">
                            <label for="siswa_id" class="col-sm-4 col-form-label">Peserta Didik</label>
                            <div class="col-sm-8">
                                <select name="siswa_id" id="siswa_id" class="form-control">
                                    <option value=""> - Pilih salah satu - </option>
                                    <?php foreach ($siswa as $item) { ?>
                                        <option value="<?php echo $item->id ?>"><?php echo $item->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masalah" class="col-sm-4 col-form-label">Permasalahan</label>
                            <div class="col-sm-8">
                                <textarea name="masalah" id="masalah" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="solusi" class="col-sm-4 col-form-label">Solusi/Tindak Lanjut</label>
                            <div class="col-sm-8">
                                <textarea name="solusi" id="solusi" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-info">Buat Jurnal</button>
                    </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->