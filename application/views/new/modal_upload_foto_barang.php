<div class="modal fade" id="modal-upload">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Foto Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= base_url('berita_acara/uploadFotoBarang')?>" enctype="multipart/form-data" >
              <div class="modal-body">
                  <div class="alert alert-warning" role="alert">
                   <i class="fa fa-exclamation-triangle text-red"></i> Upload file dengan extension png,jpeg,jpg.
                  </div>
                  <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" class="form-control" id="edit-gambar-input2" name="name_file" required/>
                    <input type="hidden" name="fileSubmit" value="upload">
                    <input type="hidden" name="id_barang" id="id_barang_upload" >
                  </div>
                  <div class="form-group text-center">
                    <img id="edit-gambar2" class="img-thumbnail" style="border-radius:10px;" src="<?= base_url('src/img/logo/placeholder.png')?>" alt="Gambar Barang" width="300" height="200">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
                  <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload</button>
              </div>
            </form>
        </div>
    </div>
</div>