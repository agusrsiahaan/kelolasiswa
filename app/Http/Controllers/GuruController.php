<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function profile($id)
    {
    	$guru = Guru::findOrFail($id);
    	return view('guru.profile', compact('guru'));
    }
}
