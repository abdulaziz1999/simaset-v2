<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?=base_url()?>src/backend/dropify/dropify.min.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Judul Berita Acara</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Judul Berita Acara</li>
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
          <!-- <a href="#" class="btn btn-sm bg-gradient-primary" data-toggle="modal" data-target="#modal-add-barang">
            <i class="fa fa-plus"></i> Tambah Data
          </a> -->
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
                    <th rowspan="2">No</th>
                    <th colspan="3" class="text-center">Judul Berita Acara</th>
                    <th rowspan="2">Aksi</th>
                </tr>
              <tr>
                <th>Text 1</th>
                <th>Text 2</th>
                <th>Text 3</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data->result() as $row): ?>               
                <tr>
                    <td>#</td>
                    <td><?= $row->judul_surat?></td>
                    <td><?= $row->text_2?></td>
                    <td><?= $row->text_3?></td>
                    <td>
                    <a href="javascript:()" onclick="editJudul(<?= $row->id_judul?>)"
                      data-toggle="modal" data-target="#modal-add-judul" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i></a>
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

  <?php $this->load->view('judul/modal_judul')?>


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
    });
   
    const editJudul = (id) => {
      $('.modal-title').css('font-weight', 'bold');
      $('.modal-title').text('Edit Judul Berita Acara')
      $.ajax({
          url: baseUrl + 'judul_berita/detailJudul',
          type: 'POST',
          data: {id:id},
          dataType: 'json',
          success: function (data) {
            $('#id_judul').val(data.id_judul)
            $('#judul_surat').val(data.judul_surat)
            $('#text_2').val(data.text_2)
            $('#text_3').val(data.text_3)
          }
      })
    }

  </script>
