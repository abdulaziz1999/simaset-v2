<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!-- Main content -->
    <!-- <style>
    .wrap-text {
        max-width: 200px; /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
        word-wrap: break-word; /* Mengaktifkan word wrap */
    }
</style> -->
<body style="overflow-x: hidden;">
    <section class="content" id="content-to-print">
        <!-- Default box -->
        <div class="card">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mr-4">
                        <div><b><?=$detail->no_arsip?></b></div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h4 class="text-center mb-5">
                    <strong class="wrap-text">
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
                                <td>&nbsp;<?= $detail->kegiatan?></td>
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
                                <!-- <th>QR</th> -->
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
                                <td><?= format_currency($row->harga)?></td>
                                <td><?= $row->ket?></td>
                                <!-- <td>
                                    <?php if($row->qrcode){?>
                                    <img src="<?= base_url('src/img/qrcode/'.$row->qrcode)?>"  class="img-thumbnail rounded" width="200" height="200">
                                    <?php }else{?>
                                    -
                                    <?php }?>
                                </td> -->
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <table width="100%">
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="">
                            <td  bgcolor="white" width="50%" align="center">&nbsp;</td>
                            <td  bgcolor="white" width="50%" align="center">Mengetahui</td>
                        </tr>
                        <tr class="">
                            <td bgcolor="white">&nbsp;</td>
                            <td bgcolor="white">&nbsp;</td>
                        </tr>
                        <tr class="">
                            <td bgcolor="white">&nbsp;</td>
                            <td bgcolor="white">&nbsp;</td>
                        </tr>
                        <tr class="">
                            <td bgcolor="white">&nbsp;</td>
                            <td bgcolor="white">&nbsp;</td>
                        </tr>
                        <tr class="">
                            <td bgcolor="white">&nbsp;</td>
                            <td bgcolor="white">&nbsp;</td>
                        </tr>
                        <tr class="">
                            <td bgcolor="white" align="center">&nbsp;</td>
                            <td  bgcolor="white" align="center">&nbsp;(&nbsp;...........................................&nbsp;)&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
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
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

<script>

// $(document).ready(function () {
    window.onload = function () {
    window.print();
}
// });

</script>

</body>