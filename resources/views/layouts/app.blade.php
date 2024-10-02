<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Otika - @yield('title')</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('static/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('static/assets/img/favicon.ico') }}" />
    <!-- Data table CSS Files -->
    <link rel="stylesheet" href="{{ asset('static/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('static/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Toster style CSS -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!---- Navbar ---->
            @include('layouts.includes.navbar')
            <!---- Sidebar ---->
            @include('layouts.includes.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- content -->
                        @yield('content')
                    </div>
                </section>

                <!---- Setting sidebar ---->
                @include('layouts.includes.settingbar')
            </div>

            <!---- footer ---->
            @include('layouts.includes.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('static/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('static/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('static/assets/js/page/index.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('static/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('static/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('static/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('static/assets/js/page/datatables.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('static/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('static/assets/js/custom.js') }}"></script>
    <!-- Toster  JS -->
    <script src="{{ asset('js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
