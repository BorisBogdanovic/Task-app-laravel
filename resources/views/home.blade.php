<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha384-rBpamB9+Ql4L4N6zmNUbvrV63a4eXBegnPamv9Ilnl9AP3zSnNv1cQOfOXUnx9a" crossorigin="anonymous">

    @vite('resources/css/app.css')
    <title>Task-app</title>
</head>
<body class="bg-gray-100 h-screen flex">

<div class="flex">
    <div>
        @include('header')
    </div>
    <div class="flex-1 bg-gray-100 p-8">
        <div class="container">
            <div class="flex flex-col space-x-4">
                @foreach($tasks as $task)
                    <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-md p-6 mb-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $task->responsible_person }}</h2>
                        <p class="text-gray-600 mb-4">{{ $task->description }}</p>
                        <div class="flex items-center text-gray-500">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>{{ $task->deadline }}</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <span class="text-xs bg-gray-200 px-2 py-1 rounded-md">{{ $task->status->name }}</span>
                            <span
                                class="text-xs bg-blue-200 ml-2 px-2 py-1 rounded-md">{{ $task->priority->name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


</body>
</html>
