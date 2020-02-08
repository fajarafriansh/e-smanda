<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTestPivotTable extends Migration
{
    public function up()
    {
        Schema::create('question_test', function (Blueprint $table) {
            $table->unsignedInteger('test_id');

            $table->foreign('test_id', 'test_id_fk_571010')->references('id')->on('tests')->onDelete('cascade');

            $table->unsignedInteger('question_id');

            $table->foreign('question_id', 'question_id_fk_571010')->references('id')->on('questions')->onDelete('cascade');
        });
    }
}
