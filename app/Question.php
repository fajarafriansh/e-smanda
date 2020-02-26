<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Question extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'questions';

    protected $appends = [
        'question_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'score',
        'question',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function questionsOptions()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id', 'id');
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'question_test');
    }

    public function getQuestionImageAttribute()
    {
        $file = $this->getMedia('question_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
