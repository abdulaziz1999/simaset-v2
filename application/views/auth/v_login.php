<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('<?=base_url('src/img/logo/bg-01.jpg')?>'); background-size: cover;">

  <?php
    if (null !== $this->session->userdata('logged')){
      redirect(site_url('dashboard'));
    }
  ?>

<div class="login-box">
  <div class="login-logo">
    <h3 class="text-white"><b>ASET APPS</b></h3>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius:5px;">
    <div class="card-body login-card-body rounded">

      <?php if ($this->session->flashdata('gagal_login')) { ?>
        <div class="alert alert-danger"> 
          <?= $this->session->flashdata('gagal_login') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> 
        </div>
      <?php } ?>

      <h4 class="login-box-msg"><b>LOGIN</b></h4>

      <form action="<?=base_url('proses_login')?>" method="post" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('username'); ?>         
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password'); ?>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12 mt-2">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <!-- <p>- OR -</p>
        <a href="<?=base_url('guest');?>" class="btn btn-block btn-danger">
          <i class="fa fa-user mr-2"></i> Masuk sebagai Tamu
        </a> -->
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>src/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>src/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>src/backend/dist/js/adminlte.min.js"></script>

</body>
</html>
