<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('question');

            $table->integer('score');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
