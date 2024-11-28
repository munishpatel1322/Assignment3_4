<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Trade Finance Guarantee System</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #1e293b, #3b82f6); /* Consistent dark navy to primary gradient */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.95); /* White with slight transparency */
            border: 1px solid #e5e7eb; /* Light border for elegance */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%; /* Full width on small screens */
            max-width: 400px; /* Reduced width for larger screens */
            margin: auto; /* Center horizontally */
            margin-top: 100px; /* Space from the header */
        }
    </style>
</head>
<body>
@if (session('success'))
    <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
        <p>{{ session('success') }}</p>
    </div>
@endif

    <!-- Header -->
    <header class="bg-primary text-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="/" class="text-2xl font-bold hover:underline">Trade Finance Guarantee System</a>
            <nav>
                <a href="/register" class="hover:underline">Register</a>
                <a href="/about" class="ml-4 hover:underline">About</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-md p-6 rounded-lg login-form">
            <!-- Title -->
            <h2 class="text-center text-xl font-bold text-gray-800 mb-6">Login to your account</h2>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Username/Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex justify-between items-center mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-blue-400">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-primary text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </main>

</body>
</html>
