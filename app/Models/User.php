<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Album;
use App\Models\Komentar;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'alamat',
        'tanggal_lahir',
        'pictures'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function foto(){
        return $this->hasMany(Foto::class, 'user_id', 'id');
    }

    public function like_foto(){
        return $this->hasMany(LikeFoto::class,'user_id', 'id');
    }

    public function komentar() {
        return $this->hasMany(Komentar::class,'user_id', 'id');
    }
    public function album() {
        return $this->hasMany(Album::class,'user_id', 'id');
    }
}
