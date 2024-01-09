<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha384-rBpamB9+Ql4L4N6zmNUbvrV63a4eXBegnPamv9Ilnl9AP3zSnNv1cQOfOXUnx9a" crossorigin="anonymous">

    @vite('resources/css/app.css')
    <style>
        header {
            background: linear-gradient(to bottom, #254987, #141F33);
            padding-bottom: 75px;
            padding-top: 75px;
        }

        a:hover {
            background-color: #254987;

        }

    </style>
    <title>Task-app</title>
</head>
<body class="bg-gray-100 h-screen flex">

<header class="fixed top-0 left-0 h-screen w-64 text-white flex flex-col justify-between ">

    <div class="flex justify-center items-center ">
        <img src="{{ asset('logo/LOGO.png') }}" alt="Logo" class="mb-6">
    </div>

    <div>
        <ul class="w-full">
            <li><a href="#" class="flex  py-4 pl-6">
                    <x-heroicon-o-home class="h-6 w-6 mr-3"/>
                    Home</a></li>
            <li><a href="#" class="flex py-4 pl-6   ">
                    <x-bx-task class="h-6 w-6 mr-3"/>
                    My Tasks</a></li>
            <li><a href="#" class="flex  py-4 pl-6  ">
                    <x-feathericon-settings class="h-6 w-6 mr-3"/>
                    Settings</a></li>
            <li><a href="#" class="flex  py-4 pl-6 ">
                    <x-heroicon-o-users class="h-6 w-6 mr-3"/>
                    All users</a></li>
            <li><a href="{{route('logout')}}" class="flex py-4 pl-6  ">
                    <x-tabler-logout class="h-6 w-6 mr-3"/>
                    Logout</a></li>
        </ul>
    </div>

    <div>
        @if (auth()->check())
            <a href="#">
                <div class="list-none flex items-center pl-6">
                    <div class="w-9 h-9 rounded-full overflow-hidden border-2 border-white">
                        <img src="{{ asset('public/profile_image' . $authUser->profile_image) }}" class="w-full h-full object-cover" alt="Profile Picture">
                    </div>
                    <div class="text-white ml-3">
                        <strong>{{ $authUser->first_name }} {{ $authUser->last_name }}</strong>
                    </div>
                </div>
            </a>
        @endif
    </div>

</header>


</body>
</html>
