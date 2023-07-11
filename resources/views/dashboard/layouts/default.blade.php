<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{$title}}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('inter/img/reveil-logo-ico.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset("/assets/vendor/fonts/boxicons.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/fonts/fontawesome.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/fonts/flag-icons.css")}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset("/assets/vendor/css/rtl/core.css")}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/css/rtl/theme-default.css")}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset("/assets/css/demo.css")}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/typeahead-js/typeahead.css")}}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css")}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset("/assets/vendor/css/pages/page-auth.css")}}" />
    <!-- Helpers -->
    <script src="{{asset("/assets/vendor/js/helpers.js")}}"></script>

   <script src="{{asset("/assets/vendor/js/template-customizer.js")}}"></script>
    <script src="{{asset("/assets/js/config.js")}}"></script>

	{{-- <link rel="shortcut icon" type="image/ico" href="{{ asset('inter/img/ruche.png') }}" />

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/global_assets/css/icons/icomoon/styles.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/bootstrap_limitless.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/layout.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/components.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/colors.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/dashboard.css") }}" rel="stylesheet" type="text/css"> --}}
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	{{-- <script src="{{ asset("dashboard/global_assets/js/main/jquery.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/main/bootstrap.bundle.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/loaders/blockui.min.js") }}"></script>
	<!-- /core JS files --> --}}

	<!-- Theme JS files -->
    @yield("theme_js_before")
	{{-- <script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/uniform.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/switchery.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/switch.min.js") }}"></script>
	<script src="{{ asset("dashboard/assets/js/app.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/form_checkboxes_radios.js") }}"></script> --}}

    @yield("theme_js_after")
	<!-- /theme JS files -->

</head>

<body >
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
        @include('dashboard.layouts.partials._default_navbar')

        @yield('content')


        @include('dashboard.layouts.partials._dashboard_footer')
        </div>

	<!-- /page content -->

	<script src="{{asset("/assets/vendor/libs/jquery/jquery.js")}}"></script>
	<script src="{{asset("/assets/vendor/libs/popper/popper.js")}}"></script>
	<script src="{{asset("/assets/vendor/js/bootstrap.js")}}"></script>
	<script src="{{asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>

	<script src="{{asset("/assets/vendor/libs/hammer/hammer.js")}}"></script>
	<script src="{{asset("/assets/vendor/libs/i18n/i18n.js")}}"></script>
	<script src="{{asset("/assets/vendor/libs/typeahead-js/typeahead.js")}}"></script>

	<script src="{{asset("/assets/vendor/js/menu.js")}}"></script>
	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="{{asset("/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js")}}"></script>
	<script src="{{asset("/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js")}}"></script>
	<script src="{{asset("/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js")}}"></script>

	<!-- Main JS -->
	<script src="{{asset("/assets/js/main.js")}}"></script>

	<!-- Page JS -->
	<script src="{{asset("/assets/js/pages-auth.js")}}"></script>
  </body>
</html>
