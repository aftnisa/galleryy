<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;
    protected $table ='komentar';

    protected $fillable = [
        'foto_id',
        'user_id',
        'isi_komentar',
        'tanggal_komentar',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function foto() {
        return $this->belongsTo(Foto::class,'foto_id','id');
    }
}
