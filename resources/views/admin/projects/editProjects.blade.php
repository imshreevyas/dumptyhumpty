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
                            Edit Projects</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="editProject">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Details</h5>
                                        <!-- Account -->

                                        @php
                                        $aminities = json_decode($project[0]['aminities'],true);
                                        $locationAdvantages = json_decode($project[0]['locationAdvantages'],true);
                                        $specifications = json_decode($project[0]['specifications'],true);
                                        @endphp

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="project_name" class="form-label">Project Name</label>
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        placeholder="Enter Project Name"
                                                        value="{{ $project[0]['name'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Builder Name</label>
                                                    <input class="form-control" type="text" id="builderName"
                                                        name="builderName" placeholder="Enter Bulder Name"
                                                        value="{{ $project[0]['builderName'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Address</label>
                                                    <input class="form-control" type="text" id="address" name="address"
                                                        placeholder="Enter Address"
                                                        value="{{ $project[0]['address'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Amount Range
                                                        Start</label>
                                                    <input class="form-control" type="text" id="amtRangeStart"
                                                        name="amtRangeStart" placeholder="Enter Amount Range Start"
                                                        value="{{ $project[0]['amtRangeStart'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Amount Range
                                                        End</label>
                                                    <input class="form-control" type="text" id="amtRangeEnd"
                                                        name="amtRangeEnd" placeholder="Enter Amount Range End"
                                                        value="{{ $project[0]['amtRangeEnd'] }}" />
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
                                                        name="projectType" value="{{ $project[0]['projectType'] }}"
                                                        placeholder="Enter Project Type eg:Residential" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Property Type</label>
                                                    <input class="form-control" type="text" id="propertyType"
                                                        name="propertyType" value="{{ $project[0]['propertyType'] }}"
                                                        placeholder="Enter Property Type eg:Flat" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Is Under
                                                        Construction?</label>
                                                    <select name="is_underConstruction" id="is_underConstruction"
                                                        class="form-control">
                                                        <option
                                                            {{ $project[0]['is_underConstruction'] == '1' ? 'selected' : '' }}
                                                            value="1">Yes</option>
                                                        <option
                                                            {{ $project[0]['is_underConstruction'] == '0' ? 'selected' : '' }}
                                                            value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Is Rera
                                                        Approved?</label>
                                                    <select name="isReraApproved" id="isReraApproved"
                                                        class="form-control">
                                                        <option
                                                            {{ $project[0]['isReraApproved'] == '1' ? 'selected' : '' }}
                                                            value="1">Yes</option>
                                                        <option
                                                            {{ $project[0]['isReraApproved'] == '0' ? 'selected' : '' }}
                                                            value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Rera ID</label>
                                                    <input class="form-control" type="text" id="reraID" name="reraID"
                                                        placeholder="Enter Rera ID"
                                                        value="{{ $project[0]['reraID'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Possession
                                                        Date</label>
                                                    <input class="form-control" type="date" id="possessionDate"
                                                        name="possessionDate" placeholder="Enter possessionDate"
                                                        value="{{ date('Y-m-d',strtotime($project[0]['possessionDate'])) }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Project Size</label>
                                                    <input class="form-control" type="text" id="projectSize"
                                                        name="projectSize" placeholder="Enter Project Size"
                                                        value="{{ $project[0]['projectSize'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Total Tower</label>
                                                    <input class="form-control" type="text" id="totaltower"
                                                        name="totaltower" placeholder="Enter Total Tower"
                                                        value="{{ $project[0]['totaltower'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Total Unit</label>
                                                    <input class="form-control" type="text" id="totalUnit"
                                                        name="totalUnit" placeholder="Enter Total Unit"
                                                        value="{{ $project[0]['totalUnit'] }}" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Rating</label>
                                                    <input class="form-control" type="text" id="ratings" name="ratings"
                                                        placeholder="Enter Ratings"
                                                        value="{{ $project[0]['ratings'] }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Docs -->

                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Animities</h5>
                                        <!-- Account -->


                                        <div class="card-body animities-div">
                                            @if(count($aminities) > 0)
                                            @foreach($aminities as $key=>$singledata)
                                            <div class="row {{ $key > 0 ? 'animities-div-'.$key : '' }}">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Aminities</label>
                                                    <input class="form-control" type="text" id="aminities[{{$key}}]"
                                                        name="aminities[{{$key}}]" value="{{ $singledata }}"
                                                        placeholder="Enter Aminities" />
                                                </div>
                                                @if($key > 0)
                                                <div class="mb-3 col-md-3">
                                                    <button class="btn btn-danger" type="button"
                                                        onclick="deleteDiv('animities-div-{{ $key }}')">Delete
                                                        Div</button>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>

                                        <div class="card-footer">
                                            <button onclick="addNewAminities(this)" type="button"
                                                data-key="{{count($aminities)}}" class="btn btn-primary">Add New
                                                Aminities</button>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Location Advantages</h5>
                                        <!-- Account -->
                                        <div class="card-body locationAdvantages-div">
                                            @if(count($locationAdvantages) > 0)
                                            @foreach($locationAdvantages as $key=>$singledata)
                                            <div class="row {{ $key > 0 ? 'locationAdvantages-div-'.$key : '' }}">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Location Advantages</label>
                                                    <input class="form-control" type="text"
                                                        id="locationAdvantages[{{$key}}]"
                                                        name="locationAdvantages[{{$key}}]" value="{{ $singledata }}"
                                                        placeholder="Enter Location Advantages" />
                                                </div>
                                                @if($key > 0)
                                                <div class="mb-3 col-md-3">
                                                    <button class="btn btn-danger" type="button"
                                                        onclick="deleteDiv('locationAdvantages-div-{{ $key }}')">Delete
                                                        Div</button>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewLocationAdvantages(this)" type="button"
                                                data-key="{{count($locationAdvantages)}}" class="btn btn-primary">Add
                                                New
                                                location Advantages</button>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Specifications</h5>
                                        <!-- Account -->
                                        <div class="card-body specifications-div">
                                            @if(count($specifications) > 0)
                                            @foreach($specifications as $key=>$singledata)
                                            <div class="row {{ $key > 0 ? 'specifications-div-'.$key : '' }}">
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label">Enter
                                                        Specifications</label>
                                                    <input class="form-control" type="text"
                                                        id="specifications[{{$key}}]" name="specifications[{{$key}}]"
                                                        placeholder="Enter Specifications" value="{{ $singledata }}" />
                                                </div>
                                                @if($key > 0)
                                                <div class="mb-3 col-md-3">
                                                    <button class="btn btn-danger" type="button"
                                                        onclick="deleteDiv('specifications-div-{{ $key }}')">Delete
                                                        Div</button>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="addNewSpecifications(this)" type="button"
                                                data-key="{{count($specifications)}}" class="btn btn-primary">Add New
                                                Specifications</button>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects SEO Details</h5>
                                        <!-- Account -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="project_name" class="form-label">Project Slug</label>
                                                    <input class="form-control" type="text" id="slug" name="slug"
                                                        placeholder="Enter Project Slug"
                                                        value="{{ $project[0]['slug'] }}" />
                                                </div>

                                                <div class="mb-3 col-md-8">
                                                    <label for="project_name" class="form-label">Project
                                                        Description</label>
                                                    <textarea class="form-control" id="projectDesc" name="projectDesc"
                                                        placeholder="Enter Project projectDesc"
                                                        value="{{ $project[0]['projectDesc'] }}">{{ $project[0]['projectDesc'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ $project[0]['id'] }}" name="id">
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


    $('#editProject').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/editProject`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/manageProjects`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>