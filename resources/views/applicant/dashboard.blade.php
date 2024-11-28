@extends('layouts.applicant')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Applicant Dashboard</h1>
    <div class="grid grid-cols-2 gap-4">
        <div class="p-4 bg-gray-200 rounded shadow">
            <h2 class="text-lg font-bold">Active Guarantees</h2>
            <p>{{ $activeGuarantees }}</p>
        </div>
        <div class="p-4 bg-gray-200 rounded shadow">
            <h2 class="text-lg font-bold">Pending Applications</h2>
            <p>{{ $pendingApplications }}</p>
        </div>
    </div>
@endsection
