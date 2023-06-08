<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('inventory')?>">Data Inventory</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Data</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <?php if (validation_errors()): ?>
            <div class="alert alert-danger col-md-8 alert-dismissible">                
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?= validation_errors(); ?>
            </div>
          <?php endif ?>
          <form class="form-horizontal" action="<?=base_url('store-inventory')?>" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group row">
                <label for="barang_id" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-6">
                  <select name="barang_id" class="form-control selectx" required>
                    <option value="">Pilih..</option>
                    <?php foreach ($barang as $x): ?>
                      <option value="<?=$x['id_barang'];?>"><?=$x['kode_barang'];?> | <?=$x['nama_barang'];?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="lokasi_id" class="col-sm-2 col-form-label">Kode Lokasi</label>
                <div class="col-sm-6">
                  <select name="lokasi_id" class="form-control selectx" required>
                    <option value="">Pilih..</option>
                    <?php foreach ($lokasi as $x): ?>
                      <option value="<?=$x['id_lokasi'];?>"><?=$x['kode_lokasi'];?> | <?=$x['nama_lokasi'];?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="tahun_anggaran" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                <div class="col-sm-6">
                  <input type="number" name="tahun_anggaran" placeholder="20XX" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="pptk" class="col-sm-2 col-form-label">PPTK Pengadaan</label>
                <div class="col-sm-6">
                  <input type="text" name="pptk" placeholder="Masukan PPTK Pengadaan.." class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_bast" class="col-sm-2 col-form-label">No. Bast Pemegang</label>
                <div class="col-sm-6">
                  <input type="text" name="no_bast" placeholder="Masukan No. Bast Pemegang.." class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kir" class="col-sm-2 col-form-label">KIR</label>
                <div class="col-sm-6">
                  <input type="text" name="kir" placeholder="Masukan KIR.." class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                <div class="col-sm-6">
                  <input type="number" name="tahun" placeholder="20XX" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="name_file" class="col-sm-2 col-form-label">Surat Aset</label>
                <div class="col-sm-6">
                  <input type="file" name="name_file" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_terima" class="col-sm-2 col-form-label">Generate QR Code?</label>
                <div class="col-sm-6">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="generate" id="generate">
                    <label class="form-check-label" for="generate">
                      Ya
                    </label>
                  </div>
                </div>
              </div>        
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?=base_url('inventory')?>">
                <button type="button" class="btn btn-danger">Kembali</button>
              </a>
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.card-footer -->
          </form>
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
  <!-- /.content-wrapper -->
  <script src="<?=base_url()?>src/backend/plugins/select2/js/select2.full.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.selectx').select2({
        placeholder: "Pilih..",
        allowClear: true,
        theme: 'bootstrap4'
      });
    });
  </script>