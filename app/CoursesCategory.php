<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesCategory extends Model
{
    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
    	'parent_id',
    	'title',
    	'slug',
    	'created_at',
        'updated_at',
    ];

    public function courses() {
    	return $this->belongsToMany(Course::class, 'course_category');
    }
}
