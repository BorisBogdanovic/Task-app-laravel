<!DOCTYPE html>
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
    <title>Password Reset</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded shadow-md w-96">
    <div class="flex justify-center items-center text-center">
        <img src="{{ asset('logo/LOGO.png') }}" alt="Logo" class="mb-6">
    </div>
    <h2 class="text-2xl font-semibold mb-6">Password Reset</h2>

    <form method="POST" action="{{ route('forgot-password') }}">
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
            <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="Enter Email">
        </div>

        <button type="submit" class="flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 block w-full">
            Send Reset Link <x-bi-send class="h-4 w-4 ml-3"/>
        </button>

    </form>

@include('footer')
