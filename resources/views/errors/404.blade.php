<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Be right back</title>

	<link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css' ) }}">
	{{-- <link rel="stylesheet" href="{{ asset ('css/owl.carousel.min.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/magnific-popup.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/themify-icons.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/nice-select.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/flaticon.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/gijgo.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/animate.css' ) }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset ('css/slicknav.css' ) }}"> --}}
	<link rel="stylesheet" href="{{ asset ('css/style.css' ) }}">
	<link rel="stylesheet" href="{{ asset ('css/custom.css' ) }}">

	<style type="text/css" media="screen">
		.slider_area .single_slider .slider_info h1 {
			color: #ffffff;
			font-size: 120px;
			text-transform: capitalize;
			font-weight: 500;
			line-height: 120px;
			margin-bottom: 20px;
			margin-top: 10px;
		}
	</style>
</head>

<body>
	<div class="slider_area ">
		<div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-xl-6 col-md-6">
						<div class="illastrator_png">
							<img src="{{ asset ('img/banner/edu_ilastration.png') }}" alt="">
						</div>
					</div>
					<div class="col-xl-6 col-md-6">
						<div class="slider_info">
							<h1>404</h1>
							<h3>Halaman tidak ditemukan</h3>
							<a href="{{ route('home') }}" class="boxed_btn">Kembali ke Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>