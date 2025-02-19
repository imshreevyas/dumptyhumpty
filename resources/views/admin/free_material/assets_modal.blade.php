<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Free Material Banner</h5>
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
                            <input class="form-control file_uid" type="hidden" id="file_uid" name="file_uid" />
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Add New File</label>
                                <input class="form-control" type="file" id="file" name="file"/>
                            </div>

                            <div class="mb-3 col-md-12">
                                <button type="submit" class="btn btn-primary update_type" id="update_type" name="update_type">Update File</button>
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

