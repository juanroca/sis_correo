<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIS_FURRIELTO</title>
  <link rel="shortcut icon" href="<?php echo base_url();?>/assest/dist/img/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assest/plugins/fontawesome-free/css/all.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assest/dist/css/adminlte.css">
</head>
<body class="hold-transition login-page">
  <div id="back"></div>
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url();?>/assest/img/logo_furrielato1.png" width="80%">
  </div>
<!-- cargar la función session -->
  <?= session('msg')?>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese usuario y contraseña</p>

      <form action="<?php echo base_url()."/CAcceso/acceder";?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <p class='text-danger'><?= session('errors.usuario')?></p>      

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <p class='text-danger'><?= session('errors.password')?></p>
        <p class='text-danger'><?= session('errors.credenciales')?></p>

        <div class="row">          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/assest/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assest/dist/js/adminlte.min.js"></script>
</body>
</html>
