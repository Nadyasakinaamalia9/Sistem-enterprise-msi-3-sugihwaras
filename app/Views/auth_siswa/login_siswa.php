<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in - MSI 3</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <div class="login-logo" style=" width: 550px;">
      <h5>Login Siswa</h5>
      <a href="<?php echo base_url('auth/login_siswa'); ?>"><b>MSI</b>3 Sugihwaras</a>
    </div>
    <div class="card" style="width: 550px;">
      <div class="card-body login-card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="<?php echo base_url('themes/dist'); ?>/img/illustrasi2.png" alt="AdminLTE Logo" style="opacity: .8; width: 270px;">
          </div>
          <div class="col-md-8">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
              <div class="alert alert-danger" role="alert">
                Whoops! Ada kesalahan saat input data, yaitu:
                <ul>
                  <?php foreach ($errors as $error) { ?>
                    <li><?php echo esc($error); ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>
            <?php
            $error_login = session()->getFlashdata('error_login');
            if (!empty($error_login)) { ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger text-center">
                    <?php echo $error_login; ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php if ($success_register = session()->getFlashdata('success_register')) { ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-success text-center">
                    <?php echo $success_register; ?>
                  </div>
                </div>
              </div>
            <?php
            }
            $inputs = session()->getFlashdata('inputs');
            echo form_open(base_url('auth_siswa/proses_login'));
            ?>
            <div class="input-group mb-3">
              <?php
              $id_pegawai = [
                'type'  => 'nis',
                'name'  => 'nis',
                'id'    => 'nis',
                'value' => $inputs,
                'class' => 'form-control',
                'placeholder' => 'masukkan NIS Anda'
              ];
              echo form_input($id_pegawai);
              ?>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <?php
              $password = [
                'type'  => 'password',
                'name'  => 'password',
                'id'    => 'password',
                'value' => $inputs,
                'class' => 'form-control',
                'placeholder' => 'Masukkan password'
              ];
              echo form_input($password);
              ?>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <!-- siswa_login.php -->
            <div class="col-12">
            </div>

            <div class="row">
              <div class="col-8">
                <p class="mb-0">
                  <a href="<?php echo base_url('auth_siswa/register_siswa'); ?>" class="text-center btn btn-primary">Register</a>
                </p>
                <p class="mb-0">
                  <a href="<?php echo base_url('auth/login'); ?>" class="text-center">Back</a>
                </p>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  <script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
</body>

</html>