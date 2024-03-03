<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    use HasFactory;

    protected $table = "like_foto";
    protected $fillable = [
        'foto_id',
        'user_id',
        'tanggal_like',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function foto() {
        return $this->belongsTo(Foto::class,'foto_id','id');
    }
}
