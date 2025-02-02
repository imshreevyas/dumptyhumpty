<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Edit projects</title>

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
                            Edit Projects Doc</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="updateProject">
                                    <input type="hidden" id="project_id" name="id" value="{{ $project[0]['id'] }}">
                                    <!-- Upload Docs -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Projects Document</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-8">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Floor Plan</label>
                                                    <input class="form-control" type="file" id="floorPlan"
                                                        name="floorPlan" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label"><a
                                                            href="{{ env('APP_URL').$project[0]['floorPlan'] }}"
                                                            target="_blank">Uploaded
                                                            Project Banner</a></label>
                                                    <img src="{{ env('APP_URL').$project[0]['floorPlan'] }}"
                                                        class="form-control" style="height:250px;">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Project Brochure</label>
                                                    <input class="form-control" type="file" id="projectBrochure"
                                                        name="projectBrochure" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label"><a
                                                            href="{{ env('APP_URL').$project[0]['projectBrochure'] }}"
                                                            target="_blank">Uploaded
                                                            Project Banner</a></label>
                                                    <img src="{{ env('APP_URL').$project[0]['projectBrochure'] }}"
                                                        class="form-control" style="height:250px;">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Developer Logo</label>
                                                    <input class="form-control" type="file" id="developerLogo"
                                                        name="developerLogo" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label"><a
                                                            href="{{ env('APP_URL').$project[0]['developerLogo'] }}"
                                                            target="_blank">Uploaded
                                                            Project Banner</a></label>
                                                    <img src="{{ env('APP_URL').$project[0]['developerLogo'] }}"
                                                        class="form-control" style="height:250px;">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="projects_name" class="form-label">Upload
                                                        Project Banner</label>
                                                    <input class="form-control" type="file" id="projectBanner"
                                                        name="projectBanner" />
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="projects_name" class="form-label"><a
                                                            href="{{ env('APP_URL').$project[0]['projectBanner'] }}"
                                                            target="_blank">Uploaded
                                                            Project Banner</a></label>
                                                    <img src="{{ env('APP_URL').$project[0]['projectBanner'] }}"
                                                        class="form-control" style="height:250px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <button type="submit" process="add" value="{{ $project[0]['id'] }}"
                                            name="process" class="btn btn-primary">Save</button>
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
    $('#updateProject').on('submit', function(e) {
        e.preventDefault();
        var id = $('#project_id').val();
        axios.post(`${url}/admin/editProjectDoc`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}admin/editProjectDocPage/${id}`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>