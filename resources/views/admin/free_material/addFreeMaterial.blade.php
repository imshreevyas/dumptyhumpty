<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Add Free Materials</title>

    <meta name="description" content="" />
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
    <!-- Icons. Uncomment required icon fonts -->
    @include('admin.include.header')
    <style>
        .ck-content{
            height:150px;
        }
    </style>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Free Materials /</span>
                            Add Free Material</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="addFreeMaterial">
                                    @csrf

                                    <div class="card mb-4">
                                        <h5 class="card-header">Free Materials Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">                                                
                                                <div class="mb-3 col-md-6" id="editor">
                                                    <label for="file_og_name" class="form-label">File Name</label>
                                                    <input type="text" class="form-control"
                                                    id="file_og_name" name="file_og_name" value=""
                                                    placeholder="Enter file Name">
                                                </div>

                                                <div class="mb-3 col-md-6" id="editor">
                                                    <label for="file_og_name" class="form-label">Select Age Group</label>
                                                    <select name="age_group" class="form-control" id="age_group">
                                                        <option value="0-2">0-2</option>
                                                        <option value="3-4">3-4</option>
                                                        <option value="5-6">5-6</option>
                                                        <option value="7-12">7-12</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="answer" class="form-label">Select File</label>
                                                    <input class="form-control" type="file" id="file" name="file" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                id="submitBtn">Add Free Material</button>
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
    

    // CK editor for Activities
    ClassicEditor
    .create( document.querySelector('#answer') )
    .catch( error => {
        console.error( error );
    } );

    $('#addFreeMaterial').on('submit', function(e) {
        e.preventDefault();
        $('#submitBtn').text('Please Wait...');
        axios.post(`${url}/admin/free-material/add`, new FormData(this)).then(function(response) {
            // handle success

            $('#submitBtn').text('Add Free Material');
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/free-material/add`;
                }, 500);
            }
        }).catch(function(err) {
            $('#submitBtn').text('Add Free Material');
            show_Toaster(err.response.data.message, 'error')
        })
    });

    </script>
</body>

</html>