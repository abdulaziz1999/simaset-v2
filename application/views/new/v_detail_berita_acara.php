<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="title">Detail Berita Acara</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail</li>
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
                        <a href="<?=base_url('berita_acara')?>"
                            class="btn btn-sm bg-gradient-danger">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                </h3>

                <div class="card-tools">
                  <div class="btn-group">
                      <a href="#" class="btn btn-sm bg-gradient-primary"
                          data-toggle="modal" data-target="#modal-add-barang">
                          <i class="fa fa-plus"></i> Tambah Data
                      </a>
                      &nbsp;
                      <a href="#" class="btn btn-sm bg-gradient-success"
                          data-toggle="modal" data-target="#modal-import">
                          <i class="fa fa-file-excel"></i> Import Data
                      </a>
                      &nbsp;
                      <a href="<?= base_url('detail-print/'.$this->uri->segment(3))?>" target="_blank" class="btn btn-sm bg-gradient-danger">
                          <i class="fa fa-file-pdf"></i> Print Data
                      </a>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="text-center mb-5">
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
                                <td>&nbsp;<?= tgl_indo($detail->tgl_penerimaan)?></td>
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
                                <td>
                                    <?php if($row->qrcode){?>
                                    <img src="<?= base_url('src/img/qrcode/'.$row->qrcode)?>"  class="img-thumbnail rounded" width="200" height="200">
                                    <?php }else{?>
                                    -
                                    <?php }?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="javascript:()" onclick="editBarang(<?= $row->id_barang?>)"
                                        data-toggle="modal" data-target="#modal-add-barang" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i></a>
                                        &nbsp;
                                        <a href="javascript:()" onclick="handleHapus(<?= $row->id_barang?>)"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <h4><b>Lampiran :</b></h4>
                <div class="row">
                    <?php foreach($file->result() as $row):?>
                    <div class="col-md-4 mt-3">
                        <img src="<?= base_url('src/file/'.$row->file_name)?>" class="img-thumbnail rounded" alt="...">
                        <a href="javascript:()" onclick="handleHapusBarang(<?= $row->id?>)"class="btn btn-sm btn-danger mt-2"><i class="fa fa-trash"></i></a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?php $this->load->view('new/modal_import')?>
<?php $this->load->view('new/modal_barang')?>

<script src="<?=base_url()?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "language": {
            "sSearch": "Cari"
        }
    });
});

const handleHapus = (id) => {
        var konfirm = confirm('Apakah Anda Ingin Menghapus Data !');
        if (konfirm) {
            window.location.href = "<?= base_url('berita_acara/hapusbarang/')?>" + id;
        }
    }

const handleHapusBarang = (id) => {
        var konfirm = confirm('Apakah Anda Ingin Menghapus Data !');
        if (konfirm) {
            window.location.href = "<?= base_url('berita_acara/hapusfile/')?>" + id;
        }
    }

const editBarang = (id) => {
    $('.modal-title').text('Edit Barang');
    $.ajax({
        url: '' + id,
        type: 'POST',
        
    })
}
</script>