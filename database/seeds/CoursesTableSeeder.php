<?php

use App\Course;
use App\Lesson;
use App\Test;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder {
	public function run() {
		factory(Course::class, 5)->create()->each(function($course) {
			$course->teachers()->sync([1]);
			$course->lessons()->saveMany(factory(Lesson::class, 10)->create()->each(function ($lesson) {
				$lesson->test()->save(factory(Test::class)->create());
			}));
		});
	}
}
