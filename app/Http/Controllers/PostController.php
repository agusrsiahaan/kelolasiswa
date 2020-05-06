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

    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {
        // $post = Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'user_id' => auth()->user()->id,
        // ]);

        //dd($request->all());

        $post = Post::create($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('thumbnail/', $request->file('thumbnail')->getClientOriginalName());
            $post->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $post->user_id = auth()->user()->id;
            $post->save();
        }

        return redirect('/posts')->with('sukses', 'Post berhasil di submit');
    }
}
