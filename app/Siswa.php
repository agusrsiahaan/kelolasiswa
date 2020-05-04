<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = ['email'];

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

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/admin.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rataNilai()
    { 

        // if($this->mapel->isNotEmpty()){
       
        // }

        // //jika belum ada return 0
        // return 0;
        // }


        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            $total = $total + $mapel->pivot->nilai;
            $hitung++;
        }

        //jika siswa baru ditambah dan blm memiliki nilai maka rata2 nilai 0
        return $total != 0 ? round($total/$hitung) : $total;
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

    public function totalsiswa()
    {
        return $this->count();
    }
}
