
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8" />
    <title>BNB Trading</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/pages/login/classic/login-2.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/base/light.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/menu/light.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/brand/dark.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/aside/dark.css?v=7.2.9" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico" />
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1070954,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
            <!--begin: Aside Container-->
            <div class="d-flex flex-row-fluid flex-column justify-content-between">
                <!--begin::Aside body-->
                <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                    <a href="#" class="mb-15 text-center">
                        <img height="80" class="logo" src="{{ asset('images/bnb_logo_1.png') }}" alt="">
                    </a>
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <div class="text-center mb-10 mb-lg-20">
                            <h2 class="font-weight-bold">Sign In</h2>
                            <p class="text-muted font-weight-bold">Enter your username and password</p>
                        </div>
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('customLogin') }}">
                            @csrf

                            <div class="form-group py-3 m-0">
                                <input class="form-control @error('email') is-invalid @enderror h-auto border-0 px-0 placeholder-dark-75" type="Email" placeholder="Email"  name="email" value="{{ old('email') }}"  autocomplete="email" autofocus/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group py-3 border-top m-0">
                                <input class="form-control @error('password') is-invalid @enderror h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" required autocomplete="current-password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline m-0 text-muted">
                                        <input type="checkbox" name="remember" />
                                        <span></span>Remember me</label>
                                </div>
                                <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Forgot Password ?</a>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                                <div class="my-3 mr-2">
                                    <span class="text-muted mr-2">Don't have an account?</span>
                                    <a href="{{route('register')}}" id="kt_login_signup" class="font-weight-bold">Signup</a>
                                </div>
                                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->

                </div>
                <!--end::Aside body-->
                <!--end: Aside footer for desktop-->
            </div>
            <!--end: Aside Container-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        @php
            $settings = \App\Models\Setting::orderBy('id', 'DESC')->take(8)->get();
        @endphp

        <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/bg/bg-4.jpg);">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-lg-center">
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="display-3 font-weight-bold my-7 text-white">Welcome to BNB Trading!</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="background-color:white">
                            {{--                        <table style="overflow: hidden;"  class="table table-head-custom table-vertical-center table-head-bg table-borderless">--}}
                            <thead>
                            <tr class="text-left">
                                <th data-toggle="tooltip" data-html="true" title="<em>The amount of trade for the entry.</em>"><u>Pair</th></u></th>

                                <th data-toggle="tooltip" data-html="true" title="<em>The amount of trade for the entry.</em>"><u>QTY</u></th>

                                <th data-toggle="tooltip" data-html="true" title="<em>-DEFAULT-<br> 1 Day DF=1000<br> 12 Hours DF=500 <br> 8 Hours=300 <br> 6 Hours=200<br> 4 Hours=140<br>2 Hours=80<br> 1 Hour=40<br> 30 Minutes=24<br> 15 Minutes=16<br>5 Minutes=12<br>3 Minutes=10 </em>"><u>Delta Time</u></th>

                                <th data-toggle="tooltip" data-html="true" title="<em>This column will show if you have Error on your Delta Time column.</em>"><u>Error</u></th>

                                <th class="text-center" data-toggle="tooltip" data-html="true" title="<em>Order Type of Entry.<br><br><b>Market Order</b> will create your position on realtime based on selected time frame.<br><br><b>Test Order</b> will only record to your Order Entry page and show Win/Lose entries.</em>"><u>Order Type</u></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)

                                    <tr>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->pair }} {{ $setting->timeframe }}</span>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input  setting_id="{{ $setting->id }}" name="qty" class="quantity form-control form-control-sm" value="{{ $setting->qty }}" size="1"></span>
                                        </td>

                                        <input type="hidden" name="setting_volume" class="setting_volume" value="{{ $setting->id }}">

                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_deltaSMA="{{ $setting->id }}" name="deltaSMA" class="deltatimeSMA form-control form-control-sm" value="{{ $setting->deltaSMA }}" size="1"></span>
                                        </td>

                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg error_log">{{ $setting->Error }}</span>
                                        </td>

                                        <td class="pr-0" >
                                            <input
                                                id="checkbox{{$setting->id}}"
                                                class="bootstrap_switch" type="checkbox"
                                                seeting_orderType="{{ $setting->id }}"
                                                name="switch_{{$setting->id}}" {{ $setting->order_type != "TEST"?'checked':'' }}
                                                data-on-text="MARKET" data-handle-width="60" data-off-text="TEST"
                                                data-on-color="primary"
                                            >


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--                    <p class="font-weight-bold font-size-lg text-white opacity-80">The ultimate Bootstrap, Angular 8, React &amp; VueJS admin theme--}}
                    {{--                        <br />framework for next generation web apps.</p>--}}
                </div>
            </div>
            <!--end::Content body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
// Class definition

        $('#checkbox16').change(function () {
            alert($(this).attr('user_id'))
        });

        var KTBootstrapSwitch = function () {

            // Private functions
            var demos = function () {
                // minimum setup
                $('.bootstrap_switch').bootstrapSwitch({
                    onSwitchChange: function (event, state) {

                    }
                });
            };

            return {
                // public functions
                init: function () {
                    demos();
                },
            };
        }();

        jQuery(document).ready(function () {
            KTBootstrapSwitch.init();
        });


    });


    // var datatable = $('#kt_datatable').DataTable();
</script>
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.js?v=7.2.9"></script>
<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9"></script>
<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/js/scripts.bundle.js?v=7.2.9"></script>
<!--begin::Page Vendors(used by this page)-->
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.2.9"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/js/pages/widgets.js?v=7.2.9"></script>


<!--end::Page Scripts-->

</body>
<!--end::Body-->
</html>
