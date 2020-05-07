<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Post;
use App\Mail\NotifPendaftaranSiswa;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
    	return view('sites.home', compact('posts'));
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

        \Mail::to($user->email)->send(new NotifPendaftaranSiswa);

        // \Mail::raw('Selamat Datang '. $user->name, function($message) use ($user){
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat anda sudah terdaftar disekolah kami');
        // });

    	return redirect('/')->with('sukses', 'Data berhasil dikirim!');
    }
}
