@extends('layout.layoutdashboard')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('contentdashboard')
<section>
    <div class="max-w-screen-xl mx-auto">
        <div class="flex justify-between mt-10">
        <div class="w-1/3 p-4">
           <div class="w-[391px] h-[382px]  overflow-hidden">
                <img src="" alt="" class="w-full" id="fotodetail">
           </div>
        </div>
           <div class="w-2/3  p-4">
                <div class="flex flex-col">
                    <div class="flex justify-between">
                      <div class="flex gap-2">
                        <div class="overflow-hidden">
                            <img class="w-[50px] h-[50px] rounded-full" id="fotoprofile">
                        </div>
                        <div class="flex flex-col">
                            <div class="font-semibold" id="username">
                            <div class="text-[12px] text-slate-400" id="tanggalunggah">
                            </div>
                        </div>
                        </div>
                      </div>

                        <div class="px text-3xl">
                            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                              </button>

                              <!-- Dropdown menu -->
                              <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                      <a href="/editdes/{{ $data->id }}" class="block px-4 py-2 gap-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <span class="bi bi-pencil-square text-xl"></span>
                                        <span>Edit</span></a>
                                      </li>
                                    <li>
                                      <a href="/delete/{{ $data->id }}" class="block px-4 py-2 gap-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <span class="bi bi-trash3-fill text-xl"></span>
                                        <span>Hapus</span></a>
                                    </li>
                                  </ul>
                              </div>
                        </div>
                        </div>
                    </div>
                        <div class="items-center px-10">
                            <div class=" flex flex-col p-3 gap-3">
                                <div class="font-semibold text-[24px]" id="judulfoto">
                                </div>
                                <div id="deskripsifoto">
                                </div>
                            </div>
                        </div>

                    <div class="font-semibold">
                        Komentar
                    </div>
                    @csrf
                    <div class="h-48 w-full overflow-y-scroll" id="listkomentar">
                        <div class="flex gap-3 mt-4">
                            {{-- <div>
                                <img src="" class="w-[50px] h-[50px] rounded-full" id="yourprofile">
                            </div> --}}
                            <div class="flex flex-col">
                                <div class="font-semibold" id="yourusername"></div>
                                <div class="text-[12px] text-slate-400" id="tanggalkomen"></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="py-3 p-3">
                            <input type="text" name="textkomentar" id="" class="rounded-full h-[44px] px-5 w-[363px] border border-black" placeholder="Tambahkan Komentar">
                        </div>
                        <div>
                            <button class="bg-lime-500 rounded-2xl w-[70px] h-[44px] p-2 px-4 text-white border border-black" onclick="kirimkomentar()">
                                Send
                            </button>
                        </div>
                    </div>
                </div>
           </div>
    </div>
    </div>
 </section>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
@push('footerjsexternal')
    <script src="/javascript/exploredetailsya.js"></script>
@endpush
