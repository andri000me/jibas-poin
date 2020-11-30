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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peserta Didik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Peserta didik</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card ">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid img-responsive" style="object-fit: none; object-position: center; width:100%; max-height: 100%;" <?php echo empty($siswa->foto) ? 'src="' . base_url('assets/images/avatar.jpg')  . '"' : 'src="data:image/jpeg;base64,' . base64_encode($siswa->foto) . '"'; ?> alt="User profile picture">
                            </div>


                            <h3 class="profile-username text-center mt-2"><?php echo ucwords(strtolower($siswa->nama)) ?></h3>

                            <p class="text-muted text-center"><?php echo $siswa->nama_rombel ?></p>

                            <ul class="list-group list-group-unbordered mb-3">

                                <li class="list-group-item">
                                    <b>Poin Pelanggaran</b>
                                    <span class="float-right">
                                        <span class="badge bg-danger">
                                            <?php echo !empty($siswa->nilai_pelanggaran) ? $siswa->nilai_pelanggaran : 0 ?>
                                        </span>
                                    </span>
                                    <span class="float-right mx-2">
                                        <span class="badge bg-danger">
                                            <?php echo !empty($siswa->pelanggaran) ? $siswa->pelanggaran : 0 ?>
                                        </span>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Poin Kebaikan</b>
                                    <span class="float-right">
                                        <span class="badge bg-success">
                                            <?php echo !empty($siswa->nilai_kebaikan) ? $siswa->nilai_kebaikan : 0 ?>
                                        </span>
                                    </span>
                                    <span class="float-right mx-2">
                                        <span class="badge bg-success">
                                            <?php echo !empty($siswa->kebaikan) ? $siswa->kebaikan : 0 ?>
                                        </span>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Poin</b>
                                    <span class="float-right">
                                        <span class="badge bg-primary">
                                            <?php echo !empty($siswa->total_nilai) ? $siswa->total_nilai : 0 ?>
                                        </span>
                                    </span>
                                </li>

                            </ul>

                            <a href="<?php echo base_url('poin/tambah_by_id/') . $siswa->id ?>" class="btn btn-primary btn-block"><b>Tambah Poin</b></a>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#poin" data-toggle="tab">Catatan Poin</a></li>
                                <li class="nav-item"><a class="nav-link" href="#biodata" data-toggle="tab">Biodata</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#kondisi" data-toggle="tab">Deskripsi Kondisi</a></li> -->
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="poin">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-warning px-4">
                                                Terbaru
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <?php foreach ($poin->result() as $item) { ?>
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-<?php echo $item->jenis_poin == 1 ? 'angle-right bg-success' : 'angle-right bg-danger' ?>"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><?php echo $item->tgl_poin ?></span>
                                                    <h3 class="timeline-header">
                                                        <a href="#"><?php echo ucwords(strtolower($item->nama_gtk)) ?></a> memberi catatan poin
                                                        <?php if ($item->jenis_poin == 1) { ?>
                                                            kebaikan
                                                            <span class="badge bg-success">
                                                                <?php echo $item->nilai ?>
                                                            </span>
                                                        <?php } else { ?>
                                                            pelanggaran
                                                            <span class="badge bg-danger">
                                                                <?php echo $item->nilai ?>
                                                            </span>
                                                        <?php } ?>
                                                        karena <?php echo strtolower($item->nama_poin) ?> <?php echo $item->catatan ?></h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                        <?php } ?>


                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="biodata">
                                    <dl class="row">
                                        <dt class="col-sm-4">NIPD</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->nipd ?></dd>
                                        <dt class="col-sm-4">Nama Lengkap</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->nama ?></dd>
                                        <dt class="col-sm-4">NIK</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->nik ?></dd>
                                        <dt class="col-sm-4">NISN</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->nisn ?></dd>
                                        <dt class="col-sm-4">Tempat, tanggal lahir</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->tempat_lahir . ', ' . date_indo($siswa->tanggal_lahir) ?></dd>
                                        <dt class="col-sm-4">Jenis Kelamin</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->lp == 'l' ? 'Laki-laki' : 'Perempuan' ?></dd>
                                        <dt class="col-sm-4">Rombel</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->nama_rombel ?></dd>
                                        <dt class="col-sm-4">Nama Ayah</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->ayah ?></dd>
                                        <dt class="col-sm-4">Nama Ibu</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->ibu ?></dd>
                                        <dt class="col-sm-4">Alamat</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->alamat ?></dd>
                                    </dl>
                                </div>
                                <!-- /.tab-pane -->

                                <!-- <div class="tab-pane" id="kondisi">
                                    <dl class="row">
                                        <dt class="col-sm-4">Kondisi Peserta Didik</dt>
                                        <dd class="col-sm-8"><?php echo $siswa->nipd ?></dd>
                                        <dt class="col-sm-4">Kondisi Keluarga</dt>
                                    </dl>
                                </div> -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->