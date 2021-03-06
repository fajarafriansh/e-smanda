<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->nullable();

            $table->foreign('course_id', 'course_fk_570918')->references('id')->on('courses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
