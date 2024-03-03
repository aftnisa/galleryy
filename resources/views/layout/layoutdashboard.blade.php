<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/build.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Jacques+Francois&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>
   
    @stack('cssjsexternal')
    @push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    @endpush
        <title>Document</title>
</head>
<body>
    <nav class="bg-white">
        <div class="flex justify-between max-w-screen-xl mx-auto p-5 items-center">
            <div class="font-myfont text-5xl">
                GS
            </div>
            <div>
               <a href="/dashboard"><p class="text-green-500 font-bold">HOME</p></a>
            </div>
        <form action="/dashboard" method="GET" >
            <div class="flex">
                <input type="text" name="cari" id="" class="h-10 px-6 border border-slate-400 w-[390px]" placeholder="what do you need??">
                <button name="" id="" class="h-10 px-6 w-22 text-white bg-lime-500">search</button>
            </div>
        </form>
            <div>
            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                <span class="sr-only">Open user menu</span>
                <img src="{{ asset ('fotoprofile/'. auth()->user()->pictures) }}" alt="" class="rounded-full w-[50px] h-[50px]">
            </button>

                <!-- Dropdown menu -->
                <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                     <a href="/profile"><span class="bi bi-person-fill">
                            <span>Profile</span></span></a>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                    <li>
                        <a href="/upload" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <span class="bi bi-cloud-arrow-up">
                                <span>Upload</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <span class="bi bi-card-image">
                                <span>Album</span></span>
                        </a>
                    </li>
                    </ul>
                    <div class="py-2">
                    <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        <span class="bi bi-box-arrow-right">
                            <span>Logout</span></span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
     </nav>

     <div class="flex relative justify-center items-center">
        <img src="/assets/haal.jpg" alt="" class="w-[1280px] h-[300px] object-cover">
        <div class="flex absolute flex-col text-center">
            <h1 class="text-[63px] text-white font-myfont">GS</h1>
            <h5 class="text-[60px] text-white font-font2 mb-0.5">Gallery Nisa</h5>
        </div>
    </div>
     </div>
     @yield('contentdashboard')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
@stack('footerjsexternal')
@push('footerjsexternal')
    <script src="/javascript/profile.js"></script>
@endpush
</html>
