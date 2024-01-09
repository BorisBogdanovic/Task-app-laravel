<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans">
<div class="max-w-2xl mx-auto p-4">
    <div class="bg-green-500 text-white p-4">
        <h2 class="text-2xl font-bold">New User Registered</h2>
    </div>

    <div class="mt-4">
        <p class="text-lg">Hello Admin,</p>
        <p class="mt-2">A new user has successfully registered with the following details:</p>

        <ul class="list-disc pl-6 mt-2">
            <li><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
            <li><strong>Username:</strong> {{ $user->username }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            @if ($user->is_admin)
                <li><strong>Role:</strong> Administrator</li>
            @else
                <li><strong>Role:</strong> Standard User</li>
            @endif
        </ul>

        <p class="mt-4">Thank you for managing our user registrations.</p>
    </div>

    <div class="mt-8 text-gray-500 text-sm">
        <p>This is an automated notification. Please do not reply to this email.</p>
    </div>
</div>
</body>
</html>
