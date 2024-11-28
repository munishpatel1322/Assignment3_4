@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
    </form>
    @endsection
