<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Siswa;
use App\User;

class PostController extends Controller
{
    public function index()
    {	
    	$siswa = Siswa::all();
    	$posts = Post::all();
    	$users = User::all();
    	return view('posts.index', compact('posts', 'siswa'));
    }

    public function singlepost($slug)
    {
    	$posts = Post::where('slug','=', $slug)->first();
    	return view('sites.singlepost', compact('posts'));
    }
}
