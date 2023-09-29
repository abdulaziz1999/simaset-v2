<div class="modal fade" id="modal-import">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Berita Acara</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= base_url('berita_acara/import/')?>" enctype="multipart/form-data" >
            <div class="modal-body">
                <div class="form-group">
                  <div class="form-group">
                    <a href="<?=base_url('src/file/template_import_berita_acara.xlsx')?>" class="btn btn-sm btn-success" ><i class="fa fa-file-excel"></i> Download Template</a>
                  </div>
                </div>
                <div class="form-group">
                  <label for="file">Upload File</label>
                  <input type="file" class="form-control" id="file-upload" name="file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Import</button>
            </div>
            </form>
        </div>
    </div>
</div>