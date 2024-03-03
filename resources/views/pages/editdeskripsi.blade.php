@extends('layout.layoutdashboard')
@section('contentdashboard')
<section >
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
    <form action="/editdeskripsi/{{ $data->id }}" method="POST">
        @csrf
    <div class="max-w-screen-xl">
        <div class="flex justify-between p-3">
            <div class="w-1/3">
                <div class="w-[391px] h-[382px]">
                    <img src="{{ asset('assets/' .$data->lokasi_file) }}" alt="">
                </div>
            </div>
            <div class="w-2/3">
                <div class="flex flex-col justify-center">
                    <div class="flex flex-col">
                        <div class="p-2">
                            Judul
                        </div>
                        <div>
                            <input type="text" name="judul_foto" id="" class="border border-slate-700 rounded-xl h-9 w-[650px] px-3" value="{{ $data->judul_foto }}">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="p-2">
                            Deskripsi
                        </div>
                        <div>
                            <input type="text" name="deskripsi_foto" id="" class="border border-slate-700 rounded-xl h-32 w-[650px] px-3" value="{{ $data->deskripsi_foto }}">
                        </div>
                    </div>
                    <div class="flex justify-end items-end">
                        <div class="flex mr-[150px] justify-end px-48 p-3 gap-4">
                            <a href="/detailsya/{{$data->id}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
                         focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600
                         dark:hover:bg-green-700 dark:focus:ring-green-800">Cancel</a>

                            <button type="submit " class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
                         focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600
                         dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection

