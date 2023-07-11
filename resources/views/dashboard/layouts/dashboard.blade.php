<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/../../assets/"
  data-template="horizontal-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>{{page_title($title) ?? ''}}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('inter/img/reveil-logo-ico.png') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
	<link rel="stylesheet" href="{{asset("/assets/vendor/fonts/boxicons.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/fonts/fontawesome.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/fonts/flag-icons.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/css/rtl/core.css")}}"class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/css/rtl/theme-default.css")}}"class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset("/assets/css/demo.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/typeahead-js/typeahead.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/flatpickr/flatpickr.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/apex-charts/apex-charts.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/select2/select2.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/tagify/tagify.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/bootstrap-select/bootstrap-select.css")}}" />
    <link rel="stylesheet" href="{{asset("/assets/vendor/libs/typeahead-js/typeahead.css")}}" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/ico" href="{{ asset('inter/img/reveil-logo-ico.png') }}" />
	 <link href="{{ asset("dashboard/global_assets/css/icons/icomoon/styles.min.css") }}" rel="stylesheet" type="text/css">
	{{-- {{--<link href="{{ asset("dashboard/global_assets/css/icons/fontawesome/styles.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/bootstrap_limitless.min.css") }}" rel="stylesheet" type="text/css"> --}}
	{{-- <link href="{{ asset("dashboard/assets/css/layout.min.css") }}" rel="stylesheet" type="text/css">  --}}
	<link href="{{ asset("dashboard/assets/css/components.min.css") }}" rel="stylesheet" type="text/css">
	{{-- <link href="{{ asset("dashboard/assets/css/colors.min.css") }}" rel="stylesheet" type="text/css"> --}}
	{{-- <link href="{{ asset("dashboard/assets/css/dashboard.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("inter/css/angular-block-ui.min.css") }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets --> --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>


	<script src="{{asset("/assets/vendor/js/helpers.js")}}"></script>
    <script src="{{asset("/assets/vendor/js/template-customizer.js")}}"></script>
    <script src="{{asset("/assets/js/config.js")}}"></script>

	<!-- Core JS files -->
    <script src="{{ asset("dashboard/global_assets/js/main/jquery.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/main/bootstrap.bundle.min.js") }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
    <script src="{{ asset("dashboard/global_assets/js/plugins/tables/datatables/datatables.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/tables/datatables/extensions/fixed_header.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/tables/datatables/extensions/col_reorder.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/editors/summernote/summernote.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/uniform.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/switchery.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/selects/select2.min.js") }}"></script>

	<script src="{{ asset("dashboard/global_assets/js/plugins/visualization/d3/d3.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/visualization/d3/d3_tooltip.js") }}"></script>

	<script src="{{ asset("dashboard/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/switch.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/media/fancybox.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/notifications/jgrowl.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/notifications/noty.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/inputs/inputmask.js") }}"></script>

	<script src="{{ asset("dashboard/assets/js/app.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/gallery_library.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/form_checkboxes_radios.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/datatables_extension_fixed_header.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/editor_summernote.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/form_select2.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/uploader_bootstrap.js") }}"></script>
	{{-- <script src="{{ asset("dashboard/global_assets/js/demo_pages/widgets_stats.js") }}"></script>  --}}
	<script src="{{ asset("dashboard/global_assets/js/main/dashboard.js") }}"></script>

	<!-- /theme JS files -->

</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
	   <div class="layout-container">
		   @include('dashboard.layouts.partials._navbar')
		 <!-- Navbar -->
		 <div class="layout-page">
		   <!-- Content wrapper -->
		   <div class="content-wrapper">

		   @include('dashboard.layouts.partials._sidebar')
		   <div class="container-xxl flex-grow-1 container-p-y">
		   @yield('page_header')
		   @yield('content')


		   <div class="content-backdrop fade"></div>


		   </div>
	   <!--/ Content wrapper -->
	   </div>
    </div>
	@include('dashboard.layouts.partials._dashboard_footer')
   </div>



	<div class="layout-overlay layout-menu-toggle"></div>
	<div class="drag-target"></div>

	@include('flashy::message')
	 <script src="{{asset("/assets/vendor/libs/jquery/jquery.js")}}"></script>
	  <script src="{{asset("/assets/vendor/libs/popper/popper.js")}}"></script>
	  <script src="{{asset("/assets/vendor/js/bootstrap.js")}}"></script>
	  <script src="{{asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>
	  <script src="{{asset("/assets/vendor/libs/hammer/hammer.js")}}"></script>
	  <script src="{{asset("/assets/vendor/libs/i18n/i18n.js")}}"></script>
	  <script src="{{asset("/assets/vendor/libs/typeahead-js/typeahead.js")}}"></script>
	  <script src="{{asset("/assets/vendor/js/menu.js")}}"></script>
	  <script src="{{asset("/assets/vendor/libs/apex-charts/apexcharts.js")}}"></script>
	  <script src="{{asset("/assets/js/main.js")}}"></script>
	  @yield('script')
	  <script src="{{asset("/assets/js/dashboards-analytics.js")}}"></script>
	  <script src="{{ asset('inter/js/angularjs/core/angular.min.js') }}"></script>
	<script src="{{ asset('inter/js/angularjs/plugins/angular-uuid.js') }}"></script>
	<script src="{{ asset('inter/js/angularjs/config/config.js') }}"></script>
	<script src="{{ asset('inter/js/angularjs/ApprovisionnementController.js') }}"></script>
	<script src="{{ asset('inter/js/angularjs/ProjetController.js') }}"></script>
	<script src="{{ asset('inter/js/angularjs/VenteController.js') }}"></script>
	<script src="{{ asset('inter/js/angularjs/EtatPtbaController.js') }}"></script>
    <script src="{{asset("/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js")}}"></script>
    <script src="{{asset("/assets/vendor/libs/moment/moment.js")}}"></script>
    <script src="{{asset("/assets/vendor/libs/flatpickr/flatpickr.js")}}"></script>
    <script src="{{asset("/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js")}}"></script>
    <script src="{{asset("/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js")}}"></script>
    <script src="{{asset("/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js")}}"></script>
    <script src="{{asset("/assets/js/tables-datatables-basic.js")}}"></script>
	</body>
  </html>
