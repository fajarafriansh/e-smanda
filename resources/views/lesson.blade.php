@extends('layouts.home-index')

@section('title')
	{{ $lesson->title }}
@endsection

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
						@if($lesson->lesson_image)
							<img class="img-fluid" src="{{ $lesson->lesson_image->getUrl() }}" alt="">
						@endif
					</div>
					<div class="blog_details">
						<h2>{{ $lesson->title }}</h2>
						<ul class="blog-info-link mt-3 mb-4">
							@foreach ($lesson->course->categories as $category)
								<li><i class="fa fa-folder-open"></i> <a href="{{ route('courses.category', [$category->slug]) }}">{{ $category->title }}</a></li>
							@endforeach
							<li><i class="fa fa-comments"></i> <a href="#comment-area">{{ $lesson->comments->count()}} Komentar</a></li>
						</ul>

						<div class=lesson-text-area>
							{{ $lesson->full_text }}
						</div>

						@if ($lesson->downloadable_file)
							<div class="test-area download-file">
								<div class="container box_1170 border-top-generic">
									<h3 class="text-heading">Unduh File Materi</h3>
									<p>Unduh file materi pada link di bawah</p>
									<ul class="unordered-list">
										@foreach ($lesson->files as $file)
											@php
												$nama_file = explode("_", $file->name);
												$ext = explode(".", $file->file_name);
												if ($ext[1] == 'doc' || $ext[1] == 'docx') {
													$file_type = 'word';
												} elseif ($ext[1] == 'xls' || $ext[1] == 'xlsx') {
													$file_type = 'excel';
												} elseif ($ext[1] == 'ppt' || $ext[1] == 'pptx') {
													$file_type = 'powerpoint';
												} else {
													$file_type = $ext[1];
												}
											@endphp

											<i class="fa fa-file-{{ $file_type }}-o"></i>
											<a href="{{ $file->getUrl() }}" target="_blank">
												{{ $nama_file[1] }}
											</a><br>
										@endforeach
									</ul>
								</div>
							</div>
						@endif

						@if ($lesson->test)
							<div class="test-area">
								<div class="container box_1170 border-top-generic text-center">
									<h3 class="text-heading">{{ $lesson->test->title }}</h3>
									@if (!is_null($test_result))
										<p>Kamu sudah mengerjakan soal {{ $lesson->test->title }}.</p>
										<div class="button rounded-0 primary-bg text-white lebar-100 btn_1 boxed-btn done">Nilai kamu = {{ $test_result->test_result }}</div>
									@else
										@if ($lesson->test->questions->count() < 1)
											<p>{{ $lesson->test->description }}</p>
										@else
											<p>Selesaikan soal {{ $lesson->test->title }} dengan klik pada tombol di bawah!</p>
											<a href="{{ route('lessons.test', [$lesson->course->code, $lesson->slug]) }}" class="button rounded-0 primary-bg text-white lebar-100 btn_1 boxed-btn">Kerjakan Soal</a>
										@endif
									@endif
								</div>
							</div>
						@endif

					</div>
				</div>
				<div class="navigation-top">
					{{-- <div class="d-sm-flex justify-content-between text-center">
						<p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4 people like this</p>
						<div class="col-sm-4 text-center my-2 my-sm-0">
							<p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>
						</div>
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div> --}}
					<div class="navigation-area">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
								@if ($previous_lesson)
									<div class="thumb">
										<a href="{{ route('lessons.show', [$previous_lesson->course->code, $previous_lesson->slug]) }}">
											@if($previous_lesson->lesson_image)
												<img class="img-fluid" src="{{ $previous_lesson->lesson_image->getUrl() }}" alt="">
											@else
												<img class="img-fluid" src="{{ asset('img/asset/previous.png') }}" alt="">
											@endif
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
											@if($next_lesson->lesson_image)
												<img class="img-fluid" src="{{ $next_lesson->lesson_image->getUrl() }}" alt="">
											@else
												<img class="img-fluid" src="{{ asset ('img/asset/next.png') }}" alt="">
											@endif
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
							<div class="author-image">
								<img src="{{ asset ('img/avatar/'. $teacher->avatar) }}" alt="">
							</div>
							<div class="media-body">
								<a href="{{ route('teachers.show', $teacher->id) }}">
                                    <h4>{{ $teacher->name }}</h4>
								</a>

								<p>{{ $teacher->detail->bio }}</p>
							</div>
						</div>
                    @endforeach
				</div>

				@comments (['model' => $lesson])

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