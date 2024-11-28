<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Trade Finance Guarantee System</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #1e293b, #3b82f6); /* Consistent dark navy to primary gradient */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .register-form {
            background: rgba(255, 255, 255, 0.95); /* White with slight transparency */
            border: 1px solid #e5e7eb; /* Light border for elegance */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%; /* Full width on small screens */
            max-width: 400px; /* Reduced width for larger screens */
            margin: auto; /* Center horizontally */
            margin-top: 30px; /* Space from the header */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-primary text-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="/" class="text-2xl font-bold hover:underline">Trade Finance Guarantee System</a>
            <nav>
                <a href="/login" class="hover:underline">Login</a>
                <a href="/about" class="ml-4 hover:underline">About</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-md p-6 rounded-lg register-form">
            <!-- Title -->
            <h2 class="text-center text-xl font-bold text-gray-800 mb-6">Create an Account</h2>

            <!-- Registration Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>

                <!-- Email -->
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

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                        <option value="" disabled selected>Select your role</option>
                        <option value="applicant">Applicant</option>
                        <option value="reviewer">Reviewer</option>
                        <option value="issuer">Issuer</option>
                        <option value="auditor">Auditor</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-primary text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 transition duration-300">
                    Register
                </button>
            </form>
        </div>
    </main>

</body>
</html>
