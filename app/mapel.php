<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $table = 'mapel';
    protected $guarded = [];


    public function siswa()
    {
    	return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
}
