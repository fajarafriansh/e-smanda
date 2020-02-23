<?php

use App\Questions;
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
        factory(Questions::class, 50)->create()->each(function($question) {
			$question->options()->saveMany(factory(QuestionsOption::class, 10)->create());
		});
    }
}
