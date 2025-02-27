<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        input:focus {
            outline: none;
        }
    </style>
</head>
<body class="bg-gray-300 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-24">
        </div>
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-600">Login</h2>
        <form class="forms" action="{{ route('login.validate') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700">Email ID</label>
                <div class="flex items-center border-b border-gray-300 py-2">
                    <i class="fa fa-envelope text-gray-400"></i>
                    <input type="email" name="email" placeholder="Enter your email ID" class="ml-4 flex-1 bg-transparent text-gray-700 focus:outline-none">
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Password</label>
                <div class="flex items-center border-b border-gray-300 py-2">
                    <i class="fa fa-lock text-gray-400"></i>
                    <input type="password" name="password" id="password" placeholder="Enter your password" class="ml-4 flex-1 bg-transparent text-gray-700 focus:outline-none">
                </div>
            </div>
            <button type="submit" class="w-full bg-gray-600 text-white py-2 rounded-lg mt-4">Submit</button>
            <div class="text-center mt-4">
                <a href="{{ route('register.index') }}" class="text-gray-600 hover:text-gray-900">Register</a>
            </div>
        </form>
    </div>
</body>
</html>