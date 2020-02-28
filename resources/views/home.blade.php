@extends('layouts.home-index')

@section('content')

<!-- slider_area_start -->
@include('layouts.home-banner')
<!-- slider_area_end -->

<!-- about_area_start -->
<div class="about_area">
	<div class="container">
		<div class="row">
			<div class="col-xl-5 col-lg-6">
				<div class="single_about_info">
					<h3>Over 7000 Tutorials <br>
					from 20 Courses</h3>
					<p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god
					moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open
					place day great wherein heaven sixth lesser subdue fowl </p>
					<a href="#" class="boxed_btn">Enroll a Course</a>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-1 col-lg-6">
				<div class="about_tutorials">
					<div class="courses">
						<div class="inner_courses">
							<div class="text_info">
								<span>20+</span>
								<p> Courses</p>
							</div>
						</div>
					</div>
					<div class="courses-blue">
						<div class="inner_courses">
							<div class="text_info">
								<span>7638</span>
								<p> Courses</p>
							</div>
						</div>
					</div>
					<div class="courses-sky">
						<div class="inner_courses">
							<div class="text_info">
								<span>230+</span>
								<p> Courses</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- about_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-100">
					<h3>Popular Courses</h3>
					<p>Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your
					domains.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@include('layouts.course-nav')
		</div>
	</div>
	<div class="all_courses">
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row">
						@foreach($courses as $course)
							<div class="col-xl-4 col-lg-4 col-md-6">
								<div class="single_courses">
									<div class="thumb">
										<a href="{{ route('courses.show', [$course->slug]) }}">
											<img src="img/courses/1.png" alt="">
										</a>
									</div>
									<div class="courses_info">
										@foreach ($course->teachers as $teacher)
											<span>{{ $teacher->name }}</span>
										@endforeach
										<h3><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a></h3>
										<div class="star_prise d-flex justify-content-between">
											<div class="star">
												<i class="flaticon-mark-as-favorite-star"></i>
												<span>(4.5)</span>
											</div>
											<div class="prise">
												{{-- <span class="offer">$89.00</span> --}}
												{{-- <span class="active_prise">
													${{ $course->price }}
												</span> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- popular_courses_end-->


@endsection