<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
    	$siswa = Siswa::all();
    	return view('siswa.index', [
    		'siswa' => $siswa
    	]);
    }

    public function create(Request $request)
    {
    	Siswa::create($request->all());
    	return redirect('/siswa')->with('sukses', 'Data berhasil ditambah!');
    }
}
