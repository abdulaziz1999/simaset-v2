<div class="row pt-3">
	<div class="col">
         <table class="table table-borderless" id="users">
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
                      <td width="100px">NO. BAST PEMEGANG</td>
                      <td width="50px">:</td>
                      <td><?=$item['no_bast'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">KIR RUANG</td>
                      <td width="50px">:</td>
                      <td><?=$item['kir'] ?></td>
                  </tr>
                  <?php 
                      $ekstensi = substr($item['name_file'], -3);
                      if($ekstensi == 'jpg' || $ekstensi == 'jpeg' || $ekstensi == 'png' || $ekstensi == 'PNG'){?>
                  <tr>
                    <td colspan="6" style="text-align: center;"><strong>SURAT ASET</strong></td>
                  </tr>
                  <tr>
                    <td colspan="6" style="text-align: center;">
                        <center>
                          <img src="<?=base_url()?>src/img/surat/<?=$item['name_file'] ?>" alt="Scan Surat" style="width: 50%;">
                        </center>
                    </td>
                  </tr>
                  <?php } ?> 
              </tbody>
          </table>
	</div>
</div>
		
  