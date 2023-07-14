<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register Siswa - MSI 3 Sugihwaras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url('auth_siswa/register_siswa'); ?>"><b>Register Siswa</b><br>MSI Sugih Waras</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Register to create your account</p>
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger">
                Whoops! Ada kesalahan saat input data, yaitu:
                <ul>
                  <?php foreach ($errors as $error) { ?>
                    <li><?php echo esc($error); ?></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php $inputs = session()->getFlashdata('inputs'); ?>
        <?php echo form_open('/auth_siswa/proses_register'); ?>

        <div class="input-group mb-3">
          <?php
          $nis = [
            'type'  => 'nis',
            'name'  => 'nis',
            'id'    => 'nis',
            'value' => '',
            'class' => 'form-control',
            'placeholder' => 'Masukkan NIS Anda'
          ];
          echo form_input($nis);
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
            'class' => 'form-control',
            'placeholder' => 'Password'
          ];
          echo form_input($password);
          ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-0">
              Do you have account? <a href="<?php echo base_url('auth_siswa/login_siswa'); ?>" class="text-center">Log in</a>
            </p>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
</body>

</html>