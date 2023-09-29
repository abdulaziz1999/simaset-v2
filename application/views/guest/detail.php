<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Data Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Aset</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-tools">
                  <a href="<?=base_url('print-inventory-guest/'.$item['id']);?>" class="btn btn-danger" target="_blank">
                    <i class="fa fa-print" aria-hidden="true"></i> Print
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="text-center mb-3">
                  <strong>
                    DINAS LINGKUNGAN HIDUP KOTA TANGERANG SELATAN <br>
                    INVENTARIS BARANG MILIK DAERAH
                  </strong> 
                </div>
            <table class="table table-striped" id="users">
                <tbody>                
                    <tr>                    
                        <td width="100px">NAMA BARANG</td>
                        <td width="50px">:</td>
                        <td><?=$item['nama_barang'] ?></td>
                    </tr>
                    <tr>                       
                        <td width="100px">KODE BARANG</td>
                        <td width="50px">:</td>
                        <td><?=$item['kode_barang'] ?></td>
                    </tr>
                    <tr>
                        <td width="200px">KODE LOKASI</td>
                        <td width="50px">:</td>
                        <td><?=$item['kode_lokasi'] ?></td>
                    </tr>
                    <tr>
                        <td width="100px">TAHUN ANGGARAN</td>
                        <td width="50px">:</td>
                        <td><?=$item['tahun_anggaran'] ?></td>
                    </tr>
                    <tr>
                        <td width="100px">PPTK PENGADAAN</td>
                        <td width="50px">:</td>
                        <td><?=$item['pptk'] ?></td>
                    </tr>
                    <tr>
                      <td colspan="6">
                        <ol>
                          <li>BARANG INVENATRIS INI SUDAH TERCATAT PADA ASET DINAS LINGKUNGAN HIDUP KOTA TANGERANG SELATAN;</li>
                          <li>SEGALA PENGAMANAN SUDAH TERTUANG PADA BERITA ACARA DAN/ KIR;</li>
                          <li>DILARANG DIPERJUAL - BELIKAN SERTA DI PINDAH TANGANKAN TANPA PROSES PERUNDANG-UNDANGAN YANG BERLAKU;</li>
                          <li>JIKA KEDAPATAN MENEMUKAN BARANG INI, HARAP DIKEMBALIKAN KEPADA PEMEGANG YANG SAH ATAU PENATAUSAHAAN BARANG DLH.</li>
                        </ol>
                      </td>
                    </tr> 
                </tbody>
            </table>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
