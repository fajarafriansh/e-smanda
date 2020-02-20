@extends('layouts.index')

@section('content')

@if (Session::has('error_message'))
	{{-- <div id="errorpu">
		<div class="mfp-bg mfp-ready"></div>
		<div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;"><div class="mfp-container mfp-inline-holder"><div class="mfp-content"><div id="student-login" name="student-login" class="white-popup-block"> --}}
			<div id="error_popup">
			    <div class="error_popup_box ">
			        <div class="popup_inner">
			            <h3 class="text-center">{!! session('error_message') !!}</h3>
			            <button id="popup_close" class="boxed_btn_orange">OK</button>
			        </div>
			    </div>

			</div>{{-- </div></div></div>
		</div>
	</div> --}}
@endif

<!-- bradcam_area_start -->
@include('layouts.course-banner')
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
										<a href="{{ route('lessons.show', [$lesson->slug]) }}" class="genric-btn success radius">Read more</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			@include('layouts.course-sidebar')

		</div>
	</div>
</div>
<!--================ End Course Details Area =================-->

@endsection