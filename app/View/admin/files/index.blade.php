@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Uploaded Files</h1>

    <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="block mb-2">
        <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded">Upload File</button>
    </form>

    @if(session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">File Name</th>
                <th class="border px-4 py-2">File Type</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($files as $file)
                <tr>
                    <td class="border px-4 py-2">{{ $file->id }}</td>
                    <td class="border px-4 py-2">{{ $file->file_name }}</td>
                    <td class="border px-4 py-2">{{ $file->file_type }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.files.destroy', $file->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No files found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
