<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $table = 'user_details';

    protected $fillable = [
    	'user_id',
    	'avatar',
    	'role',
    	'bio',
    ];

    public function user() {
    	return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
