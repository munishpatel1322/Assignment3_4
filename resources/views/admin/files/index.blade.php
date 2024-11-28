@extends('layouts.admin') <!-- Extending the admin layout -->

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Uploaded Files</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- File Table -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">File Name</th>
                    <th class="border border-gray-300 p-2">File Type</th>
                    <th class="border border-gray-300 p-2">Uploaded At</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $file->file_name }}</td>
                        <td class="border border-gray-300 p-2">{{ $file->file_type }}</td>
                        <td class="border border-gray-300 p-2">{{ $file->created_at }}</td>
                        <td class="border border-gray-300 p-2">
                            <form action="{{ route('admin.files.destroy', $file->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $files->links() }}
        </div>
    </div>
@endsection
