<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url("/dashboard")}}" class="app-brand-link">
            <img src="{{ !empty(Auth::guard('admin')->user()->logo) ? env('APP_URL').'/'.Auth::guard('admin')->user()->logo : '' }}"
                style="height: 38px;width: 150px;">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{request()->segment(1)=='dashboard'?'active':'' }}">
            <a href="{{url('/admin/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{request()->segment(1)=='account'?'active':''}}">
            <a href="{{url('/admin/account')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Account</div>
            </a>
        </li>

        <li class="menu-item {{ $page_type == 'categoryAll' || $page_type == 'categoryAdd' || $page_type == 'categoryEdit' ?'open':'' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div data-i18n="Layouts">Category</div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ $page_type == 'categoryAll' ? 'active':''}}">
                    <a href="{{url('/admin/category/all')}}" class="menu-link">
                        <div data-i18n="Without menu">All Categories</div>
                    </a>
                </li>

                <li class="menu-item {{ $page_type == 'categoryAdd' ? 'active':''}}">
                    <a href="{{url('/admin/category/add')}}" class="menu-link">
                        <div data-i18n="Without navbar">Add new Category</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ $page_type == 'productAll' || $page_type == 'productAdd' || $page_type == 'productEdit' || $page_type == 'productsEnquiryAll' ? 'open':'' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div data-i18n="Layouts">Products</div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ $page_type == 'productsEnquiryAll' ? 'active':''}}">
                    <a href="{{url('/admin/product/enquiries')}}" class="menu-link">
                        <div data-i18n="Without menu">All Products Enquiries</div>
                    </a>
                </li>

                <li class="menu-item {{ $page_type == 'productAll' ? 'active':''}}">
                    <a href="{{url('/admin/product/all')}}" class="menu-link">
                        <div data-i18n="Without menu">All Products</div>
                    </a>
                </li>

                <li class="menu-item {{ $page_type == 'productAdd'?'active':''}}">
                    <a href="{{url('/admin/product/add')}}" class="menu-link">
                        <div data-i18n="Without navbar">Add new Product</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ $page_type == 'allGeneralSettings' ?'open':'' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div data-i18n="Layouts">General Settings</div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ $page_type == 'AllSettings' ? 'active':''}}">
                    <a href="{{url('/admin/settings/all')}}" class="menu-link">
                        <div data-i18n="Without menu">All General Settings</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{url('/admin/logout')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-exit"></i>
                <div data-i18n="Analytics">Logout</div>
            </a>
        </li>
    </ul>
</aside>