<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestsResult extends Model
{
	protected $fillable = [
    	'test_id',
    	'user_id',
    	'test_result'
    ];

    public function answers() {
    	return $this->hasMany(TestsResultsAnswer::class);
    }

    public function student() {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function test() {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
