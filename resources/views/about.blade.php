@extends('layouts.home-index')

@section('title')
    Tentang Kami
@endsection

@section('content')

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
    <h3>Tentang Kami</h3>
</div>
<!-- bradcam_area_end -->

<!-- about_area_start -->
<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="single_about_info">
                    <h3>Untuk Pendidikan Indonesia <br>
                        yang Lebih Baik</h3>
                    <p>e-Smanda merupakan Online Learning Management System yang dibuat untuk penelitian yang dilakukan oleh Rifa Astrinaya dalam menyelesaikan Tugas Akhir.</p>
                    {{-- <a href="#" class="boxed_btn">Enroll a Course</a> --}}
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 col-lg-6">
                <div class="about_tutorials">
                    <div class="courses">
                        <div class="inner_courses">
                            <div class="text_info">
                                {{-- <span>20+</span>
                                <p> Courses</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="courses-blue">
                        <div class="inner_courses">
                            <div class="text_info">
                                {{-- <span>7638</span>
                                <p> Courses</p> --}}
                            </div>

                        </div>
                    </div>
                    <div class="courses-sky">
                        <div class="inner_courses">
                            <div class="text_info">
                                {{-- <span>230+</span>
                                <p> Courses</p> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- our_team_member_start -->
<div class="our_team_member">
    <div class="container">
    	<div class="row">
			<div class="col-xl-12">
				<div class="single_about_info text-center mb-100">
					<h3>Tim Kami</h3>
					<p>Ini adalah orang-orang hebat di balik e-Smanda</p>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="single_team">
                    <div class="thumb">
                        <img src="img/team/1.png" alt="">
                        <div class="social_link">
                            <a href="#"><i class="fa fa-envelope"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="master_name text-center">
                        <h3>Macau Wilium</h3>
                        <p>Massage Master</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="single_team">
                    <div class="thumb">
                        <img src="img/team/2.png" alt="">
                        <div class="social_link">
                            <a href="#"><i class="fa fa-envelope"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="master_name text-center">
                        <h3>Dan Jacky</h3>
                        <p>Mens Cut</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="single_team">
                    <div class="thumb">
                        <img src="img/team/3.png" alt="">
                        <div class="social_link">
                            <a href="#"><i class="fa fa-envelope"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="master_name text-center">
                        <h3>Luka Luka</h3>
                        <p>Mens Cut</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="single_team">
                    <div class="thumb">
                        <img src="img/team/4.png" alt="">
                        <div class="social_link">
                            <a href="#"><i class="fa fa-envelope"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="master_name text-center">
                        <h3>Rona Dana</h3>
                        <p>Ladies Cut</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- our_team_member_end -->

@endsection