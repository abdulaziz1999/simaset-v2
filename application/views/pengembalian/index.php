<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transaksi Pengembalian</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item active">Transaksi Pengembalian</li>
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
          <a href="<?=base_url('pengembalian/add')?>" class="btn btn-block bg-gradient-primary">
            Tambah Data
          </a>
        </h3>

        <div class="card-tools">
          <?php if (!empty($tgl1) && !empty($tgl2)) { ?>
              <a href="<?=base_url('print-pengembalian/'.$tgl1.'/'.$tgl2);?>" class="btn btn-danger" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i> Print
              </a>
          <?php } else { ?>
              <a href="<?=base_url('print-all-pengembalian');?>" class="btn btn-danger" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i> Print
              </a>
          <?php } ?>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="row">
                  <div class="col-4">
                    <input type="date" name="date1" class="form-control" required>
                  </div>
                  <div class="col-4">
                    <input type="date" name="date2" class="form-control" required>
                  </div>
                  <div class="col">
                    <button type="submit" name="filter" class="btn btn-block btn-outline-primary">Filter</button>
                  </div>
                  <div class="col">
                    <button type="reset" class="btn btn-block btn-outline-danger">Reset</button>
                  </div>              
              </div>
            </form>
            <br/> 
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Peminjaman</th>
                <th>Tgl Pinjam</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($item as $row): ?>               
              <tr>
                <td><?=$no++;?></td>
                <td><?=$row['kode_pinjam'];?></td>
                <td><?=$row['tgl_pinjam'];?></td>
                <td><?=$row['status'];?></td>
                <td><?=$row['keterangan'];?></td>
                <td>
                  <a href="<?=base_url('pengembalian/edit/'.$row['id'])?>" class="btn btn-info btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="<?=base_url('pengembalian/hapus/'.$row['id'])?>" class="btn btn-danger btn-sm tombol-hapus">
                    <i class="fas fa-trash"></i>
                  </a>
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
      $("#example1").DataTable({
        "language": {
          "sSearch": "Cari"
        }
      });
    });
  </script>
