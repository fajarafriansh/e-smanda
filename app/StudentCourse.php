<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model {

    public $table = 'student_courses';

    protected $fillable = [
        'course_id',
        'course_name',
        'course_slug',
        'price',
        'student_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }
}
