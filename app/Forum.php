<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Forum extends Model
{
	use Sluggable;

    protected $table = 'forum';
    protected $guarded = [];

    public function sluggable()
    {
    	return[
    		'slug' => [
    			'source' => 'judul'
    		]
    	];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function komentar()
    {
    	return $this->hasMany(Komentar::class);
    }
}
