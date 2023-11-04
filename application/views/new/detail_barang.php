<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>src/backend/dist/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>ASET</title>
  </head>
  <body>
    
    <section>
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="<?=base_url()?>src/img/logo/AdminLTELogo.png" width="30" height="30" class="d-inline-block align-top" alt="">
             ASET
          </a>
        </div>
      </nav>
    </section>

    <section class="detail-aset mt-5">
      <div class="container">
        <div class="row pt-4">
          <div class="col">
            <div class="text-center mb-3">
              <strong>
                DINAS LINGKUNGAN HIDUP KOTA TANGERANG SELATAN <br>
                ASET MILIK DAERAH
              </strong> 
            </div>
           <table class="table table-striped" id="users">
              <tbody> 
                  <tr>
                    <td colspan="3" class="text-center">
                      <?php if($item['foto']):?>
                      <img class="img-thumbnail" style="border-radius:50px;" src="<?= base_url('src/img/surat/'.$item['foto'])?>" alt="" srcset="">
                      <?php else:?>
                      <img class="img-thumbnail" style="border-radius:50px;" width="500" height="500" src="<?= base_url('src/img/logo/placeholder.png')?>" alt="" srcset="">
                      <?php endif;?>
                    </td>
                  </tr>               
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
                      <td width="100px">NO ARSIP</td>
                      <td width="50px">:</td>
                      <td><?=$detail['no_arsip'] ?></td>
                  </tr>
                  <tr>
                      <td width="200px">TANGGAL PENERIMAAN</td>
                      <td width="50px">:</td>
                      <td><?=tgl_indo($detail['tgl_penerimaan']) ?></td>
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
        </div>
      </div>
    </section>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>