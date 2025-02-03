<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Add Products</title>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span>
                            Add Program</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="addProgram">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Program Basic Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">

                                                <div class="mb-3 col-md-4">
                                                    <label for="program_name" class="form-label">Program Name</label>
                                                    <input class="form-control" type="text" id="name"
                                                        name="name" value="" placeholder="Enter Program Name" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="age_group" class="form-label">Age Group</label>
                                                    <input class="form-control" type="text" id="age_group"
                                                        name="age_group" value="" placeholder="Enter Age Group" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="duration_for_week" class="form-label">Duration for Week</label>
                                                    <input class="form-control" type="text" id="duration_for_week"
                                                        name="duration_for_week" value=""
                                                        placeholder="Enter Duration for Week" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="duration" class="form-label">Program Duration</label>
                                                    <input class="form-control" type="text" id="duration"
                                                        name="duration" value=""
                                                        placeholder="Enter Program Duration" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Program Page Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title" class="form-label">Program Title</label>
                                                    <input class="form-control" type="text" id="title"
                                                    name="title" value=""
                                                    placeholder="Enter Page Title" />
                                                </div>
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="short_description" class="form-label">Program Short Description</label>
                                                    <textarea style="height:80px" class="form-control" type="text"
                                                    id="short_description" name="short_description" value=""
                                                    placeholder="Enter Program Short Description"></textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="long_description" class="form-label">Program Long Description</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="long_description" name="long_description" value=""
                                                    placeholder="Enter Program Long Description"></textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="learning_areas" class="form-label">Program Learning Areas </label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="learning_areas" name="learning_areas" value=""
                                                    placeholder="Enter Program Learning Areas"></textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="activities" class="form-label">Program Activities</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="activities" name="activities" value=""
                                                        placeholder="Enter Program Activities"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Program SEO Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title" class="form-label">SEO Title <span style="color:red">(Only 60 Characters)</span></label>
                                                    <input class="form-control" type="text" id="seo_title"
                                                    name="seo_title" value=""
                                                    placeholder="Enter Page Title" oninput="validate_max_length(this, 60)"/>
                                                </div>
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="seo_description" class="form-label">Program SEO Description <span style="color:red">(Only 160 Characters)</span></label>
                                                    <textarea style="height:80px" class="form-control" type="text"
                                                    id="seo_description" name="seo_description" value=""
                                                    placeholder="Enter Program Short Description" oninput="validate_max_length(this, 160)"></textarea>
                                                </div>

                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="seo_keywords" class="form-label">Program SEO Keywords</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="seo_keywords" name="seo_keywords" value=""
                                                    placeholder="Enter Program SEO Keywords"></textarea>
                                                </div>

                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="schemas" class="form-label">Program Schemas <span style="color:red">(Create Schema and paste JSON here)</span></label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="schemas" name="schemas" value=""
                                                    placeholder="Enter Program Schemas"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Images -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Program Banner</h5>
                                        <div class="card-body doc-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="banner" class="form-label">Select Banner</label>
                                                    <input class="form-control" type="file" id="banner"
                                                        name="banner" onchange="previewFile(this, 'preview_banner')"/>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <img id="preview_banner" style="width: 285px; height: 200px; margin-top: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                name="submitBtn">Add Program</button>
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
    
    ClassicEditor
    .create(document.querySelector('#long_description') )
    .catch(error => {
        console.error( error );
    });

    // CK editor for Activities
    ClassicEditor
    .create( document.querySelector('#activities') )
    .catch( error => {
        console.error( error );
    } );

    // CK editor for Learning Areas
    ClassicEditor
    .create( document.querySelector('#learning_areas') )
    .catch( error => {
        console.error( error );
    } );

    $('#addProgram').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/program/add`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/commercial/add`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });

    function validate_max_length(inputElement, maxLength) {
        if (inputElement.value.length > maxLength) {
            inputElement.value = inputElement.value.substring(0, maxLength); // Truncate excess characters
            show_Toaster('It is officially Recommended only '+maxLength+' Characters', 'error')
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