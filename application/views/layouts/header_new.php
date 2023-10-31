
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
  <script>
    let baseUrl = "<?=base_url()?>";
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-image: url('<?=base_url('src/img/logo/bg-01.jpg')?>'); background-size: cover;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link rounded" data-widget="pushmenu" href="javascript:void()"><i class="fas fa-bars text-white"></i></a>
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
        <!-- <li class="nav-item dropdown">
          <a class="nav-link rounded" data-toggle="dropdown" href="#">
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
        </li> -->

      <?php } ?>
       <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link rounded dropdown-toggle" data-toggle="dropdown">

          <?php if ($this->session->userdata('foto')==NULL): ?>
              <img src="<?=base_url()?>src/backend/dist/img/profile.png" class="user-image img-circle elevation-2">
          <?php else: ?>
             <img src="<?=base_url()?>src/img/profile/<?=$this->session->userdata('foto')?>" class="user-image img-circle elevation-2">
          <?php endif ?>
         
          <span class="d-none d-md-inline text-white">Hi, <?php echo $this->session->userdata('nama_user');?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded">
          <!-- User image -->
          <li class="user-header rounded" style="background-image: url('<?=base_url('src/img/logo/bg-01.jpg')?>');">

            <?php if ($this->session->userdata('foto')==NULL): ?>
              <img src="<?=base_url()?>src/backend/dist/img/profile.png" class="img-circle elevation-2">
              <?php else: ?>
               <img src="<?=base_url()?>src/img/profile/<?=$this->session->userdata('foto')?>" class="img-circle elevation-2">
             <?php endif ?>

            <p class="text-white">
              <?php echo $this->session->userdata('nama_user');?>
              <small><?php echo $this->session->userdata('jabatan');?></small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer rounded">
            <a href="<?=base_url('pengaturan')?>" class="btn btn-sm btn-info btn-flat rounded">
              <i class="nav-icon fa fa-users"></i> Edit Profile
            </a>
            <a href="<?=base_url('logout')?>" class="btn btn-sm btn-danger btn-flat float-right rounded">
              <i class="fas fa-sign-out-alt"></i> Log out
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4 bg-gradient-default" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="background-image: url('<?=base_url('src/img/logo/bg-01.jpg')?>'); background-size: cover;">
      <img src="<?=base_url()?>src/img/logo/AdminLTELogo.png" class="brand-image" style="opacity: 0.8">
      <span class="brand-text font-weight-light"><b class="font-weight-bold text-white">ASET APPS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-1">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="<?=base_url('dashboard')?>" class="nav-link rounded <?=isset($active_menu_db)?$active_menu_db:'' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item has-treeview ml-3"><b>Berita</b></li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('judul_berita')?>" class="nav-link rounded <?=isset($active_menu_judul)?$active_menu_judul:'' ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>Judul Berita Acara</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('berita_acara')?>" class="nav-link rounded <?=isset($active_menu_berita_acara)?$active_menu_berita_acara:'' ?>">
            <i class="nav-icon fas fa-map"></i>
            <p>Berita Acara</p>
          </a>
        </li>
        <li class="nav-item has-treeview ml-3"><b>Cetak</b></li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('qr_code')?>" class="nav-link rounded <?=isset($active_menu_qrcode)?$active_menu_qrcode:'' ?>">
            <i class="nav-icon fas fa-qrcode"></i>
            <p>Print QRcode</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('print_berita')?>" class="nav-link rounded <?=isset($active_print_berita)?$active_print_berita:'' ?>">
            <i class="nav-icon fas fa-print"></i>
            <p>Print Berita Acara</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('print_barang')?>" class="nav-link rounded <?=isset($active_print_barang)?$active_print_barang:'' ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>Print Per Barang</p>
          </a>
        </li>
        <li class="nav-item has-treeview ml-3"><b>Akses</b></li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('users')?>" class="nav-link rounded <?=isset($active_menu_user)?$active_menu_user:'' ?>">
            <i class="nav-icon fa fa-users"></i>
            <p>Pengguna</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?=base_url('pengaturan')?>" class="nav-link rounded <?=isset($active_menu_png)?$active_menu_png:'' ?>">
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


  

