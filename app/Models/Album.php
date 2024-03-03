<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_album',
        'deskripsi',
        'tanggal_dibuat',
        'pictures',
        'user_id',
    ];
    protected $table ='album';
    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function foto() {
        return $this->belongsTo(Foto::class,'foto_id','id');
    }
}
