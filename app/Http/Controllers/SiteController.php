<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;

class SiteController extends Controller
{
    public function home()
    {
    	return view('sites.home');
    }

    public function about()
    {
    	return view('sites.about');
    }

    public function register()
    {
    	return view('sites.register');
    }

    public function postregister(Request $request)
    {
    	$user = new User;
    	$user->role = 'siswa';
    	$user->name = $request->nama_depan.' '.$request->nama_belakang;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->remember_token = str_random(60);
    	$user->save();

    	$request->request->add(['user_id' => $user->id]);
    	$siswa = Siswa::create($request->all());

    	return redirect('/')->with('sukses', 'Data berhasil dikirim!');
    }
}
