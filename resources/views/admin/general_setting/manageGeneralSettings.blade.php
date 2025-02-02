<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Manage General Settings</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
    </script>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">General Settings /</span> Manage
                        </h4>
                        <div class="card">
                            <div style="display: flex;">
                                <h5 class="card-header">Manage General Settings</h5>
                                <h5 class="card-header">
                                    <a type="button" class="btn btn-outline-secondary btn-small text-red"
                                        onclick="showAddUser()" title="Edit Client Details">Add
                                        New</a>
                                </h5>
                            </div>
                            <div class="table table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Value</th>
                                            <th>Description</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @php($i = 1)
                                        @foreach ($settings as $singledata)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td><i
                                                    class="fab fa-angular fa-lg text-danger me-3"></i>{{ $singledata->name}}
                                            </td>
                                            <td>{{ $singledata->value}}</td>
                                            <td>{{ $singledata->short_desc}}</td>
                                            <td>{{ date('D, d M Y',strtotime($singledata->created_at)) }}</td>
                                            <td>
                                                <a type="button" onclick="editPackage({{$singledata}})"
                                                    title="Edit Client Details"><i
                                                        class="menu-icon tf-icons bx bx-edit"></i></a>
                                                <a type="button" onclick="deleteSetting('{{$singledata->id}}')"
                                                    title="Delete Client Data"><i
                                                        class="menu-icon tf-icons bx bx-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $settings->links() }}
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

    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addSettingForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Settings Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Setting name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="Enter Setting name" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Setting value</label>
                                <input class="form-control" type="text" id="value" name="value"
                                    placeholder="Enter Setting value" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Description</label>
                                <textarea class="form-control" id="short_desc" name="short_desc"
                                    placeholder="Enter Short Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="process" name="process" value="update">Save
                            Settings</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">
                            Close
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <style>
    .docDiv {
        column-gap: 15px;
        row-gap: 12px;
        align-items: center;
        justify-content: center;
    }

    .docDiv .docCol {
        padding: 10px 10px;
        border: 1px solid #c3c3c3;
        display: flex;
        justify-content: space-between;
    }
    </style>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src={{asset("assets/vendor/libs/popper/popper.js")}}></script>
    <script src={{asset("assets/vendor/js/bootstrap.js")}}></script>
    <script src={{asset("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}></script>
    <script src={{asset("assets/vendor/js/menu.js")}}></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src={{asset("assets/vendor/libs/apex-charts/apexcharts.js")}}></script>
    <!-- Main JS -->
    <script src={{asset("assets/js/main.js")}}></script>
    <!-- Page JS -->
    <script src={{asset("assets/js/dashboards-analytics.js")}}></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <script>
    function closeModal() {
        $('.newRow').remove(); //remove all add on documents
        $('#editPackageloyee')[0].reset(); // remove all data in inputs
        $('#basicModal').modal('hide'); //hide the modal 
    }

    function closeModal() {
        $('.docCol').remove(); //remove all add on documents
        $('#docModal').modal('hide'); //hide the modal 
    }

    function show_Toaster(message, type) {
        var success = "#00b09b, #96c93d";
        var error = "#a7202d, #ff4044";
        var ColorCode = type == "success" ? success : error;
        return Toastify({
            text: message,
            duration: 3000,
            close: true,
            gravity: "bottom", // top or bottom
            position: "center", // left, center or right
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: `linear-gradient(to right, ${ColorCode})`,
            },
        }).showToast();
    }

    $(document).ready(function() {
        $('#table_id').DataTable({
            paging: false
        });
    });


    function editPackage(data) {
        console.log(data.valid_till);
        $('#id').val(data.id)
        $('#name').val(data.name)
        $('#value').val(data.value)
        $('#short_desc').val(data.short_desc)
        $('#process').val('update')
        $('#basicModal').modal('show');
    }

    function showAddUser() {
        $('#process').val('add');
        $('#basicModal').modal('show');
    }


    $('#addSettingForm').submit(function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append('process', $('#process').val());
        var postURL = `${url}/admin/settings/add`;

        if($('#process').val() == 'update'){
            var settingID = $('#id').val();
            var postURL = `${url}/admin/settings/edit/${settingID}`;
        }

        axios.post(postURL, formdata).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });

    function deleteSetting(id) {
        if (confirm('Are you sure?')) {
            axios.post(`${url}/admin/settings/delete/${id}`).then(function(response) {
                // handle success
                show_Toaster(response.data.message, response.data.type)
                if (response.data.type === 'success') {
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                }
            }).catch(function(err) {
                show_Toaster(err.response.data.message, 'error')
            })
        }
    }
    </script>
</body>

</html>