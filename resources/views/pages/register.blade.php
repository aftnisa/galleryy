@extends('layout.layoutindex')
@section('content')
<section>
    <div class="flex justify-center">
        <div class="bg-white rounded-xl  max-w-screen-xl w-1/3 mx-auto mt-10 p-10 border border-black">
            @if ($message = Session::get('success'))
            <div id="alert-1" class="flex max-w-screen-md mx-auto items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="text-sm font-medium ms-3">
                    {{ $message }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            @endif
            <form action="/registerd" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="font-bold text-4xl text-center gap-1">Register</div>
                <div class="mt-5">
                    <div class="flex flex-col mt-6">
                        <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="text" name="email" placeholder="Email"/>

                        <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="text" name="username" placeholder="Username"/>


                        <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="text" name="namalengkap" placeholder="Nama Lengkap"/>

                        <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="text" name="alamat" placeholder="Alamat"/>

                        <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="password" name="password" placeholder="Password"/>
                        @error('password')
                        <span class="font-sm p-2 mb-4 text-sm text-red-700 rounded-lg">{{ $message }}</span>
                        @enderror

                        <input type="file" name="pictures" id="name" class="bg-gray-50 mt-3 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block
                        w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">

                        <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="date" name="tanggallahir" />

                        <button type="submit" class="bg-blue-500 mt-2 w-full rounded-full text-white py-3 inline-flex justify-center gap-4">Register</button>
                            <p class="text-center">OR</p>
                        <a href="/login" class="bg-green-500 w-full text-center rounded-full text-white py-3">Login</a>
                    </div>
                </div>
            </form>
        </div>
     </div>
</section>
@endsection
