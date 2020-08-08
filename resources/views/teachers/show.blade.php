@extends('layouts.home-index')

@section('title')
    {{ $teacher->name }}
@endsection

@section('content')

<!-- bradcam_area_start -->
<div class="profile slider_area ">
    <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-md-5">
                    <div class="profile_avatar">
                        <img src="{{ asset ('img/avatar/'. $teacher->avatar) }}" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-md-7">
                    <div class="slider_info">
                        <h3 class="student_name">{{ $teacher->name }}</h3>
                        <h4>{{ $teacher->detail->role }}</h4>
                        <p class="teacher_bio">{{ $teacher->detail->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end -->

<!-- popular_courses_start -->
    @if($teacher->courses->isEmpty())
    <div class="profile popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Belum Ada Kursus</h3>
                        <p>Sepertinya {{ $teacher->name }} Belum membuat kursus apapun.<br><br><br></p>
                        <a href="{{ route('teachers') }}" class="boxed_btn">Lihat Guru Lain</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="profile popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Daftar Kursus oleh {{ $teacher->name }}</h3>
                    </div>
                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- popular_courses_end-->

@endsection