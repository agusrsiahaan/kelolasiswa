<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Siswa;
use App\User;
use App\Mapel;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
            'email'         => 'required|email|unique:users',
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
        $user = User::findOrFail($siswa->user_id);
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
        $user = User::findOrFail($siswa->user_id);

        //delete nilai ketika data siswa dihapus
        $siswa->mapel()->wherePivot('siswa_id', '=', $id)->detach();

    	$siswa->delete($siswa);
        $user->delete($user);

    	return redirect('/siswa')->with('hapus', 'Data berhasil dihapus!');
    }

    public function profile($id)
    {
        $siswa = Siswa::findOrFail($id);
        $mapel = Mapel::all();

        //data chart
        $categories = [];
        $data = [];
        $id_mapel = [];
        $nama_siswa = $siswa->nama_depan.' '.$siswa->nama_belakang;

        foreach ($mapel as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $id_mapel [] = $mp->id;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view ('siswa.profile', compact('siswa', 'mapel', 'categories', 'data', 'nama_siswa', 'id_mapel'));
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

    public function editnilai($id, $id_mapel)
    {
        $siswa = Siswa::findOrFail($id);
        $mapel = Mapel::findOrFail($id_mapel);
        $nilai = $siswa->mapel()->wherePivot('mapel_id', $id_mapel)->first()->pivot->nilai;
        return view('siswa.editnilai', compact('siswa', 'mapel', 'nilai'));
    }

    public function updatenilai(Request $request, $id, $id_mapel)
    {
        $this->validate($request, [
            'nilai'    => 'required|numeric', 
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->updateExistingPivot($request->mapel,['nilai' => $request->nilai]);
        return redirect('siswa/'.$id.'/profile')->with('sukses', 'Nilai berhasil diubah!');
    }

    public function deletenilai($id, $id_mapel)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->detach($id_mapel);
        return redirect()->back()->with('hapus', 'Nilai berhasil dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function export_pdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::LoadView('export.siswapdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function profilsaya()
    {
        $siswa = auth()->user()->siswa;

        $mapel = Mapel::all();

        //data chart
        $categories = [];
        $data = [];
        $id_mapel = [];
        $nama_siswa = $siswa->nama_depan.' '.$siswa->nama_belakang;

        foreach ($mapel as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $id_mapel [] = $mp->id;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('siswa.profilsaya', compact('siswa','nama_siswa', 'categories', 'mapel', 'data'));
    }

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\SiswaImport,$request->file('data_siswa'));
    }

}
