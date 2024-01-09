<!doctype html>
<html lang="en">
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
    <div class="flex justify-center items-center text-center">
        <img src="{{ asset('logo/LOGO.png') }}" alt="Logo" class="mb-6">
    </div>

    <h2 class="text-2xl font-semibold mb-6">New Password</h2>
    <p class="text-gray-600 text-sm mb-6">Enter your new password. If you have arrived at this screen by mistake, return
        to the login page.</p>

    <form method="POST" action="{{ route('resetPasswordLogic', ['token' => $token, 'email' => $email]) }}">
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


        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
            <input type="password" id="password" name="password" placeholder="Create Password"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-600 text-sm font-medium mb-2">Confirm
                Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   placeholder="Confirm Password"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>


        <button type="submit" class="flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 block w-full">
            Create Password <x-carbon-password class="h-4 w-4 ml-3"/>
        </button>
    </form>

    <p class="mt-4 text-sm text-gray-600 flex items-center">
        <a href="{{ route('loginView') }}" class="text-blue-500 hover:underline flex items-center">
            Back to login <x-heroicon-o-arrow-long-left class="h-4 w-4 ml-1"/>
        </a>
    </p>
@include('footer')
