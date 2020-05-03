<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Guru;

class DashboardController extends Controller
{
    public function index()
    {	
    	$siswa = Siswa::all();
    	$guru = Guru::all();
    	$jumlah_siswa = $siswa->count();
    	$jumlah_guru = $guru->count();
    	return view('dashboard.index', compact('jumlah_siswa', 'jumlah_guru'));
    }

    public function viewtopfive()
    {
    	$siswa = Siswa::all();
    	$siswa->map(function($s){
    		$s->rataNilai = $s->rataNilai();
    		return $s;
    	});
    	$siswa = $siswa->sortByDesc('rataNilai')->take(5);
    	return view('dashboard.viewtopfive', compact('siswa'));
    }
}
