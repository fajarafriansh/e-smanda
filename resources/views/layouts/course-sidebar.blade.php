<div class="col-xl-5 col-lg-5">
	<div class="courses_sidebar">
		<div class="video_thumb">
			<img src="{{ asset ('img/latest_blog/video.png') }}" alt="">
			<a class="popup-video" href="https://www.youtube.com/watch?v=AjgD3CvWzS0">
				<i class="fa fa-play"></i>
			</a>
		</div>
		<div class="author_info">
			@foreach ($course->teachers as $teacher)
				<div class="auhor_header">
					<div class="thumb">
						<img src="{{ asset ('storage/avatar/60x60/'. $teacher->detail->avatar) }}" alt="">
					</div>
					<div class="name">
						<h3>{{ $teacher->name }}</h3>
						<p>{{ $teacher->detail->role }}</p>
					</div>
				</div>
				<p class="text_info">{{ $teacher->detail->bio }}</p>
				<ul>
					<li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
					<li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
					<li><a href="#"> <i class="ti-linkedin"></i> </a></li>
				</ul>
			@endforeach
		</div>
		{{-- <a href="{{ route('register') }}?redirect_url={{ route('courses.show', [$course->slug]) }}" class="boxed_btn">Take Course</a> --}}
		@if (empty(Auth::check()))
			<a href="{{ url('student/login') }}{{-- {{ route('register') }}?redirect_url={{ route('courses.show', [$course->slug]) }} --}}" class="boxed_btn">Ambil Kursus</a>
		@else
			@if ($count_course > 0)
				<a href="{{ route('untake-course', [$course->slug]) }}" class="boxed_btn danger">Batalkan Kursus</a>
			@else
				<form name="take_course" id="take_course" action="{{ route('take-course') }}" method="POST">@csrf
					<input type="hidden" name="course_id" value="{{ $course->id }}">
					<input type="hidden" name="course_name" value="{{ $course->title }}">
					<input type="hidden" name="course_slug" value="{{ $course->slug }}">
					<input type="hidden" name="price" value="{{ $course->price }}">
					<button type="submit" class="boxed_btn">Ambil Kursus</button>
				</form>
			@endif
		@endif
		<div class="feedback_info">
			<h3>Write your feedback</h3>
			<p>Your rating</p>
			<i class="flaticon-mark-as-favorite-star"></i>
			<i class="flaticon-mark-as-favorite-star"></i>
			<i class="flaticon-mark-as-favorite-star"></i>
			<i class="flaticon-mark-as-favorite-star"></i>
			<i class="flaticon-mark-as-favorite-star"></i>
			<form action="#">
				<textarea name="" id="" cols="30" rows="10" placeholder="Write your feedback"></textarea>
				<button type="submit" class="boxed_btn">Submit</button>
			</form>
		</div>
	</div>
</div>