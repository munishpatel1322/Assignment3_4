@extends('layouts.reviewer')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Reviewer Dashboard</h1>
    <div class="grid grid-cols-2 gap-4">
        <div class="p-4 bg-gray-200 rounded shadow">
            <h2 class="text-lg font-bold">Pending Guarantees</h2>
            <p>{{ $pendingGuarantees }}</p>
        </div>
        <div class="p-4 bg-gray-200 rounded shadow">
            <h2 class="text-lg font-bold">Completed Reviews</h2>
            <p>{{ $completedReviews }}</p>
        </div>
    </div>
@endsection
