@extends('layout.layoutdashboard')
@section('contentdashboard')
<form action="/ubahprofile" method="POST" enctype="multipart/form-data">
    @csrf
<section class="max-w-screen-xl mx-auto mt-10">
        <div class="max-w-screen-xl p-5">
            <div class="font-semibold">
              <a href="/profile"> Ubah Password </a> <a href="/ubahpassword"><i class="bi bi-pencil-square"></i></a>
             </div>
         </div>
        <div class="flex flex-wrap justify-between flex-container">
            <div class="flex flex-col items-center w-2/6 bg-white rounded-md shadow-md max-[480px]:w-full">
                <img src="{{ asset ('fotoprofile/'. auth()->user()->pictures) }}"   alt="" class="rounded-full w-36 h-36">
                <input type="file" name="pictures" id="" class="items-center w-48 h-10 mt-4 border rounded-md">

            </div>
            <div class="w-3/5 max-[480px]:w-[480px]">
                <div class="bg-white rounded-md shadow-md p-16 ">
                    <div class="flex flex-col ">
                        <h5 class="text-3xl text-center font-myfont">Your Profile</h5>
                        <h5>Nama Lengkap</h5>
                        <input type="text" class="py-1 rounded-md" name="nama_lengkap" value="{{ $user->nama_lengkap }}">
                        <h5>Tanggal Lahir</h5>
                        <input type="date" class="py-1 rounded-md" name="tanggal_lahir" value="{{  $user->tanggal_lahir }}">
                        <h5>Email</h5>
                        <input type="text" class="py-1 rounded-md" name="email" value="{{  $user->email }}">
                        <h5>Username</h5>
                        <input type="text" class="py-1 rounded-md" name="username" value="{{ $user->username }}">
                        <h5>Alamat</h5>
                        <input type="text" class="py-1 rounded-md" name="alamat" value="{{ $user->alamat }}">
                        <div  class="mx-auto">
                            <button type="submit" class="py-2 w-36 mt-4 text-white rounded-md bg-green-700">Perbaharui</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
