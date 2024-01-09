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
<div></div>
<div class="bg-white p-8 rounded shadow-md w-96">
    <div class="flex justify-center items-center text-center">
        <img src="{{ asset('logo/LOGO.png') }}" alt="Logo" class="mb-6">
    </div>
    <h2 class="text-2xl font-semibold mb-6">Login</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('login')}}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password"
                   class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" id="remember" name="remember" class="text-blue-500">
            <label for="remember" class="text-gray-600 text-sm ml-2">Remember me</label>
        </div>

        <button type="submit" class="flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 block w-full">
            Log in <x-ri-login-box-line class="h-4 w-4 ml-3"/>
        </button>
    </form>
    <div class="mt-2">
        <p class="text-gray-600 text-sm">
            <a href="{{ route('forgot-password-view') }}" class="text-blue-500">Forgot Password?</a>
        </p>
    </div>
    <div class="mt-4 ">
        <p class="text-gray-600 text-sm">Don't have an account? <a href="/register" class="text-blue-500">Create
                Account</a></p>
    </div>

@include('footer')
