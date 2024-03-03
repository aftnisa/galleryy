@extends('layout.layoutdashboard')
@section('contentdashboard')
<section>
    <div class="max-w-screen-md p-5">
        <div class="font-semibold">
            Upload Foto
         </div>
     </div>
      <div class="max-w-screen-xl mx-auto p-3">
        <div class="flex gap-3 p-3">
            <div class="w-2/5">
                <form action="/uploadfoto" method="POST" enctype="multipart/form-data">
                    @csrf
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6">
                        <!-- Photo File Input -->
                        <input type="file" name="foto" class="hidden" x-ref="photo" x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                        ">
                        <div class="text-center">
                            <!-- Current Profile Photo -->
                            <div class="" x-show="! photoPreview">
                                <img class="w-[500px] h-[350px] m-auto shadow">
                            </div>
                            <!-- New Profile Photo Preview -->
                            <div class="" x-show="photoPreview">
                                <span class="block w-[470px] h-[350px] m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                </span>
                            </div>
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                                Select New Photo
                            </button>
                        </div>
                    </div>
            </div>
            <div class="w-2/3">
                <div class="flex flex-col">
                    <div>
                        <input type="text" name="judul" id="" class="w-[579px] h-[43px] border border-black px-4" placeholder="Judul">
                    </div>
                    <div class="mt-3">
                        <input type="text" name="deskripsi" id="" class="w-[579px] h-24 border border-black px-2  " placeholder="Deskripsi">
                    </div>
                    <div class="mt-3">
                       <select class="w-[579px] h-10 border border-black px-2  " name="album" id="">
                        @foreach ($albums as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_album }}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="flex mr-10 justify-end mr-44 px-44 p-3">
                        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
                         focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600
                         dark:hover:bg-green-700 dark:focus:ring-green-800">Send</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </form>
 </section>
@endsection
