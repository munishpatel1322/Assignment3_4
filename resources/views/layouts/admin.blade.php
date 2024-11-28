<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-500 text-white py-4 px-6 flex items-center">
            <h1 class="text-xl font-bold">Admin Panel</h1>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="bg-gray-800 text-white w-1/4 p-6">
    <nav>
        <ul class="space-y-4">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"
                   class="{{ request()->routeIs('admin.users.*') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    Manage Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.guarantees.index') }}"
                   class="{{ request()->routeIs('admin.guarantees.*') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    Manage Guarantees
                </a>
            </li>
            <li>
                <a href="{{ route('admin.files.index') }}"
                class="{{ request()->routeIs('admin.files.*') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    Uploaded Files
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white w-full text-left">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>


            <!-- Main Content -->
            <main class="flex-1 bg-white p-6">
            @yield('content') <!-- Use this for Blade layouts -->
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 text-center">
            &copy; {{ date('Y') }} Trade Finance Guarantee System
        </footer>
    </div>
</body>
</html>
