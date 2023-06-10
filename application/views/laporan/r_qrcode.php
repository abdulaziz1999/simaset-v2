<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active">QR Code</li>
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
        <h3 class="card-title">
          Print QR Code Inventory
        </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
          <div class="card-body">
              <form action="<?=base_url('laporan/print_qrcode')?>" method="post" >
                <div class="row">
                    <div class="col-4">
                        <select name="id_lokasi" class="form-control" required>
                          <option value="">- Lokasi Aset --</option>
                          <?php foreach($lokasi as $row): ?>
                            <option value="<?=$row->id_lokasi;?>" <?= $lok['id_lokasi'] == $row->id_lokasi ? 'selected' : ''?>><?=$row->nama_lokasi;?></option>
                          <?php endforeach; ?>                              
                        </select>
                    </div>
                    <div class="col-4">
                      <select name="tahun_perolehan" class="form-control" required>
                        <option value="">- Tahun Anggaran --</option>
                        <?php 
                        for($i = 2015 ; $i <= date('Y'); $i++){
                          ?>
                            <option value='<?= $i?>' <?= $this->input->post('tahun_perolehan') == $i ? 'selected' : ''?> ><?= $i?></option>
                          <?php
                        }
                        ?>                          
                      </select>
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-block btn-outline-primary">Print</button>
                    </div>
                    <div class="col">
                      <button type="reset" class="btn btn-block btn-outline-danger">Reset</button>
                    </div>              
                </div>
              </form> 
              <?php //print_r($qrdata)?>
              <table class="table table-bordered mt-4 table-sm">
                 <thead>
                 <tr>
                     <th>NO.</th>
                     <th>Kode Barang</th>
                     <th>Nama Barang</th>
                     <th>PPTK</th>
                     <th>QRCode</th>
                     <th>Tahun Anggaran</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php 
                    $no=1;
                    if(@$qrdata){
                    foreach ($qrdata as $row):
                  ?>                 
                   <tr>
                      <td><?=$no++;?></td>
                      <td><?=$row['kode_barang'];?></td>
                      <td><?=$row['nama_barang'];?></td>
                      <td><?=$row['pptk'];?></td>
                      <td><img src="<?=base_url('src/img/qrcode/'.$row['qr_code'])?>" width="100px"></td>
                      <td><?=$row['tahun_anggaran'];?></td>
                   </tr>
                   <?php endforeach;
                   }?>
                 </tbody>
               </table> 
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
