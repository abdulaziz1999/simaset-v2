<div class="modal fade" id="modal-add-judul">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Tambah Barang</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                  <form class="form-horizontal" action="<?=base_url('judul_berita/update')?>" autocomplete="off" method="post">
                    <div class="card-body" style="background-color:#DCDCDC; border-radius:5px">
                      <div class="form-group row">
                        <label for="judul_surat" class="col-sm-2 col-form-label">Text 1</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="judul_surat" name="judul_surat" placeholder="Masukan Kalimat 1.." required>
                          <input type="hidden" name="id_judul" id="id_judul">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="text_2" class="col-sm-2 col-form-label">Text 2</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="text_2" name="text_2" placeholder="Masukan Kalimat 2.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="text_3" class="col-sm-2 col-form-label">Text 3</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="text_3" name="text_3" placeholder="Masukan Kalimat 3.." required>
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