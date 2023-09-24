<div class="modal fade" id="modal-upload">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload File Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= base_url('berita_acara/upload_file')?>" enctype="multipart/form-data" >
              <div class="modal-body">
                  <div class="alert alert-warning" role="alert">
                    Upload file dengan extension png,jpeg,jpg
                  </div>
                  <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" class="form-control" id="file" name="files[]" multiple/>
                    <input type="hidden" name="fileSubmit" value="upload">
                    <input type="hidden" name="berita_id" id="berita_id" >
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