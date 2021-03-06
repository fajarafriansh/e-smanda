<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Essay extends Model
{
	use SoftDeletes;

    public $table = 'essay';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'essay',
        'lesson_id',
        'test_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function result() {
        return $this->hasOne(TestsResult::class);
    }
}
