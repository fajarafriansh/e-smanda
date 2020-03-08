<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Laravelista\Comments\Commentable;

class Lesson extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Commentable;

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
        'course_code',
        'short_text',
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

    public function test()
    {
        return $this->hasOne(Test::class);
    }

    public function files() {
        return $this->hasMany(Media::class, 'model_id', 'id')->where('collection_name', 'downloadable_file');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
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
        $downloadable_file = $this->getMedia('downloadable_file')->last();

        if ($downloadable_file) {
            $downloadable_file->url = $downloadable_file->getUrl();
        }

        return $downloadable_file;
    }
}
