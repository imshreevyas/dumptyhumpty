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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Commercial Property /</span>
                            Edit Property</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <form id="editCategory">
                                        <div class="card mb-4">
                                            <h5 class="card-header">Category Details</h5>
                                            <!-- Account -->

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-4">
                                                        <label for="name" class="form-label">Category Name</label>
                                                        <input class="form-control" type="text" id="name"
                                                            name="name" value="{{ $category_data['name'] }}"
                                                            placeholder="Enter Catgeory Name" />
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card mb-4">
                                            <h5 class="card-header">Other Details</h5>
                                            <!-- Account -->

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <input class="form-control" type="text" id="short_desc" name="short_desc"
                                                            value="{{ $category_data['short_desc'] }}" placeholder="Enter Short Description" />
                                                    </div>

                                                    <div class="mb-3 col-md-12">
                                                        <textarea style="height:150px" class="form-control" type="text"
                                                            id="long_desc" name="long_desc" value="{{ $category_data['long_desc'] }}"
                                                            placeholder="Enter Long Description">{{ $category_data['long_desc'] }}</textarea>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <button class="btn btn-primary btn-lg" type="submit"
                                                    name="submitBtn" id="submitBtn">Edit Catgeory</button>
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
    


    $('#editCategory').on('submit', function(e) {
        e.preventDefault();
        var btn_old_text = $('#submitBtn').text();
        $('#submitBtn').text('Please Wait...');
        axios.post(`${url}/admin/category/edit/{{ $category_data['category_uid'] }}`, new FormData(this)).then(function(response) {
            // handle success
            $('#submitBtn').text(btn_old_text);
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/category/all`;
                }, 500);
            }
        }).catch(function(err) {
            $('#submitBtn').text(btn_old_text);
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>