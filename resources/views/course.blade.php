@extends('layouts.home-index')

@section('content')

<!-- bradcam_area_start -->
<div class="courses_details_banner">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="course_text">
					<h3>{{ $course->title }}</h3>
					<div class="prise">
						{{-- <span class="inactive">$89.00</span> --}}
						<span class="active">${{ $course->price }}</span>
					</div>
					<div class="rating">
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<span>(4.5)</span>
					</div>
					<div class="hours">
						<div class="video">
							<div class="single_video">
							<i class="fa fa-clock-o"></i> <span>12 Videos</span>
							</div>
							<div class="single_video">
							<i class="fa fa-play-circle-o"></i> <span>9 Hours</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- bradcam_area_end -->

<!--================ Start Course Details Area =================-->
<div class="courses_details_info">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7">
				<div class="single_courses">
					<h3>Objectives</h3>
					<p>{{ $course->description }}</p>
					<h3 class="second_title">Course Outline</h3>
				</div>
				<div class="outline_courses_info">
					<div id="accordion">
						@foreach($course->publishedLessons as $lesson)
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
											<i class="flaticon-question"></i> {{ $lesson->title }}
										</button>
									</h5>
								</div>
								<div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										{{ $lesson->short_text }}
									</div>
									<div class="card-body">
										<a href="{{ route('lessons.show', [$lesson->course->code, $lesson->slug]) }}" class="genric-btn success radius">Read more</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-xl-5 col-lg-5">
				<div class="courses_sidebar">
					<div class="video_thumb">
						@if($course->course_image)
							<img src="{{ $course->course_image->getUrl() }}" alt="">
						@else
							<img src="{{ asset('img/default-image.png') }}" alt="">
						@endif
						{{-- <img src="{{ asset ('img/latest_blog/video.png') }}" alt=""> --}}
						{{-- <a class="popup-video" href="https://www.youtube.com/watch?v=AjgD3CvWzS0">
							<i class="fa fa-play"></i>
						</a> --}}
					</div>
					<div class="author_info">
						@foreach ($course->teachers as $teacher)
							<div class="auhor_header">
								<div class="thumb">
									<img src="{{ asset ('img/avatar/'. $teacher->detail->avatar) }}" alt="">
								</div>
								<div class="name">
									<h3>{{ $teacher->name }}</h3>
									<p>{{ $teacher->detail->role }}</p>
								</div>
							</div>
							<p class="text_info">{{ $teacher->detail->bio }}</p>
							<ul>
								<li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
								<li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
								<li><a href="#"> <i class="ti-linkedin"></i> </a></li>
							</ul>
						@endforeach
					</div>
					{{-- <a href="{{ route('register') }}?redirect_url={{ route('courses.show', [$course->slug]) }}" class="boxed_btn">Take Course</a> --}}
					@if (empty(Auth::check()))
						<a href="{{ url('student/login') }}{{-- {{ route('register') }}?redirect_url={{ route('courses.show', [$course->slug]) }} --}}" class="boxed_btn">Ambil Kursus</a>
					@else
						@if ($count_course > 0)
							<a href="{{ route('untake-course', [$course->slug]) }}" class="boxed_btn danger">Batalkan Kursus</a>
						@else
							<form name="take_course" id="take_course" action="{{ route('take-course') }}" method="POST">@csrf
								<input type="hidden" name="course_id" value="{{ $course->id }}">
								<input type="hidden" name="course_name" value="{{ $course->title }}">
								<input type="hidden" name="course_slug" value="{{ $course->slug }}">
								<input type="hidden" name="price" value="{{ $course->price }}">
								<button type="submit" class="boxed_btn">Ambil Kursus</button>
							</form>
						@endif
					@endif
					{{-- <div class="feedback_info">
						<h3>Write your feedback</h3>
						<p>Your rating</p>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<i class="flaticon-mark-as-favorite-star"></i>
						<form action="#">
							<textarea name="" id="" cols="30" rows="10" placeholder="Write your feedback"></textarea>
							<button type="submit" class="boxed_btn">Submit</button>
						</form>
					</div> --}}
				</div>
			</div>

		</div>
	</div>
</div>
<!--================ End Course Details Area =================-->

@endsection