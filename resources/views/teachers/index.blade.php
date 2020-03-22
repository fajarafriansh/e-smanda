@extends('layouts.home-index')

@section('title')
	Daftar Guru
@endsection

@section('content')

<!-- slider_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
	<h3>Daftar Guru</h3>
</div>
<!-- slider_area_end -->

<div class="our_team_member">
    <div class="container">
    	<div class="row">
			<div class="col-xl-12">
				<div class="section_title text-center mb-100">
					<h3>Daftar Guru Hebat Kami</h3>
					<p>Guru-guru hebat yang akan memberikan pelajaran terbaik</p>
				</div>
			</div>
		</div>
        <div class="row">
        	@foreach ($teachers as $teacher)
	            <div class="col-xl-3 col-md-6 col-lg-3">
	                <div class="single_team">
	                	<a href="{{ route('teachers.show', [$teacher->id]) }}">
		                    <div class="thumb">
		                        <img class="teacher" src="{{ asset('img/avatar/'. $teacher->detail->avatar) }}" alt="">
		                        <div class="social_link">
		                            <a href="#"><i class="fa fa-envelope"></i></a>
		                            <a href="#"><i class="fa fa-twitter"></i></a>
		                            <a href="#"><i class="fa fa-linkedin"></i></a>
		                        </div>
		                    </div>
		                </a>
	                    <div class="master_name text-center">
	                    	<a href="{{ route('teachers.show', [$teacher->id]) }}">
	                        	<h3>{{ $teacher->name }}</h3>
	                        </a>
	                        <p>{{ $teacher->detail->role}}</p>
	                    </div>
	                </div>
	            </div>
			@endforeach
        </div>
    </div>
</div>
<!-- popular_courses_end-->


@endsection