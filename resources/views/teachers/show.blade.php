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
                        <img src="{{ asset ('img/avatar/'. $teacher->detail->avatar) }}" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-md-7">
                    <div class="slider_info">
                        <h3 class="student_name">{{ $teacher->name }}</h3>
                        <h4>{{ $teacher->detail->role }}</h4>
                        <p>{{ $teacher->detail->bio }}</p>
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
                        <h3>Daftar Kursus {{ $teacher->name }}</h3>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="course_nav">
                        <nav>
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">All Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Photoshop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">UI/UX</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab"
                                        aria-controls="design" aria-selected="false">Web Design</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Web-tab" data-toggle="tab" href="#Web" role="tab"
                                        aria-controls="design" aria-selected="false">Web dev</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Web-tab1" data-toggle="tab" href="#Web1" role="tab"
                                        aria-controls="design" aria-selected="false">Wordpress</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Web-tab11" data-toggle="tab" href="#Web11" role="tab"
                                        aria-controls="design" aria-selected="false">Adobe XD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Adobe-XD-tab8" data-toggle="tab" href="#Adobe-XD8" role="tab"
                                        aria-controls="design" aria-selected="false">Sketch App</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Adobe-XD-tab9" data-toggle="tab" href="#Adobe-XD9" role="tab"
                                        aria-controls="design" aria-selected="false">Illustrator</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> --}}

        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                                @foreach($teacher->courses as $course)
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
                                                        <span class="offer">$89.00</span>
                                                        <span class="active_prise">
                                                            $49
                                                        </span>
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
    @endif
    <!-- popular_courses_end-->

@endsection