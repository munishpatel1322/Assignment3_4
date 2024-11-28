<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-500 text-white py-4 px-6 flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                Logout
            </a>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="bg-gray-800 text-white w-1/4 p-6">
                <nav>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="text-gray-300 hover:text-white">Manage Users</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.guarantees.index') }}" class="text-gray-300 hover:text-white">Manage Guarantees</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 bg-white p-6">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 text-center">
            &copy; {{ date('Y') }} Trade Finance Guarantee System
        </footer>
    </div>
</body>
</html>
