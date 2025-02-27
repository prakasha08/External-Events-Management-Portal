    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            input:focus {
                outline: none;
            }
        </style>
    </head>
    <body class="bg-gray-300 h-screen flex items-center justify-center">
        <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-24">
            </div>
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-600">Register</h2>
            <form action="{{ route('login.validate') }}" method="POST">
    @csrf

                <div class="mb-6">
                    <label class="block text-gray-700">Name</label>
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <i class="fa fa-user text-gray-400"></i>
                        <input type="text" name="name" placeholder="Enter your name" class="ml-4 flex-1 bg-transparent text-gray-700 focus:outline-none">
                        </div>
                </div>
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
                        <i class="fa fa-eye text-gray-400 ml-2 cursor-pointer" id="togglePassword"></i>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700">Confirm Password</label>
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <i class="fa fa-lock text-gray-400"></i>
                        <input type="password" name="password_confirmation" id="confirm_password" placeholder="Confirm your password" class="ml-4 flex-1 bg-transparent text-gray-700 focus:outline-none">
                        <i class="fa fa-eye text-gray-400 ml-2 cursor-pointer" id="toggleConfirmPassword"></i>
                    </div>
                </div>
                <script>
                    document.getElementById('togglePassword').addEventListener('click', function () {
                        var passwordField = document.getElementById('password');
                        var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordField.setAttribute('type', type);
                        this.classList.toggle('fa-eye-slash');
                    });

                    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
                        var confirmPasswordField = document.getElementById('confirm_password');
                        var type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                        confirmPasswordField.setAttribute('type', type);
                        this.classList.toggle('fa-eye-slash');
                    });
                </script>
                <script>
                    document.querySelector('form').addEventListener('submit', function(e) {
                        var password = document.getElementById('password').value;
                        var confirmPassword = document.getElementById('confirm_password').value;
                        if (password !== confirmPassword) {
                            e.preventDefault();
                            alert('Passwords do not match.');
                        }
                    });
                </script>
                <button type="submit" class="w-full bg-gray-600 text-white py-2 rounded-lg mt-4">Submit</button>
            </form>
        </div>
    </body>
    </html>
