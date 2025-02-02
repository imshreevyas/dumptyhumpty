<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Manage Categories</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="{{ env('APP_URL').'/storage/app/admin/fav.png' }}" />
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> Manage</h4>
                        <div class="card">
                            <div style="display: flex;">
                                <h5 class="card-header">Category Manage </h5>
                                <h5 class="card-header">
                                    <a type="button" href="{{ url('admin/category/add') }}"
                                        class="btn btn-outline-secondary btn-small text-red"
                                        title="Edit Client Details">Add New</a>
                                </h5>
                            </div>
                            <div class="table table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Edit Actions</th>
                                            <th>Update Status Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @php($i = 1)
                                        @foreach ($categories as $singledata)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                {{ $singledata->name}} </td>
                                            <td id="alert-{{ $singledata->category_uid }}">
                                                @if($singledata->status == '1')
                                                <span class="btn alert-success btn-sm">Active</span>
                                                @else
                                                <span class='btn alert-danger btn-sm'>Deactivated</span>
                                                @endif
                                        
                                            </td>
                                            <td>{{ date('D, M Y',strtotime($singledata->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-primary text-white btn-sm" href="{{ env('APP_URL').'/admin/category/edit/'.$singledata->category_uid }}"
                                                    title="Edit Client Details">Edit</a>
                                            </td>
                                            <td>
                                            <a class="btn btn-primary text-white btn-sm" onclick="deleteCategory('{{ $singledata->category_uid }}')"
                                                title="Update Category Status">Update Status</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <!-- Pagination Starts -->
                                        <!-- Pagination Ends -->
                                    </tfoot>
                                </table>
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
        $('#assetsData').html(''); //remove all add on documents
        $('#basicModal').modal('hide'); //hide the modal 
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
        $('#table_id').DataTable();
    });

    function deleteCategory(category_uid) {
        if (confirm('Are you sure?')) {
            axios.post(`${url}/admin/category/delete/${category_uid}`, {
                category_uid
            }).then(function(response) {
                // handle success
                show_Toaster(response.data.message, response.data.type)
                if (response.data.type === 'success') {
                    if(response.data.status == 'Active'){
                        document.getElementById(`alert-${category_uid}`).innerHTML = '<span class="btn alert-success btn-sm">Active</span>';
                    }
                    else if(response.data.status == 'Deactive'){
                        document.getElementById(`alert-${category_uid}`).innerHTML = '<span class="btn alert-danger btn-sm">Deactived</span>';
                    }
                }
            }).catch(function(err) {
                show_Toaster(err.response.data.message, 'error')
            })
        }
    }
    </script>
</body>

</html>