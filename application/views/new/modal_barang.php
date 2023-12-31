<div class="modal fade" id="modal-add-barang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Tambah Barang</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                  <form class="form-horizontal" action="<?=base_url('berita_acara/savebarang/'.$this->uri->segment(3))?>" autocomplete="off" method="post" enctype="multipart/form-data">
                    <div class="card-body" style="background-color:#DCDCDC; border-radius:5px">
                      <div class="form-group row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukan Kode Barang.." required>
                          <input type="hidden" name="id_barang" id="id_barang">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama_umum" class="col-sm-2 col-form-label">Nama Umum</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_umum" name="nama_umum" placeholder="Masukan Nama Umum.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="spesifikasi" class="col-sm-2 col-form-label">Spesifikasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Masukan Spesifikasi.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukan Keterangan.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama_file" class="col-sm-2 col-form-label">Foto Barang</label>
                        <div class="col-sm-10">
                          <input type="file" id="edit-gambar-input" class="form-control" name="name_file" placeholder="Masukan Keterangan.." required>
                        </div>
                      </div>
                      <img id="edit-gambar" class="img-thumbnail" style="border-radius:10px;" src="<?= base_url('src/img/logo/placeholder.png')?>" alt="Belum Ada Gambar Barang" width="300" height="200">
                    </div>
                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>