<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Siswa;
use App\User;
use App\Mapel;

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
        $this->validate($request, [
            'nama_depan'    => 'required|min:5',
            'nama_belakang' => 'required',
            'email'         => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'avatar'        => 'mimes:jpeg,jpg,png,gif|required|max:10000', 
        ]);
    	
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
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
    	$siswa = Siswa::findOrFail($id);
        $user = User::findOrFail($id);
    	return view('siswa.edit', compact('siswa', 'user'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'email'         => 'required|email',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'avatar'        => 'required|mimes:jpeg,jpg,png,gif|required|max:10000', 
        ]);

    	$siswa = Siswa::findOrFail($id);
    	$siswa->update($request->all());

        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->save();

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

        $user = Siswa::findOrFail($id);

    	return redirect('/siswa')->with('hapus', 'Data berhasil dihapus!');
    }

    public function profile($id)
    {
        $siswa = Siswa::findOrFail($id);
        $mapel = Mapel::all();
        return view ('siswa.profile', compact('siswa', 'mapel'));
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = Siswa::findOrFail($idsiswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel_id)->exists()) {
            return redirect('siswa/'.$idsiswa.'/profile')->with('error', 'Nilai sudah ada!');
        }
        $siswa->mapel()->attach($request->mapel_id, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses', 'Nilai berhasil ditambah!');
    }


}
