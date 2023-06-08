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
              <li class="breadcrumb-item active">Detail Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Transaksi Peminjaman</h3>

          <div class="card-tools">
            <a href="<?=base_url('print-data-peminjaman/'.$item['id']);?>" class="btn btn-danger" target="_blank">
              <i class="fa fa-print" aria-hidden="true"></i> Cetak Laporan
            </a>
          </div>
        </div>
        <div class="card-body">
            
           <table class="table table-striped" id="users">
              <tbody>                
                  <tr>                    
                      <td width="100px">Kode Peminjaman</td>
                      <td width="50px">:</td>
                      <td><?=$item['kode_pinjam'] ?></td>
                  </tr>
                  <tr>                       
                      <td width="100px">Nomor Surat</td>
                      <td width="50px">:</td>
                      <td><?=$item['no_surat'] ?></td>
                  </tr>
                  <tr>
                      <td width="200px">Departemen</td>
                      <td width="50px">:</td>
                      <td><?=$item['dept'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Kebun/Unit</td>
                      <td width="50px">:</td>
                      <td><?=$item['kebun'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Tanggal Peminjaman</td>
                      <td width="50px">:</td>
                      <td><?=$item['tgl_pinjam'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Tanggal Pengembalian</td>
                      <td width="50px">:</td>
                      <td><?=$item['tgl_kembali'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Jenis Kendaraan</td>
                      <td width="50px">:</td>
                      <td><?=$item['jenis_kendaraan'] ?></td>
                  </tr>                 
                   <tr>
                      <td width="100px">No. Polisi</td>
                      <td width="50px">:</td>
                      <td><?=$item['no_polisi'];?></td>
                  </tr>
                  <tr>
                      <td width="100px">Nama Pemakai</td>
                      <td width="50px">:</td>
                      <td><?=$item['nama_pemakai'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Tujuan</td>
                      <td width="50px">:</td>
                      <td><?=$item['tujuan'];?></td>
                  </tr>
                   <tr>
                      <td width="100px">Keperluan</td>
                      <td width="50px">:</td>
                      <td><?=$item['keperluan'];?></td>
                  </tr>
                   <tr>
                      <td width="100px">Jam Berangkat</td>
                      <td width="50px">:</td>
                      <td><?=$item['jam_brgkt'];?></td>
                  </tr>  
                  <tr>
                      <td width="100px">Jam Kembali</td>
                      <td width="50px">:</td>
                      <td><?=$item['jam_kembali'];?></td>
                  </tr> 
                  <tr>
                      <td width="100px">Jarak</td>
                      <td width="50px">:</td>
                      <td><?=$item['jarak'];?> KM</td>
                  </tr>  
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         <a href="<?=base_url('peminjaman')?>">
          <button type="button" class="btn btn-danger">Kembali</button>
        </a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
