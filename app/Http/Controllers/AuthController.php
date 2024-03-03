<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        return view("pages.register");
    }

    public function registerd(Request $request) {
        $request->validate([
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'namalengkap' => 'required',
            'alamat' => 'required',
            'password'=> 'required|min:6',
            'tanggallahir' => 'required',
            'pictures' => 'required'
        ]);

        $file_foto = $request->file('pictures');
        $extensi_foto = $file_foto->extension();
        $nama_foto = 'user-'.date('dmyhis').'.'.$extensi_foto;
        $file_foto->move(public_path('/fotoprofile'), $nama_foto);

        $datastore = [
            'email' => $request->email,
            'username' => $request->username,
            'nama_lengkap' => $request->namalengkap,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'tanggal_lahir' => $request->tanggallahir,
            'pictures' => $nama_foto,
        ];
        User::create($datastore);
        return redirect('/register')->with('success','Data Berhasil Di Simpan');
    }

    public function auth(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email,'password'=> $request->password])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('error','Email atau Password Salah');
        }
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
