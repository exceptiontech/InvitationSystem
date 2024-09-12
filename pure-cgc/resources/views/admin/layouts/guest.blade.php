<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--
    <link rel="stylesheet"
        href="{{url('admin/plugins/global/fonts/fonts-googleapis.css')}}?family=Poppins:300,400,500,600,700" />
    <link href="{{url('admin/css/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{url('admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{url('admin/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('admin/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('admin/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('admin/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    --}}

    <link rel="icon" type="image/png" sizes="16x16" href="{{url('admin/images/favicon.png') }}">
    <link rel="stylesheet" href="{{url('admin/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{url('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{url('admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{url('admin/css/owl.css') }}" rel="stylesheet">
    <link class="main-css" href="{{url('admin/css/style.css') }}" rel="stylesheet">


    <!--end::Layout Themes-->

</head>
<!--end::Head-->
<!--begin::Body-->




<body id="kt_body" class="login-page">
    <!--
    <div class="d-flex flex-column flex-root" >

        {{--  <div class="bg-white login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login"  style="background-color:#F7F3F3 !important;">

            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color:#F73E1D;">

  
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-image: url({{ url('admin/media/login.png')}});background-size: cover;"></div>
     
            </div>

            <div class="mx-auto overflow-hidden login-content flex-row-fluid d-flex flex-column justify-content-center position-relative p-7" >
      
                    <a  class="pt-2 text-center">
                        <img src="" class="max-h-150px" alt="" />
                    </a>

                    <div class="d-flex flex-column-fluid flex-center">

    
                    <div class="login-form login-signin" >
                            -->

                                {{ $slot }}
                                <!--
                    </div>
				
           
                </div>
 

            </div>
   
        </div>  --}}

    </div>
-->
    <script>
        var HOST_URL = "";
    </script>
    <script>
        var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
    </script>


    {{--
    <script src="{{ url('admin/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ url('admin/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{ url('admin/js/scripts.bundle.js')}}"></script>
    <script src="{{ url('admin/js/pages/custom/login/login-general.js')}}"></script>
    --}}








    <script src="https://masool.net/cgc-sys/public/admin/vendor/global/global.min.js"></script>
    <script src="https://masool.net/cgc-sys/public/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js">
    </script>
    <script src="https://masool.net/cgc-sys/public/admin/vendor/chart-js/chart.bundle.min.js"></script>
    <script src="https://masool.net/cgc-sys/public/admin/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script
        src="https://masool.net/cgc-sys/public/admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js">
    </script>

    <script src="https://masool.net/cgc-sys/public/admin/js/plugins-init/chartjs-init.js"></script>

    <script src="https://masool.net/cgc-sys/public/admin/vendor/apexchart/apexchart.js"></script>



    <script src="https://masool.net/cgc-sys/public/admin/vendor/peity/jquery.peity.min.js"></script>

    <script src="https://masool.net/cgc-sys/public/admin/js/dashboard/dashboard-1.js"></script>

    <script src="https://masool.net/cgc-sys/public/admin/js/custom.min.js"></script>
    <script src="https://masool.net/cgc-sys/public/admin/js/deznav-init.js"></script>
    <script src="https://masool.net/cgc-sys/public/admin/js/owl.js"></script>
    <script src="https://masool.net/cgc-sys/public/admin/js/demo.js"></script>




</body>

</html>