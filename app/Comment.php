<?php

namespace Mma;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
	    'name',
	    'user_comment',
	    'parent_id',
	    'user_id',
	    'article_id',

	];

    public function article() {
    	return $this->belongsTo('Mma\Article');
    }

    public function user() {
    	return $this->belongsTo('Mma\User');
    }
}
