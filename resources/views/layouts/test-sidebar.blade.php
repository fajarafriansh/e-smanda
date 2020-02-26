<div class="col-xl-5 col-lg-5">
	<div class="blog_right_sidebar">
		<aside class="single_sidebar_widget post_category_widget">
			<a href="{{ route('courses.show', [$lesson->course->slug]) }}">
				<h4 class="widget_title">{{ $lesson->course->title }}</h4>
			</a>
			<ul class="list cat-list">
				@foreach ($lesson->course->publishedLessons as $list_lesson)
					<li>
						<a href="{{ route('lessons.show', [$list_lesson->slug]) }}" class="d-flex">
							<p @if ($list_lesson->id == $lesson->id) style="color: #8A47E5; font-weight: bold" @endif>
								{{ $list_lesson->title }}
							</p>
						</a>
					</li>
				@endforeach
			</ul>
		</aside>
	</div>
</div>