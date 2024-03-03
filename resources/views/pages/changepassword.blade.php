@extends('layout.layoutdashboard')
@section('contentdashboard')
<div class="max-w-screen-xl p-5">
    <div class="font-semibold">
        Ubah  <a href="/ubahprofile"><i class="bi bi-pencil-square"></i></a>
     </div>
    </div>
<section class="max-w-[500px] mx-auto mt-10">
    <form action="/ubahpassword" method="POST">
        @csrf
    <div class="max-[480px]:w-full">
        <div class="bg-white rounded-md shadow-md ">
            <div class="flex flex-col px-4 py-4 ">
                <h5 class="text-3xl text-center text-black font-myfont">Change Your Password</h5>
                <h5>Old Password</h5>
                <input type="password" class="py-1 rounded-md" name="password">
                <h5>New Password</h5>
                <input type="password" class="py-1 rounded-md" name="new_password">
                <h5>Confirm Password</h5>
                <input type="password" class="py-1 rounded-md" name="con_password">
                <button type="submit" class="py-2 mt-4 text-white rounded-md bg-green-700">Perbaharui</button>
            </div>
        </div>
    </div>
</form>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
