<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Course extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'courses';

    protected $appends = [
        'course_image',
    ];

    protected $dates = [
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'code',
        'title',
        'price',
        'published',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function categories()
    {
        return $this->belongsToMany(CoursesCategory::class, 'course_category');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id')->orderBy('position');
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }

    public function publishedLessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id')->orderBy('position')->where('published', 1);
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'course_id', 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeOfTeacher($query) {
        if(!\Auth::user()->isAdmin()) {
            return $query->whereHas('teachers', function($q) {
                $q->where('user_id', \Auth::user()->id);
            });
        }
        return $query;
    }

    public function getCourseImageAttribute()
    {
        $file = $this->getMedia('course_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
