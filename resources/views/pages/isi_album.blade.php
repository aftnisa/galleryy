@extends('layout.layoutdashboard')
@section('contentdashboard')
<section class="max-w-screen-xl mx-auto mt-5">
    <div class="flex justify-center max-w-screen-md mx-auto">
        <div class="flex flex-col">
            <div class="font-semibold text-xl mx-auto">
                {{ $album->nama_album }}
             </div>
             <div class="font-semibold text-md mx-auto">
                {{ $album->deskripsi }}
             </div>
             <div class="font-sans text-sm mx-auto">
                {{ $album->tanggal_dibuat }}
             </div>
        </div>
     </div>
   <div class="flex flex-wrap flex-container">
    @foreach ($fotos as $foto)
        <div class="w-1/4 flex-width">
            <div class="flex flex-col p-3">
                <div class="w-[285px] h-[285px] overflow-hidden">
                <a href="/detailsya/{{$foto->id}}">
                    <img src="{{asset('/assets/' . $foto->lokasi_file) }}" alt=""></a>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex flex-col ">
                        <div class="font-semibold">
                            {{$foto->judul_foto}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
      </div>
   </section>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

@endsection
