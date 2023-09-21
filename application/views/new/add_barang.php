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
          <h3 class="card-title">Form Tambah Barang </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="<?=base_url('berita_acara/savebarang/'.$this->uri->segment(2))?>" autocomplete="off" method="post">
            <div class="card-body">
              <div class="form-group row">
                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kode_barang" placeholder="Masukan Kode Barang.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_umum" class="col-sm-2 col-form-label">Nama Umum</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_umum" placeholder="Masukan Nama Umum.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="spesifikasi" class="col-sm-2 col-form-label">Spesifikasi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="spesifikasi" placeholder="Masukan Spesifikasi.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="harga" placeholder="Masukan Harga.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="ket" placeholder="Masukan Keterangan.." required>
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