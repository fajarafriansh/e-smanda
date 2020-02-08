<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ $page_title ?? 'e-Smanda' }}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset ('img/favicon.png') }}">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/owl.carousel.min.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/magnific-popup.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/themify-icons.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/nice-select.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/flaticon.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/gijgo.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/animate.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/slicknav.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/style.css' ) }}">
	<!-- <link rel="stylesheet" href="{{ asset ('css/responsive.css' ) }}"> -->
</head>

<body>
	<!-- header-start -->
	@include('layouts.header')
	<!-- header-end -->

	@yield('content')

	<!-- footer -->
	@include('layouts.footer')
	<!-- footer -->

	<!-- form itself end-->
	<form id="test-form" class="white-popup-block mfp-hide">
		<div class="popup_box ">
			<div class="popup_inner">
				<div class="logo text-center">
					<a href="#">
						<img src="img/form-logo.png" alt="">
					</a>
				</div>
				<h3>Sign in</h3>
				<form action="#">
					<div class="row">
						<div class="col-xl-12 col-md-12">
							<input type="email" placeholder="Enter email">
						</div>
						<div class="col-xl-12 col-md-12">
							<input type="password" placeholder="Password">
						</div>
						<div class="col-xl-12">
							<button type="submit" class="boxed_btn_orange">Sign in</button>
						</div>
					</div>
				</form>
				<p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a>
				</p>
			</div>
		</div>
	</form>
	<!-- form itself end -->

	<!-- form itself end-->
	<form id="test-form2" class="white-popup-block mfp-hide">
		<div class="popup_box ">
			<div class="popup_inner">
				<div class="logo text-center">
					<a href="#">
						<img src="img/form-logo.png" alt="">
					</a>
				</div>
				<h3>Resistration</h3>
				<form action="#">
					<div class="row">
						<div class="col-xl-12 col-md-12">
							<input type="email" placeholder="Enter email">
						</div>
						<div class="col-xl-12 col-md-12">
							<input type="password" placeholder="Password">
						</div>
						<div class="col-xl-12 col-md-12">
							<input type="Password" placeholder="Confirm password">
						</div>
						<div class="col-xl-12">
							<button type="submit" class="boxed_btn_orange">Sign Up</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</form>
	<!-- form itself end -->

	<!-- JS here -->
	<script src="{{ asset ('js/vendor/modernizr-3.5.0.min.js') }}"></script>
	<script src="{{ asset ('js/vendor/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset ('js/popper.min.js') }}"></script>
	<script src="{{ asset ('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset ('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset ('js/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset ('js/ajax-form.js') }}"></script>
	<script src="{{ asset ('js/waypoints.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.counterup.min.js') }}"></script>
	<script src="{{ asset ('js/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset ('js/scrollIt.js') }}"></script>
	<script src="{{ asset ('js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset ('js/wow.min.js') }}"></script>
	<script src="{{ asset ('js/nice-select.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset ('js/plugins.js') }}"></script>
	<script src="{{ asset ('js/gijgo.min.js') }}"></script>

	<!--contact js-->
	<script src="{{ asset ('js/contact.js') }}"></script>
	<script src="{{ asset ('js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.form.js') }}"></script>
	<script src="{{ asset ('js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset ('js/mail-script.js') }}"></script>

	<script src="{{ asset ('js/main.js') }}"></script>
</body>

</html>