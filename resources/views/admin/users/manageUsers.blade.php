<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Manage Faqs</title>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Faqs /</span> Manage</h4>
                        <div class="card">
                            <div style="display: flex;">
                                <h5 class="card-header">Manage Faqs</h5>
                                <h5 class="card-header">
                                    <a type="button" href="{{ url('admin/faq/add') }}"
                                        class="btn btn-outline-secondary btn-small text-red"
                                        title="Edit Client Details">Add
                                        New</a>
                                </h5>
                            </div>
                            <div class="table  table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th class="py-3 px-1">Sr No.</th>
                                            <th class="py-3 px-1">Faqs Question</th>
                                            <th class="py-3 px-1">Faqs Answer</th>
                                            <th class="py-3 px-1">Status</th>
                                            <th class="py-3 px-1">Created at</th>
                                            <th class="py-3 px-1">Edit Actions</th>
                                            <th class="py-3 px-1">Update Status Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @php($i = 1)
                                        @foreach ($data as $singledata)
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td class="py-3 px-2"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                {{ $singledata->question }} </td>
                                            <td class="py-3 px-2"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                {{ $singledata->answer }} </td>
                                            <td class="py-3 px-2" id="alert-{{ $singledata['faq_uid'] }}">
                                                @if($singledata->status == '1')
                                                <span class="btn alert-success btn-sm">Active</span>
                                                @else
                                                <span class='btn alert-danger btn-sm'>Deactivated</span>
                                                @endif
                                        
                                            </td>
                                            <td class="py-3 px-2">{{ date('D, M Y',strtotime($singledata->created_at)) }}</td>
                                            <td class="py-3 px-2">
                                                <a class="btn btn-primary text-white btn-sm" href="{{ env('APP_URL').'/admin/faq/edit/'.$singledata['faq_uid'] }}"
                                                    title="Edit Faq Details">Edit</a>
                                            </td>
                                            <td class="py-3 px-2">
                                            <a class="btn btn-primary text-white btn-xs" onclick="deleteFaq('{{ $singledata['faq_uid'] }}');"
                                                title="Delete Faq Data">Update Status</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="card-footer">
                                <!-- Pagination Starts -->
                                {{ $data->links() }}
                                <!-- Pagination Ends -->
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
    function closeModal(id) {
        $('.assetsData').html(''); //remove all add on documents
        $(`#${id}`).modal('hide'); //hide the modal 
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
            info: false,
            paging: false,
        });
    });

    // Get Assets
    async function UpdateImageModal(column, faq_uid) {

        // Call Ajax and populate Data
        await axios.get(`${url}/admin/Faqs/assets/get/${column}/${faq_uid}`).then(function(response) {
            // handle success
            $('#assetsData').html(response.data.html);
            if (response.data.type === 'error') {
                show_Toaster(response.data.message, response.data.type)
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })

        $('.faq_uid').val(faq_uid)
        $('.update_type').val(column)
        $('.addNewAssetsID').val(faq_uid)
        $('#preview_assets').attr('src','')

        $('#basicModal').modal('show');
    }

    function showAddUser() {
        $('#process').val('add');
        $('#basicModal').modal('show');
    }

    // Add New Assets
    $('#addNewAssets').submit(function(e) {
        e.preventDefault();
        $('.update_type').text('Please Wait...');
        var formdata = new FormData(this);
        formdata.append('update_type', $('.update_type').val()); 
        axios.post(`${url}/admin/Faqs/addAssets`, formdata).then(function(response) {
            // handle success
            $("#addNewAssets")[0].reset();
            $('.update_type').text('Upload Image');
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                UpdateImageModal($('.update_type').val(), $('#faq_uid').val())
            }
        }).catch(function(err) {
            $('.update_type').text('Upload Image');
            show_Toaster(err.response.data.message, 'error')
        })
    });

    function deleteFaq(faq_uid) {
        if (confirm('Are you sure?')) {
            axios.post(`${url}/admin/Faqs/delete/${faq_uid}`, {
                faq_uid
            }).then(function(response) {
                // handle success
                show_Toaster(response.data.message, response.data.type)
                if (response.data.type === 'success') {
                    if(response.data.status == 'Active'){
                        document.getElementById(`alert-${faq_uid}`).innerHTML = '<span class="btn alert-success btn-sm">Active</span>';
                    }
                    else if(response.data.status == 'Deactive'){
                        document.getElementById(`alert-${faq_uid}`).innerHTML = '<span class="btn alert-danger btn-sm">Deactived</span>';
                    }
                }
            }).catch(function(err) {
                show_Toaster(err.response.data.message, 'error')
            })
        }
    }

    function previewFile(inputElement, previewElementId) {
        const file = inputElement.files[0]; // Get the selected file
        const previewElement = document.getElementById(previewElementId);

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Set preview for images
                if (file.type.startsWith("image/")) {
                    previewElement.src = e.target.result;
                } else {
                    alert("Only image files can be previewed!");
                }
            };
            reader.readAsDataURL(file); // Convert to base64
        }
    }

    </script>
</body>

</html>