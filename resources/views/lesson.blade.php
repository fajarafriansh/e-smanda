@extends('layouts.home-index')

@section('content')

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
	<h3>{{ $lesson->title }}</h3>
</div>
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
									<h3 class="text-heading">{{ $lesson->test->title }}</h3>
									@if (!is_null($test_result))
										<div class="quote-wrapper">
											<div class="quotes">
												Kamu sudah mengerjakan soal {{ $lesson->test->title }}.
												Nilai kamu adalah {{ $test_result->test_result }}.
											</div>
										</div>
									@else
										<p>Selesaikan soal {{ $lesson->test->title }} dengan klik pada tombol di bawah!</p>
										<a href="{{ route('lessons.test', [$lesson->course->code, $lesson->slug]) }}" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn">Kerjakan Soal</a>
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
										<a href="{{ route('lessons.show', [$previous_lesson->course->code, $previous_lesson->slug]) }}">
											<img class="img-fluid" src="{{ asset ('img/post/preview.png') }}" alt="">
										</a>
									</div>
									<div class="arrow">
										<a href="{{ route('lessons.show', [$previous_lesson->course->code, $previous_lesson->slug]) }}">
											<span class="lnr text-white ti-arrow-left"></span>
										</a>
									</div>
									<div class="detials">
										<p>Pelajaran Sebelumnya</p>
										<a href="{{ route('lessons.show', [$previous_lesson->course->code, $previous_lesson->slug]) }}">
											<h4>{{ $previous_lesson->title }}</h4>
										</a>
									</div>
								@endif
							</div>
							<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
								@if ($next_lesson)
									<div class="detials">
										<p>Pelajaran Selanjutnya</p>
										<a href="{{ route('lessons.show', [$next_lesson->course->code, $next_lesson->slug]) }}">
											<h4>{{ $next_lesson->title }}</h4>
										</a>
									</div>
									<div class="arrow">
										<a href="{{ route('lessons.show', [$next_lesson->course->code, $next_lesson->slug]) }}">
											<span class="lnr text-white ti-arrow-right"></span>
										</a>
									</div>
									<div class="thumb">
										<a href="{{ route('lessons.show', [$next_lesson->course->code, $next_lesson->slug]) }}">
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
					@if ($lesson->comment)
						<h4>{{ $comments_count }} Diskusi, Ayo Diskusi!</h4>
						@foreach ($lesson->comments as $comment)
							<div class="comment-list">
								<div class="single-comment justify-content-between d-flex">
									<div class="user justify-content-between d-flex">
										<div class="thumb">
											<img src="{{ asset('storage/avatar/70x70/'. $comment->user->detail->avatar) }}" alt="">
										</div>
										<div class="desc">
											<div class="d-flex justify-content-between">
												<div class="d-flex align-items-center">
													<h5>
														<a href="#">{{ $comment->user->name }}</a>
													</h5>
													<p class="date">December 4, 2017 at 3:12 pm </p>
												</div>
												<div class="reply-btn">
													<a href="#" class="btn-reply text-uppercase">reply</a>
												</div>
											</div>
											<p class="comment">{{ $comment->comment_text }}</p>
										</div>
									</div>
								</div>
							</div>
							@foreach ($comment->replies as $reply)
								<div class="comment-list is_reply">
									<div class="single-comment justify-content-between d-flex">
										<div class="user justify-content-between d-flex">
											<div class="thumb">
												<img src="{{ asset('storage/avatar/70x70/'. $reply->user->detail->avatar) }}" alt="">
											</div>
											<div class="desc">
												<div class="d-flex justify-content-between">
													<div class="d-flex align-items-center">
														<h5>
															<a href="#">{{ $reply->user->name }}</a>
														</h5>
														<p class="date">December 4, 2017 at 3:12 pm </p>
													</div>
													<div class="reply-btn">
														<a href="#" class="btn-reply text-uppercase">reply</a>
													</div>
												</div>
												<p class="comment">{{ $reply->comment_text }}</p>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							<div class="comment-list is_reply">
								<div class="single-comment justify-content-between d-flex">
									<div class="user justify-content-between d-flex">
										<form class="form-contact comment_form" action="{{ route('add.reply', [$lesson->course->code, $lesson->slug]) }}" id="commentForm" method="POST">@csrf
											<input type="hidden" name="comment_id" value="{{ $comment->id }}">
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<textarea class="form-control w-100" name="comment_text" id="comment" cols="30" rows="9"
														placeholder="Tulis Balasan"></textarea>
													</div>
												</div>
											</div>
											<div class="form-group">
												<button type="submit" class="button button-contactForm btn_1 boxed-btn">Balas</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<h4>Belum ada diskusi</h4>
					@endif
				</div>
				<div class="comment-form">
					{{-- <h4>Ayo Diskusi!</h4> --}}
					<form class="form-contact comment_form" action="{{ route('add.comment', [$lesson->course->code, $lesson->slug]) }}" id="commentForm" method="POST">@csrf
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<textarea class="form-control w-100" name="comment_text" id="comment" cols="30" rows="9"
									placeholder="Tulis Komentar"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="button button-contactForm btn_1 boxed-btn">Kirim Komentar</button>
						</div>
					</form>
				</div>
			</div>

			<!-- lesson sidebar area start -->
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget post_category_widget">
						<a href="{{ route('courses.show', [$lesson->course->slug]) }}">
							<h4 class="widget_title">{{ $lesson->course->title }}</h4>
						</a>
						<ul class="list cat-list">
							@foreach ($lesson->course->publishedLessons as $list_lesson)
								<li>
									<a href="{{ route('lessons.show', [$list_lesson->course->code, $list_lesson->slug]) }}" class="d-flex">
										<p @if ($list_lesson->id == $lesson->id) style="color: #8A47E5; font-weight: bold" @endif>
											{{ $list_lesson->title }}
										</p>
									</a>
								</li>
							@endforeach
						</ul>
					</aside>
					<aside class="single_sidebar_widget popular_post_widget">
						<h3 class="widget_title">Posting Blog Terbaru</h3>
						<div class="media post_item">
							<img src="{{ asset ('img/post/post_1.png') }}" alt="post">
							<div class="media-body">
								<a href="single-blog.html">
									<h3>From life was you fish...</h3>
								</a>
								<p>January 12, 2019</p>
							</div>
						</div>
						<div class="media post_item">
							<img src="{{ asset ('img/post/post_2.png') }}" alt="post">
							<div class="media-body">
								<a href="single-blog.html">
									<h3>The Amazing Hubble</h3>
								</a>
								<p>02 Hours ago</p>
							</div>
						</div>
						<div class="media post_item">
							<img src="{{ asset ('img/post/post_3.png') }}" alt="post">
							<div class="media-body">
								<a href="single-blog.html">
									<h3>Astronomy Or Astrology</h3>
								</a>
								<p>03 Hours ago</p>
							</div>
						</div>
						<div class="media post_item">
							<img src="{{ asset ('img/post/post_4.png') }}" alt="post">
							<div class="media-body">
								<a href="single-blog.html">
									<h3>Asteroids telescope</h3>
								</a>
								<p>01 Hours ago</p>
							</div>
						</div>
					</aside>
				</div>
			</div>
			<!-- lesson sidebar area end -->

		</div>
	</div>
</section>
<!-- lesson detail area end -->

@endsection