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
              <li class="breadcrumb-item"><a href="<?=base_url('maintenance')?>">Data Inventory</a></li>
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
          <h3 class="card-title">Detail Data Inventory</h3>

          <div class="card-tools">
            <?php if ($this->session->userdata('role')=='1'): ?>
              <a href="<?=base_url('print-inventory/'.$item['id']);?>" class="btn btn-danger" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i> Print
              </a>
            <?php else: ?>
              <a href="<?=base_url('print-inventory-guest/'.$item['id']);?>" class="btn btn-danger" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i> Print
              </a>
            <?php endif ?>  
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
                  <?php if($this->session->userdata('role')=='1'){?>
                  <tr>
                      <td width="100px">NO. BAST PEMEGANG</td>
                      <td width="50px">:</td>
                      <td><?=$item['no_bast'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">KIR RUANG</td>
                      <td width="50px">:</td>
                      <td><?=$item['kir'] ?></td>
                  </tr>
                  <?php } ?>
                  <?php if($this->session->userdata('role')=='2'){?>  
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
                  <?php } ?>
                  <?php if($this->session->userdata('role')=='1'){?>
                  <tr>
                    <td colspan="6" style="text-align: center;"><strong>SURAT ASET</strong></td>
                  </tr>
                  <tr>
                    <td colspan="6" style="text-align: center;">
                        <?php 
                          $ekstensi = substr($item['name_file'], -3);
                          if ($ekstensi == 'pdf') { 
                        ?>
                          <iframe src="<?=base_url()?>src/img/surat/<?=$item['name_file'] ?>" style="width:600px; height:600px;" frameborder="0"></iframe>
                        <?php } else { ?>
                          <center>
                            <img src="<?=base_url()?>src/img/surat/<?=$item['name_file'] ?>" alt="Scan Surat" style="width: 50%;">
                          </center>  
                        <?php } ?>
                    </td>
                  </tr>
                  <?php } ?> 
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         <a href="<?=base_url('inventory')?>">
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
