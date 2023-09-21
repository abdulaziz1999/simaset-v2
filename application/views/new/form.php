<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('barang')?>">Barang</a></li>
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
          <h3 class="card-title">Form Tambah Berita Acara </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="<?=base_url('berita_acara/saveberita')?>" autocomplete="off" method="post">
            <div class="card-body">
              <div class="form-group row">
                <label for="no_berita" class="col-sm-2 col-form-label">No Berita</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_berita" placeholder="Masukan Nomor Berita.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_penerimaan" class="col-sm-2 col-form-label">Tanggal Peneriamaan</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" name="tgl_penerimaan" placeholder=".." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="diterima_dari" class="col-sm-2 col-form-label">Di Terima Dari</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="diterima_dari" placeholder="Di Terima Dari.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_kontrak" class="col-sm-2 col-form-label">Nomor Kontrak</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="no_kontrak" placeholder="Masukan Nomor Kontrak.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_pptk" class="col-sm-2 col-form-label">Nomor PPTK</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="no_pptk" placeholder="Masukan Nomor PPTK.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="program" class="col-sm-2 col-form-label">Program</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="program" placeholder="Masukan Nama Program.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kegiatan" placeholder="Masukan Nama Kegiatan.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_arsip" class="col-sm-2 col-form-label">No Arsip</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="no_arsip" placeholder="Masukan Nama Kegiatan.." required>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?=base_url('barang')?>">
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