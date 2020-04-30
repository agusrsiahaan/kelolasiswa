<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Siswa;
use App\User;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$siswa = Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
    	}else{
    		$siswa = Siswa::all();
    	}
    	return view('siswa.index', [
    		'siswa' => $siswa
    	]);
    }

    public function create(Request $request)
    {
    	
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan.' '.$request->nama_belakang;
        $user->email = $request->email;
        $user->password = bcrypt('siswa');
        $user->remember_token = str_random(60);
        $user->save();

        //Insert table siswa
        $request->request->add(['user_id'=> $user->id]);
        $siswa = Siswa::create($request->all());
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
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return Redirect::back()->with('sukses','Data berhasil diubah!');
    }

    public function delete($id)
    {
    	$siswa = Siswa::findOrFail($id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('hapus', 'Data berhasil dihapus!');
    }

    public function profile($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view ('siswa.profile', compact('siswa'));
    }


}
