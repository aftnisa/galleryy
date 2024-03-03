<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use App\Models\Komentar;
use App\Models\LikeFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getdataprofile(Request $request) {
        $data = auth()->user();
        return response()->json([
            'datauser' => $data,
        ],200);
    }

    public function getdata(Request $request) {
        $user = auth()->id();
        $explore = Foto::with(['like_foto', 'komentar'])->withCount(['like_foto', 'komentar'])->orderBy('id', 'DESC')->
        where('user_id',$user)->paginate(4);
        return response()->json([
            'datapost' => $explore,
            'statuscode' => 200,
            'id' => auth()->user()->id,
            'idUser' => auth()->user()->id
        ]);
    }

    public function likefotos(Request $request){
        try {
            $request->validate([
                'fotoid'=> 'required'
            ]);
            $existingLike = LikeFoto::where('foto_id',$request->fotoid)->where('user_id', auth()->user()->id)->first();
            if(!$existingLike){
                $datasimpan = [
                    'foto_id' => $request->fotoid,
                    'user_id' => auth()->user()->id
                ];
                LikeFoto::create($datasimpan);
            } else {
                LikeFoto::where('foto_id', $request->fotoid)->where('user_id', auth()->user()->id)->delete();
            }

            return response()->json('Data Berhasil di Simpan', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function getdatadetailsya(Request $request, $id) {
        $datadetailfoto = Foto::with('users', 'like_foto', 'komentar')->withCount(['like_foto', 'komentar'])->where('id', $id)->firstOrFail();
        return response()->json([
            'datadetailfoto' => $datadetailfoto
        ], 200);
    }

    public function ambildatakomentar(Request $request, $id) {
        $ambilkomentar = Komentar::with('users')->orderBy('id', 'DESC')->where('foto_id', $id)->get();
        return response()->json([
            'datakomentar' => $ambilkomentar,
        ], 200);
    }

    public function kirimkomentar(Request $request) {
        try{
            $request->validate([
                'fotoid' => 'required',
                'isi_komentar' => 'required'
            ]);
            $datakomentar = [
                'user_id' => auth()->user()->id,
                'foto_id' => $request->fotoid,
                'isi_komentar' => $request->isi_komentar,
                'tanggal_komentar' => date('yy-m-d')
            ];
            Komentar::create($datakomentar);
            return response()->json([
                'data' => 'Data Berhasil Disimpan',
                // 'requenya' => $request->all()
            ],200);
        } catch (\Throwable $th) {
            return response()->json('Data Komentar Gagal Disimpan', 500);
        }
    }

    public function update(Request $request) {
        $user = auth()->user();
        if($request->hasFile('pictures')){
            $picture = $request->file('pictures');
            $extensi = $picture->getClientOriginalExtension();
            $filename = 'users' . now()->timestamp .'.'. $extensi;
            $picture->move('fotoprofile', $filename);
            $user->pictures = $filename;
        } else {
            $picture = $user->pictures;
        }
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->save();
        return redirect()->back();
    }

    public function tambah_album(Request $request) {
        $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
            'tanggal_dibuat' => 'required'
        ]);
        $file_foto = $request->file('pictures');
        $extensi_foto = $file_foto->extension();
        $nama_foto = 'album-'.date('dmyhis').'.'.$extensi_foto;
        $file_foto->move(public_path('/sampulalbum'), $nama_foto);

        $dataalbum = [
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
            'pictures' => $nama_foto,
            'tanggal_dibuat' => $request->tanggal_dibuat,
            'user_id' => Auth::user()->id
        ];
         Album::create($dataalbum);
        return redirect('/profile');
    }

    public function album(Request $request) {
        $tampilalbum = Album::with('foto')->where('user_id', auth()->user()->id)->get();
        return view('pages.profile', compact('tampilalbum'));
    }

    public function show($id) {
        $user = auth()->user();
        $fotos = Foto::where('album_id', $id)->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();
        $album = Album::with('foto')->findOrFail($id);
        return view('pages.isi_album', compact('album', 'fotos', 'user'));
    }

    public function ubahpassword(Request $request) {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'con_password' => 'required'
        ]);
        $user = Auth::user();
        //confrim
        if(Hash::check($request->password, $user->password)) {
            $user->update(['password' => Hash::make($request->new_password)]);
            return redirect('/profile');
        }
    }
    public function updatedeskripsi(Request $request, $id) {
       $data = Foto::find($id);
       $data->judul_foto = $request->judul_foto;
       $data->deskripsi_foto = $request->deskripsi_foto;
       $data->save();
       return redirect()->back()->with('success','Data Berhasil Disimpan');
    }

    public function tampildata($id) {
        $data = Foto::find($id);
        return view('pages.detailsya', compact('data'));
    }

    public function editdeskripsi($id) {
        $data = Foto::find($id);
        return view('pages.editdeskripsi', compact('data'));
    }

    // public function fotoalbum(Request $request, $id) {
    //     $datafoto = Foto::find($id);
    //     $datafoto->update([
    //         'album_id' => $request->nama_album
    //     ]);
    // }

}
