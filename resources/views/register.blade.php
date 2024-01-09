<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(to bottom, #254987, #141F33);

        }

    </style>
    <title>Task-app</title>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-semibold mb-6">Register</h2>

    <form method="POST" action="{{ route('registerUser') }}">
        @csrf

        @if($errors->any())
            <div class="mb-4">
                <ul class="text-red-500">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="first_name" class="block text-gray-600 text-sm font-medium mb-2">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter First Name"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-600 text-sm font-medium mb-2">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="username" class="block text-gray-600 text-sm font-medium mb-2">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
            <input type="password" id="password" name="password" placeholder=" Enter Password"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-600 text-sm font-medium mb-2">Confirm
                Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit"
                class="flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 block w-full">
            Register <x-eos-system-re-registered class="h-4 w-4 ml-3" />
        </button>

    </form>
@include('footer')
