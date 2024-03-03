<?php

namespace App\Models;

use App\Models\User;
use App\Models\Album;
use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'tanggal_unggah',
        'lokasi_file',
        'album_id',
        'user_id',
    ];
    protected $table ='foto';
    //relasi nilai balik ke tabel user
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //relasi ke tabel likefoto
    public function like_foto(){
        return $this->hasMany(Likefoto::class, 'foto_id', 'id');
    }

     //relasi ke tabel comment
     public function komentar(){
        return $this->hasMany(Komentar::class,'foto_id', 'id');
    }

    public function album() {
        return $this->hasMany(Album::class,'user_id', 'id');
    }

    // public function kategori() {
    //     return $this->hasMany(Kategori::class,'kate', 'id');
    // }
}
