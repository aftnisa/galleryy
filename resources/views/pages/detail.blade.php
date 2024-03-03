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
                            <img src="/assets/jaemin.jpg" alt="" class="w-[50px] h-[50px] rounded-full">
                        </div>
                        <div class="flex flex-col">
                            <div class="font-semibold" id="username">
                                {{-- na.jaemin0813 --}}
                            <div class="text-[12px] text-slate-400" id="tanggalunggah">
                                18-01-2024
                            </div>
                        </div>
                        </div>
                      </div>
                        </div>
                    </div>
                        <div class="items-center px-10">
                            <div class=" flex flex-col p-3 gap-3">
                                <div class="font-semibold text-[24px]" id="judulfoto">
                                    {{-- Macarons --}}
                                </div>
                                <div id="deskripsifoto">
                                    {{-- Macaron (macaron; bahasa Inggris: /ˌmækəˈrɒn/ mak-ə-ron;[1][2] bahasa Prancis: [makaʁɔ̃]) adalah biskuit yang dibuat dengan putih telur,
                                    tepung gula, gula rafinasi, tepung almon, dan pewarna makanan. Macaron adalah biskuit berbentuk bulat kecil, aneka warna, renyah di luar,
                                    namun bagian tengahnya terdapat krim lembut yang lumer di mulut. --}}

                                </div>
                        </div>
                        </div>
                    <div class="font-semibold">
                        Komentar
                    </div>
                    @csrf
                    <div class="h-48 w-full overflow-y-scroll scrollbar-hidden" id="listkomentar">
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="py-3 p-3">
                            <input type="text" name="textkomentar" id="textkomentar" class="rounded-full h-[44px] px-5 w-[363px] border border-black" placeholder="Tambahkan Komentar">
                        </div>
                        <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4
                        focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600
                        dark:hover:bg-green-700 dark:focus:ring-green-800" onclick="kirimkomentar()">Send</button>
                    </div>
                </div>
           </div>
    </div>
    </div>
 </section>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
@push('footerjsexternal')
    <script src="/javascript/exploredetail.js"></script>
@endpush
