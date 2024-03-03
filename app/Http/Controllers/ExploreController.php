<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentar;
use App\Models\LikeFoto;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function getdata(Request $request){
        if($request->cari !== 'null'){
            $explore = Foto::with(['like_foto', 'komentar'])->withCount(['like_foto','komentar'])->where('judul_foto','like','%'.$request->cari.'%')->orderBy('id', 'DESC')->paginate(4);
        } else {
            $explore = Foto::with(['like_foto', 'komentar'])->withCount(['like_foto','komentar'])->orderBy('id', 'DESC')->paginate(4);
        }
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
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


    public function getdatadetail(Request $request, $id) {
        $datadetailfoto = Foto::with('users')->where('id', $id)->firstOrFail();
        $like = Foto::with(['like_foto','komentar'])->withCount(['like_foto','komentar'])->where('id', $id)->first();
        return response()->json([
            'datadetailfoto' => $datadetailfoto,
            'jumlahdata'    => $like,
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

}

