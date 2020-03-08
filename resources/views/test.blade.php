@extends('layouts.home-index')

@section('content')

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
	<h3>{{ $lesson->test->title }}</h3>
</div>
<!-- bradcam_area_end -->

<!-- lesson detail area start-->
<section class="courses_details_info test">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<form action="{{ route('lessons.test-result', [$lesson->course->code, $lesson->slug]) }}" method="POST" accept-charset="utf-8">@csrf
				<div class="single_courses">
					<h3>{{ $lesson->test->title }}</h3>
					<p class="second_title">Kerjakan soal berikut atau <a href="{{ route('lessons.show', [$lesson->course->code, $lesson->slug]) }}">kembali ke pelajaran</a></p>
				</div>
				<div class="outline_courses_info">
					<div id="accordion">
						@foreach ($lesson->test->questions as $question)
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										{{-- <i class="flaticon-question"></i>  --}}
										<span class="number">{{ $loop->iteration }}</span>{{ $question->question }}
									</h5>
								</div>
								<div class="card-body">
									@foreach ($question->questionsOptions as $option)
										<label class="option-container">
											{{ $option->option_text}}
											<input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id}}">
											<span class="checkmark"></span>
										</label>
									@endforeach
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<!-- lesson sidebar area start -->
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget post_category_widget">
						<input class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit" name="" value="Kirim Jawaban">
					</aside>
				</div>
			</form>
			</div>
			<!-- lesson sidebar area end -->

		</div>
	</div>
</section>
<!-- lesson detail area end -->

@endsection