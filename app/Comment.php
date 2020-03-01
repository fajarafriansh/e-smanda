<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $table = 'comments';

	protected $dates = [
	'created_at',
	'updated_at',
	'deleted_at',
	];

	protected $fillable = [
	'user_id',
	'lesson_id',
	'parent_id',
	'comment_text',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function replies() {
		return $this->hasMany(Comment::class, 'parent_id');
	}
}
