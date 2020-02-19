<div class="col-lg-4">
	<div class="blog_right_sidebar">
		<aside class="single_sidebar_widget post_category_widget">
			<h4 class="widget_title">{{ $lesson->course->title }}</h4>
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
		<aside class="single_sidebar_widget popular_post_widget">
			<h3 class="widget_title">Posting Blog Terbaru</h3>
			<div class="media post_item">
				<img src="{{ asset ('img/post/post_1.png') }}" alt="post">
				<div class="media-body">
					<a href="single-blog.html">
						<h3>From life was you fish...</h3>
					</a>
					<p>January 12, 2019</p>
				</div>
			</div>
			<div class="media post_item">
				<img src="{{ asset ('img/post/post_2.png') }}" alt="post">
				<div class="media-body">
					<a href="single-blog.html">
						<h3>The Amazing Hubble</h3>
					</a>
					<p>02 Hours ago</p>
				</div>
			</div>
			<div class="media post_item">
				<img src="{{ asset ('img/post/post_3.png') }}" alt="post">
				<div class="media-body">
					<a href="single-blog.html">
						<h3>Astronomy Or Astrology</h3>
					</a>
					<p>03 Hours ago</p>
				</div>
			</div>
			<div class="media post_item">
				<img src="{{ asset ('img/post/post_4.png') }}" alt="post">
				<div class="media-body">
					<a href="single-blog.html">
						<h3>Asteroids telescope</h3>
					</a>
					<p>01 Hours ago</p>
				</div>
			</div>
		</aside>
	</div>
</div>