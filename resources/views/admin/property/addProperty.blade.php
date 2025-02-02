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


                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Property /</span>
                            Add Property</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="updateProfile">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Property Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="project_id" class="form-label">Select Project</label>
                                                    <select name="project_id" class="form-control">
                                                        <option value="0">Select</option>
                                                        @if(count($projects) > 0)
                                                        @foreach($projects as $singleProjects)
                                                        <option value="{{ $singleProjects['id'] }}">
                                                            {{ $singleProjects['name'] }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Property Name</label>
                                                    <input class="form-control" type="text" id="property_name"
                                                        name="property_name" value=""
                                                        placeholder="Enter Property Name" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Total floors</label>
                                                    <input class="form-control" type="text" id="location"
                                                        name="total_floor" value="0" placeholder="Enter Total floors" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Property
                                                        Floors</label>
                                                    <input class="form-control" type="text" id="location" name="floor"
                                                        value="0" placeholder="Enter Property floors" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Total Beds</label>
                                                    <input class="form-control" type="text" id="location" name="beds"
                                                        value="0" placeholder="Enter Total Beds" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Total
                                                        Bathrooms</label>
                                                    <input class="form-control" type="text" id="location"
                                                        name="bathroom" value="0" placeholder="Enter Total Bathrooms" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Kitchen type</label>
                                                    <input class="form-control" type="text" id="" name="kitchen_type"
                                                        value="" placeholder="Enter Kitchen Type" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Car Parkings</label>
                                                    <input class="form-control" type="text" id="" name="car_praking"
                                                        value="" placeholder="Enter Car Parkings" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Property type</label>
                                                    <select name="property_type" class="form-control">
                                                        <option value="new">New Property</option>
                                                        <option value="resell">Resell Property</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Water Status</label>
                                                    <input class="form-control" type="text" id="" name="water_status"
                                                        value="" placeholder="Enter Water Status" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Carpet area</label>
                                                    <input class="form-control" type="text" id="" name="carpet" value=""
                                                        placeholder="Enter Carpet Area" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Carpet Rate</label>
                                                    <input class="form-control" type="text" id="" name="carpet_rate"
                                                        value="" placeholder="Enter Carpet Rate" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Selling Price</label>
                                                    <input class="form-control" type="text" id="" name="amount" value=""
                                                        placeholder="Enter Selling Price" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">For Rent?</label>
                                                    <select name="for_rent" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Furnished?</label>
                                                    <input class="form-control" type="text" id="" name="furnished"
                                                        value="" placeholder="Furnished?" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mb-4">
                                        <h5 class="card-header">Address</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="short_desc" name="address" value=""
                                                        placeholder="Enter Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Long
                                            Description</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="long_desc" name="long_desc" value=""
                                                        placeholder="Enter Long desc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Property Animities</h5>
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
                                        <h5 class="card-header">Other Notes</h5>
                                        <!-- Account -->
                                        <div class="card-body other_notes-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Other Notes</label>
                                                    <input class="form-control" type="text" id="other_notes[0]"
                                                        name="other_notes[0]" placeholder="Enter Location Advantages" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewOtherNotes(this)" type="button" data-key="0"
                                                class="btn btn-primary">Add New
                                                location Advantages</button>
                                        </div>
                                    </div>

                                    <!-- Upload Docs -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Property Documents</h5>
                                        <!-- Account -->

                                        <div class="card-body doc-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Select document
                                                        Type</label>
                                                    <select class="form-control" name="doc[0][document_type]"
                                                        id="doc[0][document_type]">
                                                        <option value="0">Image</option>
                                                        <option value="1">Video</option>
                                                        <option value="2">Doc</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Document Name</label>
                                                    <input class="form-control" type="text" id="doc[0][document_name]"
                                                        name="doc[0][document_name]" value=""
                                                        placeholder="Enter Document Name" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="property_name" class="form-label">Select
                                                        Document</label>
                                                    <input class="form-control" type="file" id="doc[0][document_file]"
                                                        name="doc[0][document_file]" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewDoc(this)" type="button" data-key="0"
                                                class="btn btn-primary">Add New
                                                Document</button>
                                        </div>
                                    </div>


                                    <div class="card mb-4">
                                        <h5 class="card-header">Property SEO Details</h5>
                                        <!-- Account -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="project_name" class="form-label">Property Slug</label>
                                                    <input class="form-control" type="text" id="slug" name="slug"
                                                        placeholder="Enter Project Slug" />
                                                </div>
                                            </div>
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

    function addNewOtherNotes(e) {
        var key = $(e).attr('data-key');
        var newkey = parseInt(key) + 1;
        html = `<div class="row other_notes-div-${newkey}">
            <div class="mb-3 col-md-4">
                <label for="projects_name" class="form-label">Enter
                Location Advantages</label>
                <input class="form-control" type="text" id="other_notes[${newkey}]"
                    name="other_notes[${newkey}]" placeholder="Enter other_notes"/>
            </div>
            <div class="mb-3 col-md-3">
                <button class="btn btn-danger" type="button" onclick="deleteDiv('other_notes-div-${newkey}')">Delete Div</button>
            </div>
        </div>`;

        $('.other_notes-div').append(html);
        $(e).attr('data-key', newkey)
    }

    function deleteDiv(key) {
        $('.' + key).remove();
    }

    function addNewDoc(e) {
        var key = $(e).attr('data-key');
        var newkey = parseInt(key) + 1;
        html = `<div class="row doc-div-${newkey}" style="border-top:1px solid #eee;padding-top:20px">
        <div class="mb-3 col-md-3">
                <label for="property_name" class="form-label">Select document
                    Type</label>
                <select class="form-control" name="doc[0][document_type]"
                    id="doc[${newkey}][document_type]">
                    <option value="0">Image</option>
                    <option value="1">Docs</option>
                </select>
            </div>
            <div class="mb-3 col-md-3">
                <label for="property_name" class="form-label">Document Name</label>
                <input class="form-control" type="text" id="doc[0][document_name]"
                    name="doc[${newkey}][document_name]" value=""
                    placeholder="Enter Document Name" />
            </div>
            <div class="mb-3 col-md-3">
                <label for="property_name" class="form-label">Select
                    Document</label>
                <input class="form-control" type="file" id="doc[0][document_file]"
                    name="doc[${newkey}][document_file]" />
            </div>
            <div class="mb-3 col-md-3">
                <button class="btn btn-danger" type="button" onclick="deleteDocDiv(${newkey})">Delete Div</button>
            </div>
        </div>`;

        $('.doc-div').append(html);
        $(e).attr('data-key', newkey)
    }

    function deleteDocDiv(key) {
        $('.doc-div-' + key).remove();
    }


    $('#updateProfile').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/updateAccount`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/myAccount`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>