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

            <!-- Main content -->
            <div class="content">
                  <div class="container-fluid">
                        <div class="row">
                              <div class="col-lg-12">
                                    <!-- Horizontal Form -->
                                    <div class="card card-success mt-4">
                                          <div class="card-header">
                                                <h3 class="card-title"><?php echo lang('edit_user_heading'); ?></h3>
                                          </div>
                                          <!-- /.card-header -->
                                          <?php echo form_open(uri_string()); ?>

                                          <div class="card-body">
                                                <div class="form-group row">
                                                      <label for="first_name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($first_name); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="password" class="col-sm-3 col-form-label">Password (jika ingin diubah)</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($password); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="password_confirm" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($password_confirm); ?>
                                                      </div>
                                                </div>

                                                <?php if ($this->ion_auth->is_admin()) : ?>

                                                      <div class="form-group row">
                                                            <label for="groups" class="col-sm-3 col-form-label">Hak akses</label>
                                                            <div class="col-sm-9">
                                                                  <?php foreach ($groups as $group) : ?>
                                                                        <label class="checkbox mr-4">
                                                                              <input type="radio" class="mr-1" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                                                              <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                                        </label>
                                                                  <?php endforeach ?>
                                                            </div>
                                                      </div>



                                                <?php endif ?>

                                          </div>

                                          <?php echo form_hidden('id', $user->id); ?>
                                          <?php echo form_hidden($csrf); ?>

                                          <div class="card-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <button type="reset" class="btn btn-default float-right">Reset</button>
                                          </div>
                                          <!-- /.card-footer -->

                                          <?php echo form_close(); ?>
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