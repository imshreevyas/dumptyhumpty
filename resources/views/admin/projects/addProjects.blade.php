<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Add projects</title>

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


                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Projects /</span>
                            Add Projects</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="updateProject">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="project_name" class="form-label">Project Name</label>
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        value="" placeholder="Enter Project Name" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Builder Name</label>
                                                    <input class="form-control" type="text" id="builderName"
                                                        name="builderName" value="" placeholder="Enter Bulder Name" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Address</label>
                                                    <input class="form-control" type="text" id="address" name="address"
                                                        value="" placeholder="Enter Address" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Amount Range
                                                        Start</label>
                                                    <input class="form-control" type="text" id="amtRangeStart"
                                                        name="amtRangeStart" value=""
                                                        placeholder="Enter Amount Range Start" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Amount Range
                                                        End</label>
                                                    <input class="form-control" type="text" id="amtRangeEnd"
                                                        name="amtRangeEnd" value=""
                                                        placeholder="Enter Amount Range End" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projectType" class="form-label">Project Type</label>
                                                    <input class="form-control" type="text" id="projectType"
                                                        name="projectType" value=""
                                                        placeholder="Enter Project Type eg:Residential" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Property Type</label>
                                                    <input class="form-control" type="text" id="propertyType"
                                                        name="propertyType" value=""
                                                        placeholder="Enter Property Type eg:Flat" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Is Under
                                                        Construction?</label>
                                                    <select name="is_underConstruction" id="is_underConstruction"
                                                        class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Is Rera
                                                        Approved?</label>
                                                    <select name="isReraApproved" id="isReraApproved"
                                                        class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Rera ID</label>
                                                    <input class="form-control" type="text" id="reraID" name="reraID"
                                                        value="" placeholder="Enter Rera ID" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Possession
                                                        Date</label>
                                                    <input class="form-control" type="date" id="possessionDate"
                                                        name="possessionDate" value=""
                                                        placeholder="Enter possessionDate" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Project Size</label>
                                                    <input class="form-control" type="text" id="projectSize"
                                                        name="projectSize" value="" placeholder="Enter Project Size" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Total Tower</label>
                                                    <input class="form-control" type="text" id="totaltower"
                                                        name="totaltower" value="" placeholder="Enter Total Tower" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Total Unit</label>
                                                    <input class="form-control" type="text" id="totalUnit"
                                                        name="totalUnit" value="" placeholder="Enter Total Unit" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Rating</label>
                                                    <input class="form-control" type="text" id="ratings" name="ratings"
                                                        value="" placeholder="Enter Ratings" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Docs -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Document</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Floor Plan</label>
                                                    <input class="form-control" type="file" id="floorPlan"
                                                        name="floorPlan" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Project Brochure</label>
                                                    <input class="form-control" type="file" id="projectBrochure"
                                                        name="projectBrochure" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Developer Logo</label>
                                                    <input class="form-control" type="file" id="developerLogo"
                                                        name="developerLogo" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Project Banner</label>
                                                    <input class="form-control" type="file" id="projectBanner"
                                                        name="projectBanner" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Animities</h5>
                                        <!-- Account -->
                                        <div class="card-body animities-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Aminities</label>
                                                    <input class="form-control" type="text" id="aminities[0]"
                                                        name="aminities[0]" placeholder="Enter Aminities" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewAminities(this)" type="button" data-key="0"
                                                class="btn btn-primary">Add New
                                                Aminities</button>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Location Advantages</h5>
                                        <!-- Account -->
                                        <div class="card-body locationAdvantages-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Location Advantages</label>
                                                    <input class="form-control" type="text" id="locationAdvantages[0]"
                                                        name="locationAdvantages[0]"
                                                        placeholder="Enter Location Advantages" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewLocationAdvantages(this)" type="button" data-key="0"
                                                class="btn btn-primary">Add New
                                                location Advantages</button>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Specifications</h5>
                                        <!-- Account -->
                                        <div class="card-body specifications-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Specifications</label>
                                                    <input class="form-control" type="text" id="specifications[0]"
                                                        name="specifications[0]" placeholder="Enter Specifications" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewSpecifications(this)" type="button" data-key="0"
                                                class="btn btn-primary">Add New
                                                Specifications</button>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <button type="submit" process="add" name="process"
                                            class="btn btn-primary">Save</button>
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
    function addNewAminities(e) {
        var key = $(e).attr('data-key');
        var newkey = parseInt(key) + 1;
        html = `<div class="row animities-div-${newkey}">
            <div class="mb-3 col-md-4">
                <label for="projects_name" class="form-label">Enter
                    Aminities</label>
                <input class="form-control" type="text" id="aminities[${newkey}]"
                    name="aminities[${newkey}]" placeholder="Enter Aminities"/>
            </div>
            <div class="mb-3 col-md-3">
                <button class="btn btn-danger" type="button" onclick="deleteDiv('animities-div-${newkey}')">Delete Div</button>
            </div>
        </div>`;

        $('.animities-div').append(html);
        $(e).attr('data-key', newkey)
    }

    function addNewLocationAdvantages(e) {
        var key = $(e).attr('data-key');
        var newkey = parseInt(key) + 1;
        html = `<div class="row locationAdvantages-div-${newkey}">
            <div class="mb-3 col-md-4">
                <label for="projects_name" class="form-label">Enter
                Location Advantages</label>
                <input class="form-control" type="text" id="locationAdvantages[${newkey}]"
                    name="locationAdvantages[${newkey}]" placeholder="Enter Location Advantages"/>
            </div>
            <div class="mb-3 col-md-3">
                <button class="btn btn-danger" type="button" onclick="deleteDiv('locationAdvantages-div-${newkey}')">Delete Div</button>
            </div>
        </div>`;

        $('.locationAdvantages-div').append(html);
        $(e).attr('data-key', newkey)
    }

    function addNewSpecifications(e) {
        var key = $(e).attr('data-key');
        var newkey = parseInt(key) + 1;
        html = `<div class="row specifications-div-${newkey}">
            <div class="mb-3 col-md-4">
                <label for="projects_name" class="form-label">Enter
                Location Advantages</label>
                <input class="form-control" type="text" id="specifications[${newkey}]"
                    name="specifications[${newkey}]" placeholder="Enter Specifications"/>
            </div>
            <div class="mb-3 col-md-3">
                <button class="btn btn-danger" type="button" onclick="deleteDiv('specifications-div-${newkey}')">Delete Div</button>
            </div>
        </div>`;

        $('.specifications-div').append(html);
        $(e).attr('data-key', newkey)
    }

    function deleteDiv(key) {
        $('.' + key).remove();
    }


    $('#updateProject').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/addProject`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}admin/addProject`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>