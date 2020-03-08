@extends('layouts.home-index')

@section('content')

<!-- slider_area_start -->
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
						<h3>Selamat datang <br>
						di e-Learning <br>
						Smanda</h3>
						<a href="/courses" class="boxed_btn">Telusuri Semua Kursus</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- slider_area_end -->

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
			@include('partials.course-menu')
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
											@if($course->course_image)
												<img src="{{ $course->course_image->getUrl() }}" alt="">
											@else
												<img src="{{ asset('img/asset/default-image.png') }}" alt="">
											@endif
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
					{{ $courses->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- popular_courses_end-->


@endsection