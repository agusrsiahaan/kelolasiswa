<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Siswa;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row){
        	//$tanggal_lahir = ($row[5] - 25569) * 86400;
        	if ($key) {
        		Siswa::create([
        			'nama_depan' => $row[1],
        			'user_id' => 0,
        			'nama_belakang' => $row[2],
        			'jenis_kelamin' => $row[3],
        			'agama' => $row[4],
        			'alamat' => $row[5],
        		]);
        	}	
        }
    }
}
