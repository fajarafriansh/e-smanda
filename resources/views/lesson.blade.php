@extends('layouts.home-index')

@section('content')

<!-- bradcam_area_start -->
@include('layouts.lesson-banner')
<!-- bradcam_area_end -->

<!-- lesson detail area start-->
<section class="blog_area single-post-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post">
					<div class="feature-img">
						<img class="img-fluid" src="{{ asset ('img/blog/single_blog_1.png') }}" alt="">
					</div>
					<div class="blog_details">
						<h2>{{ $lesson->title }}</h2>
						<ul class="blog-info-link mt-3 mb-4">
							<li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
							<li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
						</ul>

						<div class=lesson-text-area>
							<p>{{ $lesson->full_text }}</p>
						</div>

						@if ($lesson->test)
							<div class="test-area">
								<div class="container box_1170 border-top-generic">
									<h3 class="text-heading">Ujian</h3>
									@if (!is_null($test_result))
										<div class="quote-wrapper">
											<div class="quotes">
												Kamu sudah mengerjakan Ujian {{ $lesson->test->title }}.
												Nilai ujian kamu adalah {{ $test_result->test_result }}.
											</div>
										</div>
									@else
										<p>Selesaikan soal Ujian {{ $lesson->test->title }} dengan klik pada tombol di bawah!</p>
										<a href="{{ route('lessons.test', [$lesson->slug]) }}" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn">Kerjakan Soal</a>
									@endif
								</div>
							</div>
						@endif

					</div>
				</div>
				<div class="navigation-top">
					<div class="d-sm-flex justify-content-between text-center">
						<p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4 people like this</p>
						<div class="col-sm-4 text-center my-2 my-sm-0">
							<!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
						</div>
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="navigation-area">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
								@if ($previous_lesson)
									<div class="thumb">
										<a href="{{ route('lessons.show', [$previous_lesson->slug]) }}">
											<img class="img-fluid" src="{{ asset ('img/post/preview.png') }}" alt="">
										</a>
									</div>
									<div class="arrow">
										<a href="{{ route('lessons.show', [$previous_lesson->slug]) }}">
											<span class="lnr text-white ti-arrow-left"></span>
										</a>
									</div>
									<div class="detials">
										<p>Pelajaran Sebelumnya</p>
										<a href="{{ route('lessons.show', [$previous_lesson->slug]) }}">
											<h4>{{ $previous_lesson->title }}</h4>
										</a>
									</div>
								@endif
							</div>
							<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
								@if ($next_lesson)
									<div class="detials">
										<p>Pelajaran Selanjutnya</p>
										<a href="{{ route('lessons.show', [$next_lesson->slug]) }}">
											<h4>{{ $next_lesson->title }}</h4>
										</a>
									</div>
									<div class="arrow">
										<a href="{{ route('lessons.show', [$next_lesson->slug]) }}">
											<span class="lnr text-white ti-arrow-right"></span>
										</a>
									</div>
									<div class="thumb">
										<a href="{{ route('lessons.show', [$next_lesson->slug]) }}">
											<img class="img-fluid" src="{{ asset ('img/post/next.png') }}" alt="">
										</a>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="blog-author">
					@foreach ($lesson->course->teachers as $teacher)
						<div class="media align-items-center">
							<img src="{{ asset ('storage/avatar/90x90/'. $teacher->detail->avatar) }}" alt="">
							<div class="media-body">
								<a href="#">
                                    <h4>{{ $teacher->name }}</h4>
								</a>
								<p>{{ $teacher->detail->bio }}</p>
							</div>
						</div>
                    @endforeach
				</div>
				<div class="comments-area">
					<h4>05 Comments</h4>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="{{ asset ('img/comment/comment_1.png') }}" alt="">
								</div>
								<div class="desc">
									<p class="comment">
										Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
										Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
									</p>
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center">
											<h5>
												<a href="#">Emilly Blunt</a>
											</h5>
											<p class="date">December 4, 2017 at 3:12 pm </p>
										</div>
										<div class="reply-btn">
											<a href="#" class="btn-reply text-uppercase">reply</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="{{ asset ('img/comment/comment_2.png') }}" alt="">
								</div>
								<div class="desc">
									<p class="comment">
									Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
									Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
									</p>
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center">
											<h5>
												<a href="#">Emilly Blunt</a>
											</h5>
											<p class="date">December 4, 2017 at 3:12 pm </p>
										</div>
										<div class="reply-btn">
											<a href="#" class="btn-reply text-uppercase">reply</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="{{ asset ('img/comment/comment_3.png') }}" alt="">
								</div>
								<div class="desc">
									<p class="comment">
									Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
									Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
									</p>
									<div class="d-flex justify-content-between">
										<div class="d-flex align-items-center">
											<h5>
												<a href="#">Emilly Blunt</a>
											</h5>
											<p class="date">December 4, 2017 at 3:12 pm </p>
										</div>
										<div class="reply-btn">
											<a href="#" class="btn-reply text-uppercase">reply</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="comment-form">
					<h4>Ayo Diskusi!</h4>
					<form class="form-contact comment_form" action="#" id="commentForm">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
									placeholder="Write Comment"></textarea>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input class="form-control" name="name" id="name" type="text" placeholder="Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input class="form-control" name="email" id="email" type="email" placeholder="Email">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<input class="form-control" name="website" id="website" type="text" placeholder="Website">
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
						</div>
					</form>
				</div>
			</div>

			<!-- lesson sidebar area start -->
			@include('layouts.lesson-sidebar')
			<!-- lesson sidebar area end -->

		</div>
	</div>
</section>
<!-- lesson detail area end -->

@endsection