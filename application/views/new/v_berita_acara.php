<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?=base_url()?>src/backend/dropify/dropify.min.css">

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
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Berita Acara</li>
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
          <div class="btn-group">
            <a href="#" class="btn btn-sm bg-gradient-primary" data-toggle="modal" data-target="#modal-add-barang">
              <i class="fa fa-plus"></i> Tambah Data
            </a>
            &nbsp;
            <a href="#" class="btn btn-sm bg-gradient-success"
              data-toggle="modal" data-target="#modal-import">
              <i class="fa fa-file-excel"></i> Import Data
            </a>
          </div>
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
                <th>Tanggal Penerimaan</th>
                <th>Diterima Dari</th>
                <th>No Kontrak</th>
                <th>No PPTK</th>
                <th>Program</th>
                <th>Kegitan</th>
                <th>No Arsip</th>
                <th>Jumlah Barang</th>
                <th>Upload File</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data->result() as $row): ?>               
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row->no_berita?></td>
                    <td><?= tgl_indo($row->tgl_penerimaan)?></td>
                    <td><?= $row->diterima_dari?></td>
                    <td><?= $row->no_kontrak?></td>
                    <td><?= $row->no_pptk?></td>
                    <td><?= $row->program?></td>
                    <td><?= $row->kegiatan?></td>
                    <td><?= $row->no_arsip?></td>
                    <td>
                      <button class="btn btn-sm btn-secondary"> 
                        <i class="fa fa-briefcase"></i> &nbsp; 
                        <span class="badge badge-light"><?= count_barang($row->id_berita)?></span>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-warning" onclick="tombolUpload(<?=$row->id_berita?>)" data-toggle="modal" data-target="#modal-upload"> 
                        <i class="fa fa-upload"></i> 
                        <span class="badge badge-light"><?= count_file($row->id_berita)?></span>
                      </button>
                    </td>
                    <td>
                      <a href="<?= base_url('berita_acara/detail/'.$row->id_berita)?>" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i></a>
                      <a href="javascript:()" onclick="handleHapus('<?= $row->id_berita?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

  <?php $this->load->view('new/modal_berita_acara')?>
  <?php $this->load->view('new/modal_upload_file')?>
  <?php $this->load->view('new/modal_import_excel')?>


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
        // messages: {
        //           default: 'Drag atau drop untuk memilih gambar',
        //           replace: 'Ganti', 
        //           remove:  'Hapus',
        //           error:   'error'
        //       }
      // });
    });
    function tombolUpload(id){
        $('#berita_id').val(id);
      }

      const handleHapus = (id) => {
        var konfirm = confirm('Apakah Anda Ingin Menghapus Data !');
        if (konfirm) {
            window.location.href = "<?= base_url('berita_acara/deleteBerita/')?>" + id;
        }
    }
  </script>
