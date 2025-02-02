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
                            Add Product</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="addProduct">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Product Details</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="product_name" class="form-label">Select Category</label>
                                                    <select name="category_uid" class="form-control">
                                                        @if(count($categories) > 0)
                                                            @foreach($categories as $category)
                                                            <option value="{{ $category['category_uid'] }}">{{ $category['name'] }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label for="product_name" class="form-label">Product Name</label>
                                                    <input class="form-control" type="text" id="product_name"
                                                        name="product_name" value=""
                                                        placeholder="Enter Product Name" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">Product Description</h5>
                                        <!-- Account -->

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12" id="editor">
                                                    <textarea style="height:150px" class="form-control" type="text"
                                                        id="long_desc" name="long_desc" value=""
                                                        placeholder="Enter Product Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Images -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Product Image</h5>
                                        <div class="card-body doc-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="product_name" class="form-label">Select All Images</label>
                                                    <input class="form-control" type="file" id="product_assets[]"
                                                        name="product_assets[]" multiple />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Upload Specifications -->
                                    <div class="card mb-4">
                                        <h5 class="card-header">Products Specification PDF</h5>
                                        <!-- Account -->

                                        <div class="card-body doc-div">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <label for="product_name" class="form-label">Select All Images</label>
                                                    <input class="form-control" type="file" id="product_specification_assets[]"
                                                        name="product_specification_assets[]" multiple />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                name="submitBtn">Add Product</button>
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
    .create( document.querySelector( '#long_desc' ) )
    .catch( error => {
        console.error( error );
    } );

    $('#addProduct').on('submit', function(e) {
        e.preventDefault();
        axios.post(`${url}/admin/product/add`, new FormData(this)).then(function(response) {
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
    </script>
</body>

</html>