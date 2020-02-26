@extends('layouts.home-index')

@section('content')

<!-- bradcam_area_start -->
@include('layouts.test-banner')
<!-- bradcam_area_end -->

<!-- lesson detail area start-->
<section class="courses_details_info test">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7">
				<form action="" method="POST" accept-charset="utf-8">
					<div class="single_courses">
						<h3>{{ $lesson->test->title }}</h3>
						<p class="second_title">Kerjakan soal latihan berikut</p>
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
											{{-- <div class="option">
												<input type="radio" id="option_{{ $option->id }}" name="question_{{ $question->id }}" class="option_input">
												<label for="option_{{ $option->id }}" class="option_label">{{ $option->option_text}}</label><br>
											</div> --}}
											<label class="option-container">
												{{ $option->option_text}}
												<input type="radio" name="question_{{ $question->id }}" value="">
												<span class="checkmark"></span>
											</label>
										@endforeach
									</div>
								</div>
							@endforeach
						</div>
					</div>

							<input type="submit" name="" value="Kirim Jawaban">
				</form>
			</div>

			<!-- lesson sidebar area start -->
			@include('layouts.test-sidebar')
			<!-- lesson sidebar area end -->

		</div>
	</div>
</section>
<!-- lesson detail area end -->

@endsection