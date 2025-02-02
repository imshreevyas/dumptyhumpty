<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account</title>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>
                            Account</h4>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->

                                    <div class="card-body">
                                        <form id="updateProfile">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Admin Name</label>
                                                    <input class="form-control" type="text" id="name"
                                                        name="name" value="{{ $account['name'] }}"
                                                        placeholder="Enter Admin Name" autofocus />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    @if(!empty($account['logo']))
                                                    <img src="{{ url($account['logo']) }}" alt="" srcset=""
                                                        style="height:100px;width:100px">
                                                    @endif
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="zipCode" class="form-label">Company Logo</label>
                                                    <input class="form-control" type="file" name="logo" id="logo" />
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
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
    $('#updateProfile').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/account/{{ $account['id'] }}`, new FormData(this)).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type)
            if (response.data.type === 'success') {
                setTimeout(() => {
                    window.location.href = `${url}/admin/account`;
                }, 500);
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    });
    </script>
</body>

</html>