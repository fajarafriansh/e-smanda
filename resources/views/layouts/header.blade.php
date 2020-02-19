<header>
	<div class="header-area ">
		<div id="sticky-header" class="main-header-area">
			<div class="container-fluid p-0">
				<div class="row align-items-center no-gutters">
					<div class="col-xl-2 col-lg-2">
						<div class="logo-img">
							<a href="/">
								<img src="{{ asset ('img/logo.png') }}" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-7 col-lg-7">
						<div class="main-menu  d-none d-lg-block">
							<nav>
								<ul id="navigation">
									<li><a class="active" href="/">home</a></li>
									<li><a href="{{ url('/courses') }}">Courses</a></li>
									<li><a href="{{ url('/courses') }}">Materi</a></li>
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
						<div class="log_chat_area d-flex align-items-center">
							@if (empty(Auth::check()))
								<div class="live_chat_btn">
									<a href="{{ url('student/login') }}" class="boxed_btn_orange login">
										<span>Login</span>
									</a>
								</div>
							@else
								<a href="{{ url('student/courses') }}" class="login student">
									<i class="flaticon-user"></i>
									<span>Your Courses</span>
								</a>
								<a href="{{ url('student/logout') }}" class="login">
									<span>Logout</span>
								</a>
							@endif
							{{-- <div class="live_chat_btn" style="padding-left: 20px">
								<a class="boxed_btn" href="#">
									<i class="fa fa-phone"></i>
									<span>+10 378 467 3672</span>
								</a>
							</div> --}}
						</div>
					</div>
					<div class="col-12">
						<div class="mobile_menu d-block d-lg-none"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>