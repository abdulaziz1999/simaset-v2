<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item active">Transaksi Peminjaman</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <!-- <a href="<?=base_url('berita_acra/add')?>" class="btn btn-block bg-gradient-primary">
            Tambah Data
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
            <h4 class="text-center mb-5" >
              <strong>
              PEMERINTAH DAERAH TANGERANG SELATAN
              <br>DINAS LINGKUNGAN HIDUP <br>
              BERITA ACARA SERAH TERIMA PEMBELIAN LAINNYA
              </strong>
            </h4>
            <div class="row pb-4">
              <div class="col-md-6">
                <table>
                  <tr>
                    <td>No Berita</td>
                    <td>:</td>
                    <td>&nbsp;<?= $detail->no_berita?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Penerimaan</td>
                    <td>:</td>
                    <td>&nbsp;<?= $detail->tgl_penerimaan?></td>
                  </tr>
                  <tr>
                    <td>Diterima Dari</td>
                    <td>:</td>
                    <td>&nbsp;<?= $detail->diterima_dari?></td>
                  </tr>
                  <tr>
                    <td>No PPTK</td>
                    <td>:</td>
                    <td>&nbsp;<?= $detail->no_pptk?></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                <table style="float: right;">
                  <tr>
                    <td>Program</td>
                    <td>:</td>
                    <td>&nbsp;<?= $detail->program?></td>
                  </tr>
                  <tr>
                    <td>Kegiatan</td>
                    <td>:</td>
                    <td>&nbsp;<?= $detail->program?></td>
                  </tr>
                </table>
              </div>
            </div>
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Umum</th>
                <th>Spesifikasi</th>
                <th>Jumlah</th>
                <th>Harga Barang</th>
                <th>Keterangan</th>
                <th>QR</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data->result() as $row): ?>               
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $row->kode_barang?></td>
                    <td><?= $row->nama_barang?></td>
                    <td><?= $row->nama_umum?></td>
                    <td><?= $row->spesifikasi?></td>
                    <td><?= $row->jumlah?></td>
                    <td><?= $row->harga?></td>
                    <td><?= $row->ket?></td>
                    <td><?= $row->qrcode?></td>
                    <td>
                    <a href="<?= base_url('berita_acara/edit_b/'.$row->id_barang)?>" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i></a>
                    <a href="<?= base_url('berita_acara/hapus_b/'.$row->id_barang)?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          </div>           
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
  <script src="<?=base_url()?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?=base_url()?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $(function () {
      // $("#example1").DataTable({
      //   "language": {
      //     "sSearch": "Cari"
      //   }
      // });
    });
  </script>
