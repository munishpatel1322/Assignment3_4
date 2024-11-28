@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h2 class="text-2xl font-bold mb-4">Bulk Data Upload</h2>
    <form action="{{ route('bulk.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Choose File (CSV, JSON, XML)</label>
            <input type="file" name="file" id="file" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Upload
        </button>
    </form>
</div>
@endsection
