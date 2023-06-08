<div class="row pt-3">
	<div class="col">
        <table id="example1" class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Peminjaman</th>
                <th>Tgl Pinjam</th>
                <th>Status</th>
                <th>Keterangan</th>
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
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
	</div>
</div>
<div class="row pt-4">
	<div class="col-md-8">
		
	</div>
	<div class="col-md-4 text-center">
		<p>Kementrian BUMN</p>
		<p class="ex1">PTP. Nusantara IV</p>
		(_________________)</br>
        <p>
            Manager Diskrit I
        </p>
	</div>
</div> 			
  