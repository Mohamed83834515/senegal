<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{page_title($title) ?? ''}}</title>

	<link rel="shortcut icon" type="image/ico" href="{{ asset('inter/img/reveil-logo-ico.png') }}" />

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/global_assets/css/icons/icomoon/styles.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/bootstrap_limitless.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/layout.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/components.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/colors.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("dashboard/assets/css/dashboard.css") }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset("dashboard/global_assets/js/main/jquery.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/main/bootstrap.bundle.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/loaders/blockui.min.js") }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
    @yield("theme_js_before")
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/uniform.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/switchery.min.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/plugins/forms/styling/switch.min.js") }}"></script>
	<script src="{{ asset("dashboard/assets/js/app.js") }}"></script>
	<script src="{{ asset("dashboard/global_assets/js/demo_pages/form_checkboxes_radios.js") }}"></script>

    @yield("theme_js_after")
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

                @yield("content")

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
