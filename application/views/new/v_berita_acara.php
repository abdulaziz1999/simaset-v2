<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Berita Acara</h1>
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
          <a href="<?=base_url('berita_acra/add')?>" class="btn btn-block bg-gradient-primary">
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
                <th>No Berita Acara</th>
                <th>Tanggal Peneriamaan</th>
                <th>Diterima Dari</th>
                <th>No Kontrak</th>
                <th>No PPTK</th>
                <th>Program</th>
                <th>Kegitan</th>
                <th>No Arsip</th>
                <th>File</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data->result() as $row): ?>               
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row->no_berita?></td>
                    <td><?= $row->tgl_penerimaan?></td>
                    <td><?= $row->diterima_dari?></td>
                    <td><?= $row->no_kontrak?></td>
                    <td><?= $row->no_pptk?></td>
                    <td><?= $row->program?></td>
                    <td><?= $row->kegiatan?></td>
                    <td><?= $row->no_arsip?></td>
                    <td>
                      <button class="btn btn-sm btn-success"> file</button>
                    </td>
                    <td>
                      <a href="<?= base_url('berita_acara/detail/'.$row->id_berita)?>" class="btn btn-sm btn-success"> Detail</a>
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
