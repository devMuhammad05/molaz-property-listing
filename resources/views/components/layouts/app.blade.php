<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets')}}/" data-template="vertical-menu-template-starter"
    data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Migra | Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/img/favicon/favicon.ico") }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset("assets/vendor/fonts/tabler-icons.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendor/fonts/fontawesome.css") }}" />
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> -->

    <!-- Core CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset("assets/css/demo.css") }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendor/libs/dropzone/dropzone.css") }}" />



    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

    <!-- Form Validation -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />


    <!-- Helpers -->
    <script src="{{ asset("assets/vendor/js/helpers.js") }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset("assets/vendor/js/template-customizer.js") }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset("assets/js/config.js") }}"></script>


    @livewireStyles

</head>

<style>
    .dropzone {
        border: 2px dashed #08080806;
        padding: 40px;
        text-align: center;
        border-radius: 10px;
        /* background-color: #ffff; */
        color: #0000;
        cursor: pointer;
        transition: border 0.3s;
    }

    .dropzone.dragover {
        border-color: #0d6efd;
    }

    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .preview-container img {
        max-width: 120px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
</style>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('admin.products.index') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                    fill="#7367F0" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                    fill="#161616" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                    fill="#161616" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                    fill="#7367F0" />
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold">Migra</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Page -->

                    {{-- <li @class([ 'menu-item' , 'active'=> request()->routeIs('admin.listings.*'),
                        ])>
                        <a href="{{ route('admin.listings.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-app-window"></i>
                            <div data-i18n="Page 2">Listings</div>
                        </a>
                    </li> --}}

                    <li @class([
                        'menu-item',
                        'active' => request()->routeIs('admin.products.*'),
                    ])>
                        <a href="{{ route('admin.products.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-app-window"></i>
                            <div data-i18n="Page 2">Products</div>
                        </a>
                    </li>

                    <li @class([
                        'menu-item',
                        'active' => request()->routeIs('admin.categories.*'),
                    ])>
                        <a href="{{ route('admin.categories.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-app-window"></i>
                            <div data-i18n="Page 2">Categories</div>
                        </a>
                    </li>


                    <li @class([
                        'menu-item',
                        'active' => request()->routeIs('admin.brands.*'),
                    ])>
                        <a href="{{ route('admin.brands.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-app-window"></i>
                            <div data-i18n="Page 2">Brands</div>
                        </a>
                    </li>


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item dropdown-style-switcher dropdown">
                                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                    href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="ti ti-md"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                            <span class="align-middle"><i class="ti ti-sun me-3"></i>Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                            <span class="align-middle"><i class="ti ti-moon-stars me-3"></i>Dark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                            <span class="align-middle"><i
                                                    class="ti ti-device-desktop-analytics me-3"></i>System</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">

                                        <div class="avatar d-flex justify-content-center align-items-center bg-light shadow rounded-circle"
                                            style="width: 40px; height: 40px; cursor: pointer; text-decoration: none;"
                                            title="View Profile">
                                            <i class="fas fa-user text-primary" style="font-size: 24px;"></i>
                                        </div>

                                    </div>

                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item mt-0" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <div class="avatar d-flex justify-content-center align-items-center bg-light shadow rounded-circle"
                                                            style="width: 40px; height: 40px; cursor: pointer; text-decoration: none;"
                                                            title="View Profile">
                                                            <i class="fas fa-user text-primary"
                                                                style="font-size: 24px;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1 mx-n2"></div>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My
                                                Profile</span>
                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti ti-settings me-3 ti-md"></i><span
                                                class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 ti ti-file-dollar me-3 ti-md"></i>
                                                <span class="flex-grow-1 align-middle">Billing</span>
                                                <span
                                                    class="flex-shrink-0 badge bg-danger d-flex align-items-center justify-content-center">4</span>
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <div class="dropdown-divider my-1 mx-n2"></div>
                                    </li>
                                    <li>
                                        <div class="d-grid px-2 pt-2 pb-1">

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="btn btn-sm btn-danger d-flex" href="#" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    <small class="align-middle">Logout</small>
                                                    <i class="ti ti-logout ms-2 ti-14px"></i>
                                                </a>
                                            </form>

                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    {{ $slot }}

                    {{-- <div class="content-backdrop fade"></div> --}}
                </div>
                <!-- Content wrapper -->

            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->

    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset("assets/vendor/libs/jquery/jquery.js") }}"></script>
    <script src="{{ asset("assets/vendor/libs/popper/popper.js") }}"></script>
    <script src="{{ asset("assets/vendor/js/bootstrap.js") }}"></script>


    <script src="{{ asset("assets/vendor/libs/node-waves/node-waves.js") }}"></script>
    <script src="{{ asset("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
    <script src="{{ asset("assets/vendor/libs/hammer/hammer.js") }}"></script>

    <script src="{{ asset("assets/vendor/js/menu.js") }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset("assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js") }}"></script>
    <script src="{{ asset("assets/vendor/libs/select2/select2.js") }}"></script>
    <script src="{{ asset("assets/vendor/libs/dropzone/dropzone.js") }}"></script>

    <!-- Flat Picker -->
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <!-- Form Validation -->
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>


    <!-- Main JS -->
    <script src="{{ asset("assets/js/main.js") }}"></script>


    <!-- Page JS -->
    <script src="{{ asset("assets/js/forms-file-upload.js") }}"></script>


    <script>
        document.getElementById('amount').addEventListener('input', function (e) {
            const value = e.target.value;
            // Allow only numbers and at most one decimal point
            if (!/^\d*\.?\d*$/.test(value)) {
                e.target.value = value.slice(0, -1);
            }
        });
    </script>


</body>

</html>
