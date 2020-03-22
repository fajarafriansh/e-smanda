@extends('layouts.home-index')

@section('title')
	Kategori: {{ $category->title }}
@endsection

@section('content')

<!-- slider_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
	<h3>Kategori: {{ $category->title }}</h3>
</div>
<!-- slider_area_end -->

<!-- popular_courses_start -->
@if ($category->courses->isEmpty())
	<div class="popular_courses">
        <div class="container">
            <div class="row">
				@include('partials.course-menu')
			</div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Kategori Ini Masih Kosong</h3>
                        <p>Kursus yang ingin kamu cari dalam kategori ini masih belum tersedia. Klik tombol di bawah untuk mencari kursus lainnya!<br><br><br></p>
                        <a href="{{ route('courses') }}" class="boxed_btn">Telusuri Semua Kursus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
	<div class="popular_courses">
		<div class="container">
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
@endif
<!-- popular_courses_end-->


@endsection