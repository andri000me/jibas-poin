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

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">Catatan Poin Kebaikan dan Pelanggaran</span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <span class="brand-text font-weight-light ml-3">SMK Plus Al-Farhan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/images/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->ion_auth->user()->row()->first_name; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php if ($this->ion_auth->in_group('siswa')) { ?>
                    <li class="nav-header">PESERTA DIDIK</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashborad
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('biodata') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'biodata') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Biodata
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('prestasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'prestasi') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-award"></i>
                            <p>
                                Prestasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('pelanggaran') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'pelanggaran') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>
                                Pelanggaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('kebaikan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'kebaikan') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-grin"></i>
                            <p>
                                Kebaikan
                            </p>
                        </a>
                    </li>

                <?php } ?>

                <?php if ($this->ion_auth->in_group('guru') || $this->ion_auth->in_group('walikelas')) { ?>

                    <li class="nav-header">GURU</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashborad
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('siswa'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'siswa') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Referensi Peserta Didik
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('poin/catatan'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'catatan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                            <i class="nav-icon fas fa-sticky-note"></i>
                            <p>
                                Catatan Poin
                            </p>
                        </a>
                    </li>

                <?php } ?>

                <?php if ($this->ion_auth->in_group('walikelas')) { ?>

                    <li class="nav-header">WALIKELAS</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('poin/rekap_catatan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'rekap_catatan') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Rekap Catatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('poin/rekap_poin') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'rekap_poin') {
                                                                                                echo 'active';
                                                                                            } ?>">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Rekap Poin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('konseling') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'konseling') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Jurnal Konseling
                            </p>
                        </a>
                    </li>

                <?php } ?>

                <?php if ($this->ion_auth->in_group('bpbk')) { ?>

                    <li class="nav-header">KESISWAAN DAN BP/BK</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashborad
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('poin/jenis') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'jenis') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Jenis Poin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('siswa'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'siswa') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Referensi Peserta Didik
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('poin/rekap_catatan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'rekap_catatan') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Rekap Catatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('poin/rekap_poin') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'rekap_poin') {
                                                                                                echo 'active';
                                                                                            } ?>">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Rekap Poin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('konseling') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'konseling') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Jurnal Konseling
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('surat') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'surat') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Surat Panggilan
                            </p>
                        </a>
                    </li>


                <?php } ?>



                <?php if ($this->ion_auth->is_admin()) { ?>
                    <li class="nav-header">ADMINISTRATOR</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashborad
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('sinkronisasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'sinkronisasi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                            <i class="nav-icon fas fa-sync"></i>
                            <p>
                                Sinkronisasi
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('siswa'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'siswa') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Referensi Peserta Didik
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('gtk'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'gtk') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Referensi GTK
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('users') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'users') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Hak Akses Pengguna
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('setting') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'setting') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                Pengaturan Umum
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('database') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'database') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Backup & Restore Data
                            </p>
                        </a>
                    </li>

                <?php } ?>

                <li class="nav-header">APLIKASI</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>Auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->