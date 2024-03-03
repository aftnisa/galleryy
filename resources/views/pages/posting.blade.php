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
                <div class="font-semibold">
                    Album
                </div>
                <div class="font-semibold text-lime-500">
                    Foto
                </div>
            </div>
            <section class="max-w-screen-xl mt-5">
                @csrf
                    <div class="flex flex-wrap flex-container" id="datadetailsya">
                    </div>
            </section>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profile.js"></script>
@endpush
