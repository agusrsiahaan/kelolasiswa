<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = [];

    public function getJenisKelaminAttribute($attribute)
    {
    	return [
    		'L' => 'Laki-laki',
    		'P' => 'Perempuan',
    	][$attribute];
    }

    public function getAgamaAttribute($attribute)
    {
    	return [
    		'I' => 'Islam',
    		'KP' => 'Kristen Protestan',
    		'KK' => 'Kristen Katolik',
    		'H' => 'Hindu',
    		'B' => 'Budha',
    		'K' => 'Kong Hu Cu',

    	][$attribute];
    }
}
