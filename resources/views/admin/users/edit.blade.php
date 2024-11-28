@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border-gray-300 rounded">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border-gray-300 rounded">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium">Role</label>
            <select id="role" name="role" class="w-full border-gray-300 rounded">
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('role')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save Changes</button>
    </form>
    @endsection
