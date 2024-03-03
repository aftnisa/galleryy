@extends('layout.layoutdashboard')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('contentdashboard')
<section>
    <div class="max-w-screen-xl">
        <div class="flex flex-col">
            <div class="mx-auto overflow-hidden p-3">
                <img src="" alt="" class="rounded-full w-52 h-52" id="myprofile">
            </div>
            <div class="mx-auto font-semibold" >
                <span id="username"></span>
                <a href="/ubahprofile" class="bi bi-pencil-square"></a>
            </div>

            <div class="p-3">
                <table class="w-1/2">
                    <tr class="text-left">
                        <td class="font-semibold">Nama Lengkap</td>
                        <td id="nama"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="font-semibold">Tanggal Lahir</td>
                        <td id="tanggallahir"></td>
                    </tr>
                    <tr class="text-left">
                        <td class="font-semibold">Email</td>
                        <td id="email"></td>
                    </tr>
                </table>
            </div>
            <hr class="border border-black">
        </div>
        <div class="flex flex-col h-80 p-3 gap-5">
            <div class="flex p-3 gap-3">
                <div class="font-semibold text-lime-500">
                    Album
                </div>
                <div class="font-semibold">
                   <a href="/mypost"> Foto </a>
                </div>
            </div>
            <div class="max-w-screen-xl flex">
                <div class="m-3 mx-auto">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                        <div class="mt-16 px-20">
                            <i class="bi bi-plus text-9xl"></i>
                        </div>
                    </button>
                </div>
            </div>

                     <section class="max-w-screen-xl mt-5">
                        <div class="flex flex-wrap flex-container ">
                            @foreach ($tampilalbum as $album)
                           <div class="w-1/4 flex-width">
                               <div class="flex flex-col p-3">
                                <a href="{{ route('album.show', $album->id) }}">
                                    <div class="w-[285px] h-[285px] overflow-hidden">
                                        <img src="{{ asset('sampulalbum/' . $album->pictures) }}" alt="">
                                    </div>
                                </a>
                                   <div class="flex justify-between items-center">
                                       <div class="flex flex-col ">
                                           <div class="font-semibold">
                                            {{ $album->nama_album }}
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endforeach
                        </div>
                    </section>



        </div>
    </div>
</section>
<section>
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Tambah Album
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <form action="/tambah_album" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
            @csrf
              <div class="grid gap-4 mb-4 grid-cols-2">
                  <div class="col-span-2">
                    <input type="text" name="nama_album" id="name" class="bg-gray-50 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block
                        w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Album" required="">

                    <input type="text" name="deskripsi" id="name" class="bg-gray-50 mt-3 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block
                        w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi" required="">

                    <input type="file" name="pictures" id="name" class="bg-gray-50 mt-3 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block
                        w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">

                    <input type="date" name="tanggal_dibuat" id="name" class="bg-gray-50 mt-3 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block
                        w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">

                    <button type="submit" class="text-white mt-3  ml-[307px] inline-flex items-center bg-green-400
                        hover:bg-green-400 focus:ring-4 focus:outline-none focus:bg-green-400 font-medium
                        rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-400 dark:hover:bg-green-400
                        dark:focus:ring-green-400">Buat
                        </button>
                  </div>
          </form>
      </div>
  </div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profile.js"></script>
@endpush
