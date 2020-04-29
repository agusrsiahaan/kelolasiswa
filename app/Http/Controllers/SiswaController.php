<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    public function edit($id)
    {
    	$siswa = Siswa::findOrFail($id);
    	return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
    	$siswa = Siswa::findOrFail($id);
    	$siswa->update($request->all());
    	return Redirect::back()->with('sukses','Data berhasil diubah!');
    }
}
