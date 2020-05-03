<?php
use App\Siswa;

function ranking5Besar()
{
	$siswa = Siswa::all();
	$siswa->map(function($s){
		$s->rataNilai = $s->rataNilai();
		return $s;
	});
	$siswa = $siswa->sortByDesc('rataNilai')->take(5);
	return view('dashboard.viewtopfive', compact('siswa'));
}

?>
