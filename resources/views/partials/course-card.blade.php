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
		@foreach ($course->categories as $category)
			<a href="{{ route('courses.category', [$course->slug]) }}">
				<span>{{ $category->title }}</span>
			</a>
		@endforeach
		<h3><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a></h3>
		<div class="star_prise d-flex justify-content-between">
			<div class="star">
				@foreach ($course->teachers as $teacher)
					<a href="{{ route('teachers.show', [$teacher->id]) }}">
						<img class="avatar" src="{{ asset('img/avatar/'. $teacher->detail->avatar) }}" alt="">
						{{-- <i class="flaticon-mark-as-favorite-star"></i> --}}
						<span>{{ $teacher->name }}</span>
					</a>
				@endforeach
			</div>
			<div class="prise">
				{{-- <span class="offer">$89.00</span> --}}
				{{-- <span class="active_prise">
					${{ $course->price }}
				</span> --}}
			</div>
		</div>
	</div>
</div>