@extends('layouts.reviewer')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Pending Guarantees</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Corporate Reference Number</th>
                <th class="py-2">Guarantee Type</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guarantees as $guarantee)
            <tr>
                <td class="py-2">{{ $guarantee->corporate_reference_number }}</td>
                <td class="py-2">{{ $guarantee->guarantee_type }}</td>
                <td class="py-2">
                    <a href="{{ route('reviewer.guarantees.show', $guarantee) }}" class="text-blue-500">Review</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
