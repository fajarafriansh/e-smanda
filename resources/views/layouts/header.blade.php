<header>
	<div class="header-area ">
		<div id="sticky-header" class="main-header-area">
			<div class="container-fluid p-0">
				<div class="row align-items-center no-gutters">
					<div class="col-xl-2 col-lg-2">
						<div class="logo-img">
							<a href="{{ route('home') }}">
								<img src="{{ asset ('img/logo.png') }}" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-7 col-lg-7">
						<div class="main-menu  d-none d-lg-block">
							<nav>
								<ul id="navigation">
									<li><a class="active" href="{{ route('home') }}">Home</a></li>
									<li><a href="{{ url('/courses') }}">Kursus</a></li>
									<li><a href="{{ url('/documents') }}">Materi</a></li>
									<li><a href="#">blog{{--  <i class="ti-angle-down"></i> --}}</a>
										{{-- <ul class="submenu">
										    <li><a href="blog.html">blog</a></li>
										    <li><a href="single-blog.html">single-blog</a></li>
										</ul> --}}
									</li>
									<li><a href="about.html">About</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 d-none d-lg-block">
						<div class="log_chat_area d-flex align-items-center student_area">
							@if (empty(Auth::check()))
								<div class="live_chat_btn">
									<a href="{{ url('student/login') }}" class="boxed_btn_orange login">
										<span>Masuk</span>
									</a>
								</div>
							@else
								<a href="{{ url('student/profile') }}" class="login student">
									<i class="flaticon-user"></i>
									<span>Profile</span>
								</a>
								<a href="{{ url('student/logout') }}" class="login student">
									<span>Keluar</span>
								</a>
							@endif
						</div>
					</div>
					<div class="col-10">
						<div class="mobile_menu profile d-block d-lg-none">
							<div class="slicknav_menu">
								@if (empty(Auth::check()))
									<span class="slicknav_btn login">
										<a class="mobile_login" href="{{ url('student/login') }}">
											Login
										</a>
									</span>
								@else
									<span class="slicknav_btn profile">
										<span class="slicknav_icon">
											<a href="{{ url('student/profile') }}">
												<i class="fa fa-user-circle-o" aria-hidden="true"></i>
											</a>
										</span>
									</span>
								@endif
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="mobile_menu d-block d-lg-none">
							<div class="slicknav_menu">
								<span class="slicknav_btn" onclick="openNav()">
									<span class="slicknav_icon">
										<span class="slicknav_icon-bar"></span>
										<span class="slicknav_icon-bar"></span>
										<span class="slicknav_icon-bar"></span>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="mobile_nav" class="afriansh overlay">
		<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>

		<div class="overlay-content">
			<a href="{{ route('home') }}">Home</a>
			<a href="{{ url('/courses') }}">Kursus</a>
			<a href="{{ route('home') }}">Materi</a>
			<a href="{{ route('home') }}">Materi</a>
			<a href="{{ route('home') }}">Materi</a>
		</div>
	</div>
</header>
