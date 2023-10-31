<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?=base_url()?>src/backend/dropify/dropify.min.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Print Per Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Print Per Barang</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">
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
            <thead class="bg-gradient-primary">
              <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Umum</th>
                <th>Spesifikasi</th>
                <th>Jumlah</th>
                <th>Harga Barang</th>
                <th>Keterangan</th>
                <th>QR</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data->result() as $row): ?>               
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row->kode_barang?></td>
                    <td><?= $row->nama_barang?></td>
                    <td><?= $row->nama_umum?></td>
                    <td><?= $row->spesifikasi?></td>
                    <td><?= $row->jumlah?></td>
                    <td><?= format_currency($row->harga)?></td>
                    <td><?= $row->ket?></td>
                    <td>
                        <?php if($row->qrcode){?>
                        <img src="<?= base_url('src/img/qrcode/'.$row->qrcode)?>"  class="img-thumbnail rounded" width="200" height="200">
                        <?php }else{?>
                        -
                        <?php }?>
                    </td>
                    <td>
                      <div class="btn-group">
                          <a href="<?= base_url('print_barang/pBarang/'.$row->id_barang)?>" class="btn btn-sm btn-danger"> <i class="fa fa-print"></i></a>
                      </div>
                    </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          </div>           
        </div>
        <div class="card-footer">

        </div>
      </div>

    </section>
  </div>


  <script src="<?=base_url()?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?=base_url()?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="<?=base_url()?>src/backend/dropify/dropify.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "language": {
          "sSearch": "Cari"
        }
      });

      $('.dropify').dropify();
    });
    function tombolUpload(id){
        $('#berita_id').val(id);
      }

  </script>
