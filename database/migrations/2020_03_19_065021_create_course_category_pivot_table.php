<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCategoryPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_category', function (Blueprint $table) {
            $table->unsignedInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_523779')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedInteger('courses_category_id');
            $table->foreign('category_id', 'category_id_fk_523779')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_category');
    }
}
