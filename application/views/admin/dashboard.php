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
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $jumlah_poin_pelanggaran ?></h3>

                                    <p>Pelanggaran</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-alert-circled"></i>
                                </div>
                                <a href="<?php echo base_url('surat') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $jumlah_poin_kebaikan ?></sup></h3>

                                    <p>Kebaikan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-checkbox"></i>
                                </div>
                                <a href="<?php echo base_url('siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $jumlah_jenis_poin ?></h3>

                                    <p>Jenis Poin</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-clipboard"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $jumlah_siswa ?></h3>

                                    <p>Peserta Didik Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-university"></i>
                                </div>
                                <a href="<?php echo base_url('siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-school mr-2"></i>
                                        Identitas Sekolah
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nama Sekolah</dt>
                                        <dd class="col-sm-8"><?php echo $setting->nama_sekolah ?></dd>
                                        <dt class="col-sm-4">NPSN</dt>
                                        <dd class="col-sm-8"><?php echo $setting->npsn_sekolah ?></dd>
                                        <dt class="col-sm-4">Alamat</dt>
                                        <dd class="col-sm-8"><?php echo $setting->alamat_sekolah ?></dd>
                                        <dt class="col-sm-4">Kecamatan</dt>
                                        <dd class="col-sm-8"><?php echo $setting->kecamatan_sekolah ?></dd>
                                        <dt class="col-sm-4">Kabupaten</dt>
                                        <dd class="col-sm-8"><?php echo $setting->kabupaten_sekolah ?></dd>
                                        <dt class="col-sm-4">Kepala Sekolah</dt>
                                        <dd class="col-sm-8"><?php echo $setting->kepala_sekolah ?></dd>
                                    </dl>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row ml-2">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-primary px-4">
                                            Aktivitas Terbaru
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
                                                    kepada <a href="<?php echo base_url('siswa/view/') . $item->id ?>"><strong><?php echo ucwords(strtolower($item->nama)) ?></strong></a> karena <?php echo strtolower($item->nama_poin) ?> <?php echo $item->catatan ?></h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                    <?php } ?>


                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-12">
                    <!-- LINE CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Poin</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="statsPoin" width="400" height="105"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-success">
                        <div class="card-header border-0">
                            <h3 class="card-title">Top 10 Siswa Poin Kebaikan Terbesar</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Peserta Didik</th>
                                        <th>Rombel</th>
                                        <th>Jumlah</th>
                                        <th>Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa_kebaikan as $item) { ?>
                                        <tr>
                                            <td><a href="<?php echo base_url('siswa/view/') . $item->id ?>"><i class="nav-icon fas fa-user-circle mr-2"></i><strong><?php echo $item->nama ?></strong></a></td>
                                            <td><?php echo $item->nama_rombel ?></td>
                                            <td><?php echo $item->poin ?></td>
                                            <td><strong><span class="text-success"><?php echo $item->total ?></span></strong></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-6">
                    <div class="card card-danger">
                        <div class="card-header border-0">
                            <h3 class="card-title">Top 10 Siswa Poin Pelanggaran Terbesar</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Peserta Didik</th>
                                        <th>Rombel</th>
                                        <th>Jumlah</th>
                                        <th>Total Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa_pelanggaran as $item) { ?>
                                        <tr>
                                            <td><a href="<?php echo base_url('siswa/view/') . $item->id ?>"><i class="nav-icon fas fa-user-circle mr-2"></i><strong><?php echo $item->nama ?></strong></a></td>
                                            <td><?php echo $item->nama_rombel ?></td>
                                            <td><?php echo $item->poin ?></td>
                                            <td><strong><span class="text-danger"><?php echo $item->total ?></span></strong></td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>

            </div>

            <div class="row">
                <!-- ./col -->
                <div class="col-sm-12">

                </div>
                <!-- ./col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <p>Aplikasi <strong>e-Poin</strong> ini dibuat dan dikembangkan bertujuan membantu sekolah dalam mencatat poin pelanggaran dan kebaikan peserta didik<br />
                        untuk pendidikan karakter generasi penerus bangsa yang lebih baik.</p>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->