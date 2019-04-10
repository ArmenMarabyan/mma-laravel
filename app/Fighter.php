<?php

namespace Mma;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Fighter extends Model
{
    protected $fillable = [
    	'name',
    	'alias',
    	'image',
    	'nickname',
    	'nationality',
    	'date',
    	'meta_description',
    	'meta_title',
    	'meta_keyword',
    	'description',
    	'date',
    	'height',
    	'arm_span',
    	'w_category',
    	'insta',
    	'tw',
    	'wins',
    	'loses',
    	'not_heald'
    ];

    public function setAliasAttribute($value) {
		$this->attributes['alias'] = Str::slug(mb_substr($this->name, 0,40) . '-' .\Carbon\Carbon::now()->format('dmyHi'), '-');
	}
}
