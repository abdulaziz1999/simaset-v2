
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?=base_url()?>src/backend/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php if($this->session->userdata('role')=='2'){?>

        <?php  

        $sql = "SELECT * FROM pengadaan WHERE status='0'";
        $jml_pengadaan = $this->db->query($sql)->num_rows();

        ?>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?=$jml_pengadaan;?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?=$jml_pengadaan;?> Pemberitahuan</span>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('pengadaan')?>" class="dropdown-item">
              <i class="nav-icon fas fa-luggage-cart"></i> <?=$jml_pengadaan;?> Pengadaan baru
              <span class="float-right text-muted text-sm"></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('pengadaan')?>" class="dropdown-item dropdown-footer">Lihat</a>
          </div>
        </li>

      <?php } ?>
       <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

          <?php if ($this->session->userdata('foto')==NULL): ?>
              <img src="<?=base_url()?>src/backend/dist/img/profile.png" class="user-image img-circle elevation-2">
          <?php else: ?>
             <img src="<?=base_url()?>src/img/profile/<?=$this->session->userdata('foto')?>" class="user-image img-circle elevation-2">
          <?php endif ?>
         
          <span class="d-none d-md-inline">Hi, <?php echo $this->session->userdata('nama_user');?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-info">

            <?php if ($this->session->userdata('foto')==NULL): ?>
              <img src="<?=base_url()?>src/backend/dist/img/profile.png" class="img-circle elevation-2">
              <?php else: ?>
               <img src="<?=base_url()?>src/img/profile/<?=$this->session->userdata('foto')?>" class="img-circle elevation-2">
             <?php endif ?>

            <p>
              <?php echo $this->session->userdata('nama_user');?>
              <small><?php echo $this->session->userdata('jabatan');?></small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?=base_url('pengaturan')?>" class="btn btn-info btn-flat">
              <i class="nav-icon fa fa-users"></i> Edit Profile
            </a>
            <a href="<?=base_url('logout')?>" class="btn btn-danger btn-flat float-right">
              <i class="fas fa-sign-out-alt"></i> Log out
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url()?>src/img/logo/AdminLTELogo.png" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Aset</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="<?=base_url('dashboard')?>" class="nav-link <?=isset($active_menu_db)?$active_menu_db:'' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('berita_acara')?>" class="nav-link <?=isset($active_menu_berita_acara)?$active_menu_berita_acara:'' ?>">
            <i class="nav-icon fas fa-map"></i>
            <p>Berita Acara</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('users')?>" class="nav-link <?=isset($active_menu_user)?$active_menu_user:'' ?>">
            <i class="nav-icon fa fa-users"></i>
            <p>Pengguna</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('pengaturan')?>" class="nav-link <?=isset($active_menu_png)?$active_menu_png:'' ?>">
            <i class="nav-icon fas fa-cog"></i>
            <p>Pengaturan</p>
          </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  

