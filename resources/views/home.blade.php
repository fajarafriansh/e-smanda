@extends('layouts.home-index')

@section('title')
	Home
@endsection

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
						<a href="{{ route('courses') }}" class="boxed_btn">Telusuri Semua Kursus</a>
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
					<h3>Kursus Populer</h3>
					<p>Semua kursus yang populer dapat kamu temukan disini<br> pastikan kamu memilih kursus yang benar</p>
				</div>
			</div>
		</div>
		{{-- <div class="row">
			@include('partials.course-menu')
		</div> --}}
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
										@foreach ($course->categories as $category)
											<a href="{{ route('courses.category', [$category->slug]) }}">
												<span>{{ $category->title }}</span>
											</a>
										@endforeach
										<h3><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a></h3>
										<div class="star_prise d-flex justify-content-between">
											<div class="star">
												@foreach ($course->teachers as $teacher)
													<a class="teacher" href="{{ route('teachers.show', [$teacher->id]) }}">
														<img class="avatar" src="{{ asset('img/avatar/'. $teacher->detail->avatar) }}" alt="">
														{{-- <i class="flaticon-mark-as-favorite-star"></i> --}}
														<span>{{ $teacher->name }}</span>
													</a>
												@endforeach
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