<?php

namespace Mma;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
	    'name',
	    'alias',
	    'image',
	    'short_description',
	    'description',
	    'views',
	    'source',
	    'main_article',
	    'meta_title',
	    'meta_description',
	    'meta_keyword',
	];
	
	public function setAliasAttribute($value) {
		$this->attributes['alias'] = Str::slug(mb_substr($this->name, 0,40) . '-' .\Carbon\Carbon::now()->format('dmyHi'), '-');
	}

	public function comments() {
		return $this->hasMany('Mma\Comment')->orderBy('id', 'desc');
	}
}
