<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Add Faqs</title>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Faqs /</span>
                            Add Faq</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="addFaq">
                                    @csrf

                                    <div class="card mb-4">
                                        <h5 class="card-header">Faq Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="question" class="form-label">Faq Question</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="question" name="question" value=""
                                                    placeholder="Enter Faq Question"></textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="answer" class="form-label">Faq Answer</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="answer" name="answer" value=""
                                                        placeholder="Enter Faq Answer"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                id="submitBtn">Add Faq</button>
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

    $('#addFaq').on('submit', function(e) {
        e.preventDefault();
        $('#submitBtn').text('Please Wait...');
        axios.post(`${url}/admin/faq/add`, new FormData(this)).then(function(response) {
            // handle success

            $('#submitBtn').text('Add Faq');
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/faq/add`;
                }, 500);
            }
        }).catch(function(err) {
            $('#submitBtn').text('Add Faq');
            show_Toaster(err.response.data.message, 'error')
        })
    });

    </script>
</body>

</html>