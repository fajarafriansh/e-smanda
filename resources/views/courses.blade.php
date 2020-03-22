@extends('layouts.home-index')

@section('title')
	Semua Kursus
@endsection

@section('content')

<!-- slider_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
	<h3>Semua Kursus</h3>
</div>
<!-- slider_area_end -->

<!-- popular_courses_start -->
<div class="popular_courses">
	<div class="container">
		{{-- <div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-100">
					<h3>Popular Courses</h3>
					<p>Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your
					domains.</p>
				</div>
			</div>
		</div> --}}
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
								@include ('partials.course-card')
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