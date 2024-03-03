@extends('layout.layoutindex')
@section('content')
<section>
        <div class="bg-white rounded-xl  max-w-screen-xl w-1/3 mx-auto mt-10 p-10 border border-black ">
            <form action="/auth" method="POST">
                @csrf
                    <div class="font-bold text-4xl text-center gap-1">Login</div>
                        <div class="flex flex-col mt-4">
                            Email
                            <input class="border border-black w-full py-2 rounded-xl mt-2 px-4" type="email" name="email"/>
                        <div class=" mt-4">
                            Password
                            <input class="border border-black w-full py-2 rounded-xl mt-2 px-4" type="password" name="password"/>
                        </div>

                        <div class=" gap-4 mt-4">
                            <button type="submit" class="bg-green-500 w-full rounded-full text-white py-3">Login</button>
                        </form>
                                <p class="text-center">OR</p>
                            <a href="/register" class="bg-blue-500 mt-2 w-full rounded-full text-white py-3 inline-flex justify-center gap-4">Register</a>
                        </div>
                    </div>
        </div>
</section>
@endsection
