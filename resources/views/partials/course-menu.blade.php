<div class="col-xl-12">
	<div class="course_nav">
		<nav>
			<ul class="nav" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link {{ request()->is('courses') ? 'active' : '' }}" href="{{ route('courses') }}">Semua Kursus</a>
				</li>
				@foreach ($categories as $category)
					<li class="nav-item">
						<a class="nav-link {{ request()->is('course/category/'. $category->slug) ? 'active' : '' }}" href="{{ route('courses.category', [$category->slug]) }}">{{ $category->title }}</a>
					</li>
				@endforeach
			</ul>
		</nav>
	</div>
</div>