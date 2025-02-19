<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Program Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="assetsData" class=""></div>
                    </div>
                    <hr>
                    <div class="row">
                        <form id="addNewAssets">
                            @csrf
                            <input class="form-control program_uid" type="hidden" id="program_uid" name="program_uid" />
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Add New Banner</label>
                                <input class="form-control" type="file" id="asset" name="asset"  onchange="previewFile(this, 'preview_assets')"/>
                            </div>

                            <div class="mb-3 col-md-6">
                                <img id="preview_assets" style="width: 285px; height: 200px; margin-top: 10px;">
                            </div>
                        
                            <div class="mb-3 col-md-12">
                                <button type="submit" class="btn btn-primary update_type" id="update_type" name="update_type">Update Image</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal('basicModal')">
                        Close
                    </button>
                </div>
        </div>
        
    </div>
</div>

