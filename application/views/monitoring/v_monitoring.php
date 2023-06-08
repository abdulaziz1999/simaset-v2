<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Monitoring</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item active">Monitoring</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a href="<?=base_url('monitoring/tambah')?>" class="btn btn-block bg-gradient-primary">
            Tambah Data
          </a>
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body"> 
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Perolehan</th>
                <th>Kondisi</th>
                <th>Jenis Aset</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($mt as $row): ?>               
              <tr>
                <td><?=$no++;?></td>
                <td><?=$row['kode_aset'];?></td>
                <td><?=$row['nama_barang'];?></td>
                <td><?=$row['tahun_perolehan'];?></td>
                <td>
                  <?=$row['kondisi'];?>                     
                </td>
                <td><?=$row['jenis_aset'];?></td>
                <td>
                  <a href="<?=base_url('monitoring/detail/'.$row['id_monitoring'])?>" class="btn btn-success btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="<?=base_url('monitoring/edit/'.$row['id_monitoring'])?>" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="<?=base_url('monitoring/hapus/'.$row['id_monitoring'])?>" class="btn btn-danger btn-sm tombol-hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          </div>           
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <script src="<?=base_url()?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?=base_url()?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "language": {
          "sSearch": "Cari"
        }
      });
    });
  </script>
