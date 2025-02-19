<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Edit Program</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Programs /</span>
                            Edit Program</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="editProgram">
                                    @csrf
                                    <div class="card mb-4">
                                        <h5 class="card-header">Program Basic Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="name" class="form-label">Program Name</label>
                                                    <input class="form-control" type="text" id="name"
                                                        name="name" value="{{ $data->name }}"
                                                        placeholder="Enter Program Name" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="age_group" class="form-label">Age Group</label>
                                                    <input class="form-control" type="text" id="age_group"
                                                        name="age_group" value="{{ $data->age_group }}" placeholder="Enter Age Group" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="duration_for_week" class="form-label">Duration for Week</label>
                                                    <input class="form-control" type="text" id="duration_for_week"
                                                        name="duration_for_week" value="{{ $data->duration_for_week }}"
                                                        placeholder="Enter Duration for Week" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="duration" class="form-label">Program Duration</label>
                                                    <input class="form-control" type="text" id="duration"
                                                        name="duration" value="{{ $data->duration }}"
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
                                                    name="title" value="{{ $data->title }}"
                                                    placeholder="Enter Page Title"  oninput="validate_max_length(this, 60)"/>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12">
                                                    <label for="title" class="form-label">Program Slug</label>
                                                    <input class="form-control" type="text" id="slug"
                                                    name="slug" value="{{ $data->slug }}" 
                                                    placeholder="Enter Page Title" oninput="validate_max_length(this, 60)" readonly/>
                                                </div>
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="short_description" class="form-label">Program Short Description</label>
                                                    <textarea style="height:80px" class="form-control" type="text"
                                                    id="short_description" name="short_description" value="{{ $data->short_description }}"
                                                    placeholder="Enter Program Short Description">{{ $data->short_description }}</textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="long_description" class="form-label">Program Long Description</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="long_description" name="long_description" value="{{ $data->long_description }}"
                                                    placeholder="Enter Program Long Description">{{ $data->long_description }}</textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="learning_areas" class="form-label">Program Learning Areas </label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="learning_areas" name="learning_areas" value="{{ $data->learning_areas }}"
                                                    placeholder="Enter Program Learning Areas">{{ $data->learning_areas }}</textarea>
                                                </div>
                                                
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="activities" class="form-label">Program Activities</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="activities" name="activities" value="{{ $data->activities }}"
                                                        placeholder="Enter Program Activities">{{ $data->activities }}</textarea>
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
                                                    name="seo_title" value="{{ $data->seo_title }}"
                                                    placeholder="Enter Page Title" oninput="validate_max_length(this, 60)"/>
                                                </div>
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="seo_description" class="form-label">Program SEO Description <span style="color:red">(Only 160 Characters)</span></label>
                                                    <textarea style="height:80px" class="form-control" type="text"
                                                    id="seo_description" name="seo_description" value="{{ $data->seo_description }}"
                                                    placeholder="Enter Program Short Description" oninput="validate_max_length(this, 160)">{{ $data->seo_description }}</textarea>
                                                </div>

                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="seo_keywords" class="form-label">Program SEO Keywords</label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="seo_keywords" name="seo_keywords" value="{{ $data->seo_keywords }}"
                                                    placeholder="Enter Program SEO Keywords">{{ $data->seo_keywords }}</textarea>
                                                </div>

                                                <div class="mb-3 col-md-12" id="editor">
                                                    <label for="schemas" class="form-label">Program Schemas <span style="color:red">(Create Schema and paste JSON here)</span></label>
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                    id="schemas" name="schemas" value="{{ $data->schema }}"
                                                    placeholder="Enter Program Schemas">{{ $data->schema }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                name="submitBtn" id="submitBtn">Edit Program</button>
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


    function validate_max_length(inputElement, maxLength) {
        if (inputElement.value.length > maxLength) {
            inputElement.value = inputElement.value.substring(0, maxLength); // Truncate excess characters
            show_Toaster('It is officially Recommended only '+maxLength+' Characters', 'error')
        }
    }

    $('#editProgram').on('submit', function(e) {
        e.preventDefault();
        $('#submitBtn').text('Please Wait...');
        axios.post(`${url}/admin/program/edit/{{ $data['program_uid'] }}`, new FormData(this)).then(function(response) {
            // handle success
            $('#submitBtn').text('Edit Program');
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/program/all`;
                }, 500);
            }
        }).catch(function(err) {
            $('#submitBtn').text('Edit Program');
            show_Toaster(err.response.data.message, 'error')
        })
    });

    document.getElementById('title').addEventListener('input', function () {
        let title = this.value;
        let slug = title
            .toLowerCase() // Convert to lowercase
            .trim() // Remove leading/trailing spaces
            .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/-+/g, '-'); // Remove multiple hyphens

        document.getElementById('slug').value = slug;
    });
    </script>
</body>

</html>