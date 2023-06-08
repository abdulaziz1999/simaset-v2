<!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item"><a href="<?=base_url('peminjaman')?>">Transaksi Peminjaman</a></li>
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
          <form class="form-horizontal" action="<?=base_url('store-peminjaman')?>" autocomplete="off" method="post">
            <div class="card-body">
              <div class="form-group row">
                <label for="kode_pinjam" class="col-sm-3 col-form-label">Kode Peminjaman</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode_pinjam" placeholder="Masukan Kode Peminjaman.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_surat" placeholder="Masukan Nomor Surat.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="dept" class="col-sm-3 col-form-label">Departemen</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dept" placeholder="Masukan Departemen.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kebun" class="col-sm-3 col-form-label">Kebun/Unit</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kebun" placeholder="Masukan Kebun/Unit.." required>
                </div>
              </div>           
              <div class="form-group row">
                <label for="tgl_pinjam" class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" name="tgl_pinjam" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tgl_kembali" class="col-sm-3 col-form-label">Tanggal Pengembalian</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" name="tgl_kembali" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_kendaraan" class="col-sm-3 col-form-label">Jenis Kendaraan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jenis_kendaraan" placeholder="Masukan Jenis Kendaraan.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_polisi" class="col-sm-3 col-form-label">Nomor Polisi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_polisi" placeholder="Masukan Nomor Polisi.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_pemakai" class="col-sm-3 col-form-label">Nama Pemakai</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_pemakai" placeholder="Masukan Nama Pemakai.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="tujuan" placeholder="Masukan Tujuan.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="keperluan" class="col-sm-3 col-form-label">Keperluan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="keperluan" placeholder="Masukan Keperluan.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jam_brgkt" class="col-sm-3 col-form-label">Jam Berangkat</label>
                <div class="col-sm-6">
                  <input type="time" class="form-control" name="jam_brgkt" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jam_kembali" class="col-sm-3 col-form-label">Jam Kembali</label>
                <div class="col-sm-6">
                  <input type="time" class="form-control" name="jam_kembali" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jarak" class="col-sm-3 col-form-label">Jarak yg di Tempuh (KM)</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="jarak" required>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?=base_url('peminjaman')?>">
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