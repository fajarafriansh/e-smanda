<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Lesson extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'lessons';

    protected $appends = [
        'lesson_image',
        'downloadable_file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'position',
        'course_id',
        'shor_text',
        'full_text',
        'published',
        'created_at',
        'updated_at',
        'deleted_at',
        'free_lesson',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'lesson_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getLessonImageAttribute()
    {
        $file = $this->getMedia('lesson_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getDownloadableFileAttribute()
    {
        return $this->getMedia('downloadable_file');
    }
}
