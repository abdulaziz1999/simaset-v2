<div class="modal fade" id="modal-add-barang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Tambah Berita Acara</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="<?=base_url('berita_acara/saveberita')?>" autocomplete="off" method="post">
                <div class="card-body" style="background-color:#DCDCDC; border-radius:5px">
                  <div class="form-group row">
                    <label for="no_berita" class="col-sm-4 col-form-label">No Berita</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="no_berita" placeholder="Masukan Nomor Berita.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_penerimaan" class="col-sm-4 col-form-label">Tanggal Penerimaan</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="tgl_penerimaan" placeholder=".." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="diterima_dari" class="col-sm-4 col-form-label">Di Terima Dari</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="diterima_dari" placeholder="Di Terima Dari.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_kontrak" class="col-sm-4 col-form-label">Nomor Kontrak</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="no_kontrak" placeholder="Masukan Nomor Kontrak.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_pptk" class="col-sm-4 col-form-label">Nomor PPTK</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="no_pptk" placeholder="Masukan Nomor PPTK.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="program" class="col-sm-4 col-form-label">Program</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="program" placeholder="Masukan Nama Program.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kegiatan" class="col-sm-4 col-form-label">Kegiatan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kegiatan" placeholder="Masukan Nama Kegiatan.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_arsip" class="col-sm-4 col-form-label">No Arsip</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="no_arsip" placeholder="Masukan No Arsip.." required>
                    </div>
                  </div>
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