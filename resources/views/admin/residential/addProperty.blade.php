<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Add Property</title>

    <meta name="description" content="" />

    <!-- Icons. Uncomment required icon fonts -->
    @include('admin.include.header')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('admin.include.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
            @include('admin.include.nav')

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Residential Property /</span>
                            Add Property</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="addResidentialProperty">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Property Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Property Name</label>
                                                    <input class="form-control" type="text" id="property_name"
                                                        name="property_name" value=""
                                                        placeholder="Enter Property Name" />
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Property type</label>
                                                    <select name="property_type" class="form-control">
                                                        <option value="Rental">Rental</option>
                                                        <option value="Sale">Sale</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Building Name</label>
                                                    <input class="form-control" type="text" id="building_name"
                                                        name="building_name" placeholder="Enter Building Name" />
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Floor</label>
                                                    <input class="form-control" type="text" id="floor"
                                                        name="floor"placeholder="Enter Floor" />
                                                </div>
                                                
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Selling Price</label>
                                                    <input class="form-control" type="text" id="" name="sale_price" value=""
                                                        placeholder="Enter Selling Price" />
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Carpet area</label>
                                                    <input class="form-control" type="text" id="" name="carpet" value=""
                                                        placeholder="Enter Carpet Area" />
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Car Parkings</label>
                                                    <input class="form-control" type="text" id="parking" name="parking"
                                                        value="" placeholder="Enter Parkings" />
                                                </div>
                                                
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Building Age</label>
                                                    <input class="form-control" type="text" id="building_age" name="building_age"
                                                        placeholder="Enter Building Age" />
                                                </div>
                                                
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Furnished?</label>
                                                    <select name="furnished" class="form-control">
                                                        <option value="furnished">Furnished</option>
                                                        <option value="unfurnished">Unfurnished</option>
                                                        <option value="semi-furnished">Semi Furnished</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Availability Date</label>
                                                    <input class="form-control" type="date" id="availability_date" name="availability_date"
                                                        value="" placeholder="availability date" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mb-4">
                                        <h5 class="card-header">Location</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="property_name" class="form-label">Location</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="location" name="location" value=""
                                                        placeholder="Enter Address"></textarea>
                                                </div>

                                                <div class="mb-3 col-md-12">
                                                    <label for="property_name" class="form-label">Landmark</label>
                                                    <input class="form-control" type="text" id="" name="landmark"
                                                        value="" placeholder="Enter Landmark" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Property Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="property_details" name="property_details" value=""
                                                        placeholder="Enter Property Details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Docs -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Property Assets</h5>
                                        <!-- Account -->

                                        <div class="card-body doc-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Select All Documents</label>
                                                    <input class="form-control" type="file" id="property_assets[]"
                                                        name="property_assets[]" multiple />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                name="submitBtn">Add Property</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    @include('admin.include.footer')
    <script>
    


    $('#addResidentialProperty').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/residential/add`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/residential/add`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>