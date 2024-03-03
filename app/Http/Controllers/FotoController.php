<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function upload() {
        $data = [
            'data' => Foto::all(),
            'albums' => Album::where('user_id', Auth::user()->id)->get(),

        ];
        return view('pages.upload', $data);
    }

    public function uploadImage(Request $request) {
        $request->validate ([
            'foto' => 'required|mimes:png,jpg',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $file_foto = $request->file('foto');
        $extensi_foto = $file_foto->extension();
        $nama_foto = 'GS-'.date('dmyhis').'.'.$extensi_foto;
        $file_foto->move(public_path('/assets'), $nama_foto);

        $data_strore = [
            'judul_foto' => $request->judul,
            'deskripsi_foto' => $request->deskripsi,
            'lokasi_file' => $nama_foto,
            'album_id' => $request->album,
            'user_id' => auth()->user()->id
        ];
        Foto::create($data_strore);
        return redirect('/dashboard');
    }

    public function delete($id) {
        $data = Foto::find($id);
        $data->delete();
        return redirect('/dashboard');
    }
}
