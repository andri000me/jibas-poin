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
					<h1 class="m-0 text-dark">Pengguna</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">

					<a href="<?php echo base_url() ?>auth/generate_pengguna_guru" class="btn btn-info mr-2 float-right d-none d-md-block"" onclick=" return confirm('Yakin mau diatur ulang?')">
						<!-- <i class=" fas fa-plus "></i> -->
						Generate Pengguna Guru
					</a>
					<a href=" <?php echo base_url() ?>auth/generate_pengguna_siswa" class="btn btn-danger mr-2 float-right d-none d-md-block"" onclick=" return confirm('Yakin mau diatur ulang?')">
						<!-- <i class=" fas fa-plus "></i> -->
						Generate Pengguna Siswa
					</a>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class=" content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"></h3>
							<div class="card-tools">

							</div>
						</div>
						<!-- /.card-header -->

						<div class=" card-body">
							<table id="siswa" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama</th>
										<th><?php echo lang('index_email_th'); ?></th>
										<th>Peran</th>
										<th><?php echo lang('index_status_th'); ?></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) : ?>
										<tr>
											<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<?php foreach ($user->groups as $group) : ?>
													<span class="badge bg-info">
														<?php echo $group->name ?>
													</span>
												<?php endforeach ?>
											</td>
											<td>
												<?php if ($user->active) { ?>
													<a href="<?php echo base_url() ?>auth/deactivate/<?php echo $user->id ?>">
														<span class="badge bg-success">
															active
														</span>
													</a>
												<?php } else { ?>
													<a href="<?php echo base_url() ?>auth/activate/<?php echo $user->id ?>">
														<span class="badge bg-danger">
															non active
														</span>
													</a>
												<?php } ?>
											<td>
												<a href="<?php echo base_url() ?>auth/edit_user/<?php echo $user->id ?>" class="text-muted ml-2">
													<i class="fas fa-user-edit"></i>
												</a>
												<a href="<?php echo base_url() ?>auth/delete/<?php echo $user->id ?>" class="text-muted ml-2" onclick="return confirm('Yakin mau dihapus?')">
													<i class="fas fa-trash"></i>
												</a>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
								<tfoot>
									<tr>
										<th><?php echo lang('index_fname_th'); ?></th>
										<th><?php echo lang('index_email_th'); ?></th>
										<th>Peran</th>
										<th><?php echo lang('index_status_th'); ?></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->