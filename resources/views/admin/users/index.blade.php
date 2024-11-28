@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manage Users</h1>

    <!-- Search Bar -->
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.users.index') }}" class="flex space-x-2">
            <input type="text" name="search" placeholder="Search users..."
                   class="w-full border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-500"
                   value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">#</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Role</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $user->id }}</td>
                        <td class="py-3 px-6">{{ $user->name }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6">{{ $user->role }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="text-blue-500 hover:text-blue-600">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->appends(['search' => request('search')])->links() }}
    </div>
@endsection
