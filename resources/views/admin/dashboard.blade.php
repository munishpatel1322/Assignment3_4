@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-gray-100 p-4 rounded shadow">
            <h2 class="text-lg font-bold text-blue-500">Total Users</h2>
            <p>{{ $totalUsers }}</p>
        </div>
        <div class="bg-gray-100 p-4 rounded shadow">
            <h2 class="text-lg font-bold text-blue-500">Total Guarantees</h2>
            <p>{{ $totalGuarantees }}</p>
        </div>
        <div class="bg-gray-100 p-4 rounded shadow">
            <h2 class="text-lg font-bold text-blue-500">Uploaded Files</h2>
            <p>{{ $totalFiles }}</p>
        </div>
    </div>
@endsection
