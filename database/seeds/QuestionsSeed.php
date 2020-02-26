<?php

use App\Question;
use App\QuestionsOption;
use Illuminate\Database\Seeder;

class QuestionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class, 50)->create()->each(function($question) {
			$question->questionsOptions()->saveMany(factory(QuestionsOption::class, 4)->create());
			$question->tests()->attach(rand(1,50));
		});
    }
}
