<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Product Assets</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <form id="addNewAssets">
                                    @csrf
                                    <input class="form-control product_uid" type="hidden" id="product_uid" name="product_uid" />
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Add New Assets</label>
                                        <input class="form-control" type="file" id="product_assets[]" name="product_assets[]" multiple />
                                    </div>
                                
                                    <div class="mb-3 col-md-12">
                                        <button type="submit" class="btn btn-primary addNewAssetsID" id="addNewAssetsID" name="addNewAssetsID">Save Package</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <h4>All Assets</h4>
                                <div id="assetsData" class="assetsData"></div>
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