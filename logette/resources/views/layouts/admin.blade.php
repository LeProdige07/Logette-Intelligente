<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>App-Logette Intelligente</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{asset('backend/plugins/material/css/materialdesignicons.min.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/simplebar/simplebar.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('backend/plugins/nprogress/nprogress.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/daterangepicker/daterangepicker.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{asset('backend/plugins/toaster/toastr.min.css', env('REDIRECT_HTTPS'))}}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{asset('backend/css/style.css', env('REDIRECT_HTTPS'))}}" />
    <!-- FAVICON -->
    <link href="{{asset('backend/images/favicon.png', env('REDIRECT_HTTPS'))}}" rel="shortcut icon" />

    <script src="{{asset('backend/plugins/nprogress/nprogress.js', env('REDIRECT_HTTPS'))}}"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    {{-- <div id="toaster"></div> --}}

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
            @include('include_pages.sidebar')
        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">
            @include('include_pages.navbar')
            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            @yield('content')

            @include('include_pages.footer')
        </div>
    </div>
    @yield('scripts')
    <script src="{{asset('backend/plugins/jquery/jquery.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/simplebar/simplebar.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



    <script src="{{asset('backend/plugins/apexcharts/apexcharts.js', env('REDIRECT_HTTPS'))}}"></script>



    <script src="{{asset('backend/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js', env('REDIRECT_HTTPS'))}}"></script>



    <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-us-aea.js', env('REDIRECT_HTTPS'))}}"></script>



    <script src="{{asset('backend/plugins/daterangepicker/moment.min.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js', env('REDIRECT_HTTPS'))}}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



    <script src="{{asset('backend/plugins/toaster/toastr.min.js', env('REDIRECT_HTTPS'))}}"></script>



    <script src="{{asset('backend/js/mono.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/js/chart.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/js/map.js', env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset('backend/js/custom.js', env('REDIRECT_HTTPS'))}}"></script>




    <!--  -->


</body>

</html>
