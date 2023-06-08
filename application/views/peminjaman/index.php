<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transaksi Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item active">Transaksi Peminjaman</li>
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
          <a href="<?=base_url('peminjaman/add')?>" class="btn btn-block bg-gradient-primary">
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
                <th>Kode Pinjam</th>
                <th>No Surat</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Nama Pemakai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($item as $row): ?>               
              <tr>
                <td><?=$no++;?></td>
                <td><?=$row['kode_pinjam'];?></td>
                <td><?=$row['no_surat'];?></td>
                <td><?=$row['tgl_pinjam'];?></td>
                <td><?=$row['tgl_kembali'];?></td>
                <td><?=$row['nama_pemakai'];?></td>
                <td>
                  <a href="<?=base_url('peminjaman/detail/'.$row['id'])?>" class="btn btn-success btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="<?=base_url('peminjaman/edit/'.$row['id'])?>" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="<?=base_url('peminjaman/hapus/'.$row['id'])?>" class="btn btn-danger btn-sm tombol-hapus">
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
