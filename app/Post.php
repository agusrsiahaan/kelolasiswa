<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

	protected $dates =['created_at'];
	protected $guarded = [];

	public function sluggable()
	{
		return[
			'slug' => [
				'source' => 'title'
			]
		];
	}

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	} 

 	public function thumbnail()
 	{
 		// if ($this->thumbnail) {
 		// 	return $this->thumbnail;
 		// }else{
 		// 	return asset('no-thumbnail.jpg');
 		// }

 		// if (!$this->thumbnail) {
 		// 	return asset('no-thumbnail.jpg');
 		// }
 		// return $this->thumbnail;


 		if (!$this->thumbnail) {
            return asset('thumbnail/no-thumbnail.jpg');
        }
        return asset('thumbnail/'.$this->thumbnail);

 		//return !$this->thumbnail ? asset('no-thumbnail.jpg') : asset('thumbnail/'.$this->thumbnail);
 	} 
}
